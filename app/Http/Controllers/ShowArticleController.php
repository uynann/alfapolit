<?php

namespace Alfapolit\Http\Controllers;

use Illuminate\Http\Request;
use Alfapolit\Category;
use Alfapolit\SubCategory;
use Alfapolit\Article;

class ShowArticleController extends Controller
{
    public function show(Category $category, $subcategory, Article $article)
    {

        return view('show', [
            'category' => $category,
            'subcategory' => isset($article->subCategory) ? $article->subCategory : null,
            'article' => $article,
        ]);
    }
}
