<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\SeoUpdateRequest;
use App\Seo;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SeoController extends Controller
{
    protected $seo;

    public function __construct(Seo $seo)
    {
        $this->seo = $seo;
    }

    public function index()
    {
//        dd(request()->route()->getName());
        $seo = $this->seo->get();

        return view('admin.seo-manager.index')
            ->with('seo', $seo);
    }

    public function edit($id)
    {
        $seo = $this->seo->findOrFail($id);

        return view('admin.seo-manager.edit')
            ->with('seo', $seo);
    }

    public function update(SeoUpdateRequest $request, $id)
    {
        $seo = $this->seo->findOrFail($id);

        return redirect()
            ->route('admin.seo-manager.index');
    }
}
