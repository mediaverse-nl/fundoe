<?php

namespace App\Http\Controllers\Site;

use App\Activity;
use App\Event;
use App\Http\Requests\Site\GroupOrderStoreRequest;
use App\Http\Requests\Site\OrderStoreRequest;
use App\Http\Requests\Site\PublicOrderStoreRequest;
use App\Mail\OrderConfirmation;
use App\Order;
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
        $order->event_id = $event->id;
        $order->email = auth()->user()->email;
        $order->ticket_amount = $request->tickets;
        $order->save();

        $payment =  $this->mollie->payments()->create([
            "amount"      => number_format($order->total_paid,2),
            "description" => "Order Nr. ". $order->id,
            "redirectUrl" => route('site.order.show', $order->id),
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
        $activity = $this->activity->findOrFail($request->id);

        $event_id = $activity->events()->insertGetId([

        ]);
        $pricePerTicket = $activity->price_per_hour / 60 * $request->duur;

        $order = $this->order;
        $order->total_paid = $pricePerTicket * $request->tickets;
        $order->status = self::STATUS_PENDING;
        $order->user_id = auth()->user()->id;
        $order->event_id = $event_id;
        $order->email = auth()->user()->email;
        $order->ticket_amount = $request->tickets;
        $order->save();

        $payment =  $this->mollie->payments()->create([
            "amount"      => number_format($order->total_paid,2),
            "description" => "Order Nr. ". $order->id,
            "redirectUrl" => route('site.order.show', $order->id),
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
