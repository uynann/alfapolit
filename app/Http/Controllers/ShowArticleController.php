<?php

namespace Alfapolit\Http\Controllers;

use Illuminate\Http\Request;
use Alfapolit\Category;
use Alfapolit\SubCategory;
use Alfapolit\Article;
use Session;
use Carbon\Carbon;

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
        
        
        
        $popular_articles = Article::where('status', 'published')
                ->where('created_at', '>=', Carbon::now()->subWeeks(100))
                ->orderBy('view_count', 'desc')->take(5)->get();
        
        
        
        if (count($sub_category) == 0) {
            if ($subcategory != 'អ') {
                $category::where('name', 'អ')->firstOrFail();
            } elseif (($subcategory == 'អ') && isset($article_show->subCategory)) {
                $category::where('name', 'អ')->firstOrFail();
            }
            
            $recommended_articles = Article::where('status', 'published')
                                    ->where('id', '<>', $article_show->id)
//                                    ->whereNotIn('id', $popular_articles)
                                    ->where('category_id', $article_show->category_id)
                                    ->orderBy('id', 'desc')->take(5)->get();
        } else {
            $article_show = $article->where('status', 'published')
                            ->where('slug', $slug)
                            ->where('category_id', $category->id)
                            ->where('sub_category_id', $sub_category->id)
                            ->firstOrFail();
            
            $recommended_articles = Article::where('status', 'published')
                                    ->where('id', '<>', $article_show->id)
                                    ->where('sub_category_id', $sub_category->id)
                                    ->orderBy('id', 'desc')->take(5)->get();
        }
        
        $article_key = 'article_' . $article_show->id;
        
        // Check if blog session key exists
        // If not, update view_count and create session key
        if (!Session::has($article_key))
        {
            $article_show->increment('view_count');
            Session::put($article_key, 1);
        }
        
        $popular_articles = Article::where('status', 'published')
                ->where('created_at', '>=', Carbon::now()->subWeeks(100))
                ->orderBy('view_count', 'desc')->take(5)->get();
        
        

        return view('show', [
            'category' => $category,
            'subcategory' => isset($article_show->subCategory) ? $article_show->subCategory : null,
            'article' => $article_show,
            'popular_articles' => $popular_articles,
            'recommended_articles' => $recommended_articles,
        ]);
    }
}
