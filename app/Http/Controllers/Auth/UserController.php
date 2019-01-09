<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    protected $user;

    public function __construct(Auth $user)
    {
        $this->user = $user;
    }

    public function edit()
    {
        return view('auth.user.edit');
    }
}

