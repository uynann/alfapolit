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
        $slug = $article->slug;
        $sub_category = SubCategory::where('slug', $subcategory)->first();
        
         $article_show = $article
            ->where('status', 'published')
            ->where('slug', $slug)
            ->where('category_id', $category->id)->firstOrFail();
        
        if (count($sub_category) == 0) {
            if ($subcategory != 'អ') {
                $category::where('name', 'អ')->firstOrFail();
            }
        } else {
            $article_show = $article->where('status', 'published')
                            ->where('slug', $slug)
                            ->where('category_id', $category->id)
                            ->where('sub_category_id', $sub_category->id)
                            ->firstOrFail();
        }

        return view('show', [
            'category' => $category,
            'subcategory' => isset($article->subCategory) ? $article->subCategory : null,
            'article' => $article_show,
        ]);
    }
}
