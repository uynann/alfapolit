<?php

namespace Alfapolit\Http\Controllers\Admin;

use Alfapolit\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Alfapolit\Category;

class CategoriesController extends Controller
{
    public function index(Request $request)
    {

        $search = $request->search;

        if (!empty($search)) {
            $categories = Category::SearchByKeyword($search)->orderBy('id', 'desc')->get();
            $param = 'search';
            $param_val = $search;
        }
        else {
            $categories = Category::all();
            $param = null;
            $param_val = null;
        }

        return view('admin.categories.index', [
            'categories' => $categories,
            'param' => $param,
            'param_val' => $param_val,
        ]);
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

        return redirect()->back()->with('message', 'Category created.');
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


    public function destroy($id)
    {
        Category::findOrFail($id)->delete();
        return redirect()->back()->with('message', 'Category deleted!');
    }
}
