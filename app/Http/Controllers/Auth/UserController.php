<?php

namespace App\Http\Controllers\Auth;

use App\Http\Requests\Auth\User\PasswordUpdateRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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

    public function password(PasswordUpdateRequest $request)
    {
        $user = $this->user;
//        $user->findOrFail($user->id);
//        $user->password = Hash::make($request->password);
//        $user->save();

        return redirect()->back();
    }

    public function info(Request $request)
    {
        $user = $this->user;
        $user->findOrFail($user->id);
        $user->address = $request->address;
        $user->save();

        return redirect()->back();
    }
}

