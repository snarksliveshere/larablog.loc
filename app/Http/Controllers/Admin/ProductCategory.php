<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductCategory extends Controller
{
    public function index()
    {
        $categories = \App\ProductCategory::all();
        return view('admin.product_category.index')->with('categories', $categories);
    }

    public function create()
    {
        return view('admin.product_category.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required'
        ]);
        \App\ProductCategory::create($request->all());
        return redirect()->route('product_categories.index');
    }

    public function edit($id)
    {
        $category = \App\ProductCategory::find($id);
        return view('admin.product_category.edit', ['category' => $category]);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required'
        ]);
        $category = \App\ProductCategory::find($id);
        $category->update($request->all());
        return redirect()->route('product_categories.index');
    }

    public function destroy($id)
    {
        \App\ProductCategory::find($id)->delete();
        return redirect()->route('product_categories.index');
    }
}
