<?php

namespace Alfapolit\Http\Controllers\Admin;

use Alfapolit\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Alfapolit\Category;

class CategoriesController extends Controller
{
    public function index()
    {
        return view('admin.categories.index', ['categories' => Category::all()]);
    }


    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:255|unique:categories',
            'description' => 'max:1000',
        ]);

        Category::create([
            'name' => $request->name,
            'slug' => $request->name,
            'description' => $request->description,
        ]);

        return redirect('/admin/categories')->with('message', 'Category created.');
    }


    public function edit($id)
    {
        return view('admin.categories.edit', ['category' => Category::findOrFail($id)]);
    }


    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required|max:255|unique:categories,name,' . $id,
            'description' => 'max:1000',
        ]);


        Category::findOrFail($id)->update([
            'name' => $request->name,
            'slug' => $request->name,
            'description' => $request->description,
        ]);

        return redirect('/admin/categories')->with('message', 'Category updated.');
    }


    public function destroy(Categories $categories)
    {
        //
    }
}
