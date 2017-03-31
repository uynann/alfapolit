<?php

namespace Alfapolit\Http\Controllers;

use Illuminate\Http\Request;
use Alfapolit\Article;
use Carbon\Carbon;

class SearchArticleController extends Controller
{
    public function search(Request $request)
    {
        $search = $request->search;
        $param = 'search';
        $param_val = null;
        $articles_all = [];
        $articles = [];
        
        $popular_articles = Article::where('status', 'published')
                ->where('created_at', '>=', Carbon::now()->subWeeks(100))
                ->orderBy('view_count', 'desc')->take(5)->get();
        
        $recommended_articles = Article::where('status', 'published')
                                    ->whereNotIn('id', $popular_articles->pluck('id')->toArray())
                                    ->orderBy('id', 'desc')->take(5)->get();
        
        if (isset($search)) {
            if (strlen($search)  > 6) {
                $articles = Article::SearchByKeyword($search)->where('status', 'published')->orderBy('id', 'desc')->simplePaginate(20);
                $articles_all = Article::SearchByKeyword($search)->where('status', 'published')->get();
            }
        $param_val = $search;
        }
        
        

        return view('search', [
            'articles' => $articles,
            'articles_all' => $articles_all,
            'param' => $param,
            'param_val' => $param_val,
            'popular_articles' => $popular_articles,
            'recommended_articles' => $recommended_articles,
        ]);
                    
    }
}
