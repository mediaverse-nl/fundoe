<?php

namespace App\Http\Controllers\Site;

use App\Activity;
use App\Event;
use App\Http\Requests\Site\GroupOrderStoreRequest;
use App\Http\Requests\Site\OrderStoreRequest;
use App\Http\Requests\Site\PublicOrderStoreRequest;
use App\Mail\OrderConfirmation;
use App\Order;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use Mollie\Laravel\Facades\Mollie;

class OrderController extends Controller
{
    const STATUS_PENDING = 'pending';
    const STATUS_COMPLETED = 'paid';
    const STATUS_CANCELLED = 'cancelled';
    const STATUS_FAILED = 'failed';

    protected $mollie;
    protected $order;
    protected $event;
    protected $activity;

    public function __construct(Order $order, Event $event, Activity $activity)
    {
        $this->order = $order;
        $this->event = $event;
        $this->activity = $activity;
        $this->mollie = Mollie::api();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storePublic(PublicOrderStoreRequest $request)
    {
        $event = $this->event->findOrFail($request->id);

        $order = $this->order;
        $order->total_paid = $event->price * $request->tickets;
        $order->status = self::STATUS_PENDING;
        $order->user_id = auth()->user()->id;
        $order->email = auth()->user()->email;
        $order->country = auth()->user()->country;
        $order->state = auth()->user()->state;
        $order->city = auth()->user()->city;
        $order->postal_code = auth()->user()->zipcode;
        $order->address = auth()->user()->street_name;
        $order->address_number = auth()->user()->street_nr;
        $order->name = auth()->user()->first_name.' '.auth()->user()->last_name;
        $order->event_id = $event->id;
        $order->ticket_amount = $request->tickets;
        $order->save();

        $payment =  $this->mollie->payments()->create([
            "amount"      => number_format($order->total_paid,2),
            "description" => "Order Nr. ". $order->id,
            "redirectUrl" => route('site.order.show', $order->id),
            'webhookUrl'   => route('webhooks.mollie'),
            'metadata'    => [
                'order_id' => $order->id,
            ],
        ]);

        $order->update(['payment_id' => $payment->id]);

        // redirect customer to Mollie checkout page
        return redirect($payment->getPaymentUrl(), 303);
    }

    public function storeGroup(GroupOrderStoreRequest $request)
    {
        $activity = $this->event->findOrFail($request->id)->activity;

        $pricePerTicket = $activity->price_per_hour / 60 * $request->duur;

//        todo er moet een status bij gegeven worden om te kunnen zien dat het prive is
        $event_id = $this->event->insertGetId([
            'activity_id' => $activity->id,
            'target_group' => 'iedereen',
            'price' => $pricePerTicket,
            'start_datetime' => $request->activiteit_datum,
            'status' => 'private',
            'end_datetime' => Carbon::parse($request->activiteit_datum)->addMinutes($request->duur)
        ]);

//        dd(auth()->user());
        $order = $this->order;
        $order->total_paid = $pricePerTicket * $request->tickets;
        $order->status = self::STATUS_PENDING;
        $order->user_id = auth()->user()->id;
        $order->email = auth()->user()->email;
        $order->country = auth()->user()->country;
        $order->state = auth()->user()->state;
        $order->city = auth()->user()->city;
        $order->postal_code = auth()->user()->zipcode;
        $order->address = auth()->user()->street_name;
        $order->address_number = auth()->user()->street_nr;
        $order->name = auth()->user()->first_name.' '.auth()->user()->last_name;
        $order->event_id = $event_id;
        $order->ticket_amount = $request->tickets;
        $order->save();

        $payment =  $this->mollie->payments()->create([
            "amount"      => number_format($order->total_paid,2),
            "description" => "Order Nr. ". $order->id,
            "redirectUrl" => route('site.order.show', $order->id),
            'webhookUrl'   => route('webhooks.mollie'),
            'metadata'    => [
                'order_id' => $order->id,
            ],
        ]);

        $order->update(['payment_id' => $payment->id]);

        // redirect customer to Mollie checkout page
        return redirect($payment->getPaymentUrl(), 303);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $order = $this->order->findOrFail($id);

        $payment =  $this->mollie->payments()->get($order->payment_id);

        if ($payment->isPaid())
        {
            if ($order->status != 'paid'){
                Mail::to($order->email)->send(new OrderConfirmation($order));
            }

            $order->status = self::STATUS_COMPLETED;
        } elseif (! $payment->isOpen())
        {
            $order->status = self::STATUS_CANCELLED;
        }
        $order->payment_method = $payment->method;

        $order->save();

        return view('site.order.show')
            ->with('order', $order)
            ->with('payment', $payment);
    }
}
