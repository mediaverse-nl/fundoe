<?php

namespace App\Http\Controllers\Admin;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    protected $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function index()
    {
        $users = $this->user->get();

        return view('admin.user.index')
            ->with('users', $users);
    }

    public function edit($id)
    {
        $user = $this->user->findOrFail($id);

        return view('admin.user.edit')
            ->with('user', $user);
    }
}
