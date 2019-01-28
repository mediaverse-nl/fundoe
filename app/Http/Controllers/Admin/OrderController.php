<?php

namespace App\Http\Controllers\Admin;

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
        $orders = $this->order->get();

        return view('admin.order.index')
            ->with('orders', $orders);
    }

    public function show($id)
    {
        $order = $this->order->findOrFail($id);

        return view('admin.order.show')
            ->with('order', $order);
    }
}
