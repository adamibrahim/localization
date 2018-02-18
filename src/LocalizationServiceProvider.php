<?php

namespace Adam\Localization;

use Illuminate\Support\ServiceProvider;
use Adam\Localization\Models\Language;

class LocalizationServiceProvider extends ServiceProvider
{

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadRoutesFrom( __DIR__.'/routes/localization.php');
        $this->loadMigrationsFrom(__DIR__.'/database/migrations');

        $this->publishes([
            __DIR__.'/Assets' => asset('img'),
            __DIR__.'/resources' => resource_path('views'),

        ]);

        view()->composer('*', function ($view) {
            if (!session()->has('locale')) {
                session()->put('locale', Language::defaultLanguage()->abbr);
                return redirect()->back();
            }
            $this->app->setLocale(session()->get('locale'));
            $view->with('lang', Language::lang($this->app->getLocale()));
        });
        view()->share('languages', Language::languages());
        view()->share('languages_back', Language::backLanguages());

    }

    /**
     * Register any package services.
     *
     * @return void
     */
    public function register()
    {
        // register
    }

}