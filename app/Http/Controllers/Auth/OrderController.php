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
//        $order = $this->order->get();
        return view('auth.order.index');
    }

    public function show()
    {
        return view('auth.order.show');
    }
}
