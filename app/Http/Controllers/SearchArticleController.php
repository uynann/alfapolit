<?php

namespace Alfapolit\Http\Controllers;

use Illuminate\Http\Request;
use Alfapolit\Article;

class SearchArticleController extends Controller
{
    public function search(Request $request)
    {
        $search = $request->search;
        $param = 'search';
        $param_val = null;
        $articles_all = [];
        $articles = [];
        
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
        ]);
                    
    }
}
