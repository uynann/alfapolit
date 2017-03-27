<?php

namespace Alfapolit\Http\Controllers;

use Illuminate\Http\Request;
use Alfapolit\Category;
use Alfapolit\SubCategory;

class CategoryController extends Controller
{
    public function category(Category $category)
    {
        $articles = $category->articlesPublished()->orderBy('id', 'desc')->paginate(18);

        return view('category', [
            'category' => $category,
            'category_articles' => $articles,
        ]);
    }

    public function subCategory(Category $category, $subcategory)
    {
        $sub_category = SubCategory::where('category_id', $category->id)->where('slug', $subcategory)->firstOrFail();
        $articles = $sub_category->articlesPublished()->orderBy('id', 'desc')->paginate(18);

        return view('category', [
            'category' => $category,
            'subcategory' => $sub_category->name,
            'category_articles' => $articles,
        ]);
    }
}
