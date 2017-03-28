<?php

namespace Alfapolit\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Alfapolit\Http\Controllers\Controller;
use Alfapolit\SubCategory;
use Alfapolit\Category;
use Alfapolit\Article;

class SubCategoriesController extends Controller
{
    public function index(Request $request)
    {

        $search = $request->search;

        if (!empty($search)) {
            $subcategories = SubCategory::SearchByKeyword($search)->orderBy('id', 'desc')->get();
            $param = 'search';
            $param_val = $search;
        }
        else {
            $subcategories = SubCategory::all();
            $param = null;
            $param_val = null;
        }

        return view('admin.subcategories.index', [
            'subcategories' => $subcategories,
            'param' => $param,
            'param_val' => $param_val,
            'categories' => Category::all(),
        ]);
    }


    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|min:2|max:255',
            'description' => 'max:1000',
            'category' => 'required',
        ]);

        SubCategory::create([
            'name' => $request->name,
            'slug' => $request->name,
            'category_id' => $request->category,
            'description' => $request->description,
        ]);

        return redirect()->back()->with('message', 'Sub category created.');
    }


    public function edit($id)
    {
        return view('admin.subcategories.edit', [
            'subcategory' => SubCategory::findOrFail($id),
            'categories' => Category::all(),
        ]);
    }


    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required|min:2|max:255',
            'description' => 'max:1000',
            'category' => 'required',
        ]);

        SubCategory::findOrFail($id)->update([
            'name' => $request->name,
            'slug' => $request->name,
            'category_id' => $request->category,
            'description' => $request->description,
        ]);

        return redirect('/admin/subcategories')->with('message', 'Sub category updated.');
    }


    public function destroy($id)
    {
        Article::where('sub_category_id', '=', $id)->update(['sub_category_id' => null]);

        SubCategory::findOrFail($id)->delete();
        return redirect()->back()->with('message', 'Sub category deleted!');
    }
}
