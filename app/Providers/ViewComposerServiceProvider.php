<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\App;

class ViewComposerServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        view()->composer('*', function( $view )
        {
                $locale = App::getLocale('locale');
                $view->with(compact('locale'));
        });

        // Register PageViewComposer for footer statistics
        view()->composer('*', \App\Http\ViewComposers\PageViewComposer::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
