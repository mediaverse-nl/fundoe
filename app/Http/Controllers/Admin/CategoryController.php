<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    protected $category;

    public function __construct(Category $category)
    {
        $this->category = $category;
    }

    public function index()
    {
        $category = $this->category
            ->get(['id', 'value', 'category_id', 'order']);

        return view('admin.category.index')
            ->with('category', $this->category)
            ->with('categories', $category);
    }

    public function edit($id)
    {
        $category = $this->category->findOrFail($id);

        return view('admin.category.edit')
           ->with('category', $category);
    }

    public function update(Request $request, $id)
    {
        $category = $this->category->findOrFail($id);

        $category->value = $request->value;
        $category->category = $request->category_id;

        $category->save();

        return redirect()
            ->back();
    }
}
