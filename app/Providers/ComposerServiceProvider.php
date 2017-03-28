<?php

namespace Alfapolit\Providers;

use Illuminate\Support\ServiceProvider;
use Alfapolit\Category;
use Alfapolit\SiteInfo;

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
    }
}
