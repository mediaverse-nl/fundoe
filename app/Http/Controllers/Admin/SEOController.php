<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SeoController extends Controller
{
    protected $seo;

    public function __construct()
    {
    }

    public function index()
    {
        return view('admin.seo-manager.index');
    }

    public function edit($id)
    {
        return view('admin.seo-manager.edit');
    }

    public function update(Request $request, $id)
    {
        return view('admin.seo-manager.edit');
    }
}
