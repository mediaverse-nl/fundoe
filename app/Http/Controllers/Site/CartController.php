<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CartController extends Controller
{
    protected $cart;

    public function __construct()
    {
        $this->cart = null;
    }

    public function index()
    {
        return view('site.cart.index');
    }
}
