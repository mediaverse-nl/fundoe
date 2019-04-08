<?php

namespace App\Http\Controllers\Auth;

use App\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{
    protected $order;

    public function __construct(Order $order)
    {
        $this->order = $order;
    }

    public function index()
    {
        return view('auth.order.index');
    }

    public function show($id)
    {
        if (!in_array($id, auth()->user()->orders()->pluck('id')->toArray())){
            return abort(404);
        }

        $order = $this->order->findOrFail($id);

        return view('auth.order.show')
            ->with('order', $order);
    }
}
