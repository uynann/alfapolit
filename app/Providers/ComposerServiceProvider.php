<?php

namespace Alfapolit\Providers;

use Illuminate\Support\ServiceProvider;
use Alfapolit\Category;
use Alfapolit\SiteInfo;
use Alfapolit\Article;
use Carbon\Carbon;

class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        view()->composer(['layouts.partials._header', 'layouts.partials._footer'], function($view) {
            $view->with('categories', Category::all())->with('site_info', SiteInfo::find(1));
        });
        
        view()->composer(['category'], function($view) {
            $view->with('popular_articles', Article::where('status', 'published')
                ->where('created_at', '>=', Carbon::now()->subWeeks(100))
                ->orderBy('view_count', 'desc')->take(5)->get()); 
            
            $view->with('recent_articles', Article::where('status', 'published')
                                    ->orderBy('id', 'desc')->take(5)->get());    
        });
    }
}
