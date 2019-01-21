<?php

namespace App\Http\Controllers\Site;

use App\Event;
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

    public function __construct(Order $order, Event $event)
    {
        $this->order = $order;
        $this->event = $event;
        $this->mollie = Mollie::api();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $event = $this->event->findOrFail($request->event_id);

        $order = $this->order;
        $order->total_paid = $event->prijs;
        $order->status = self::STATUS_PENDING;
        $order->email = $request->email;
        $order->ticket_amount = $request->aantal;
        $order->save();

        $payment =  $this->mollie->payments()->create([
            "amount"      => number_format($order->total_paid,2),
            "description" => "Order Nr. ". $order->id,
            "redirectUrl" => route('order.show', $order->id),
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
                foreach($order->productOrders as $product){
                    $product->product()->update([
                        'stock' => ((int)$product->stock - $product->amount)
                    ]);
                }

                Mail::to($order->email)->send(new OrderConfirmation($order));
            }

            $order->status = self::STATUS_COMPLETED;

        }
        elseif (! $payment->isOpen())
        {
            $order->status = self::STATUS_CANCELLED;
        }
        $order->payment_method = $payment->method;

        $order->save();

        return view('order.show')
            ->with('order', $order)
            ->with('payment', $payment);
    }
}
