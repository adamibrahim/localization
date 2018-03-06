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
    public function boot(\Illuminate\Routing\Router $router)
    {
        $this->loadRoutesFrom( __DIR__.'/routes/localization.php');
        $this->loadMigrationsFrom(__DIR__.'/database/migrations');
        $router->aliasMiddleware('lang', \Adam\Localization\Middleware\Localization::class);

        $this->publishes([
            __DIR__.'/assets' => public_path(),
            __DIR__.'/config' => config_path(),
        ], 'Localization');

        view()->composer('*', function ($view) {

            session()->has('locale')
                ? $lang = Language::lang( \App::getLocale())
                : $lang = Language::defaultLanguage();

            session()->has('locale:back')
                ? $lang_back = Language::lang(\App::getLocale())
                : $lang_back = Language::defaultBackLanguage();

            session()->has('locale:content')
                ? $lang_content = Language::lang(session()->get('locale:content'))
                : $lang_content = Language::defaultLanguage();

            $view->with('lang', $lang);
            $view->with('lang_back', $lang_back);
            $view->with('lang_content', $lang_content);
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
        $this->mergeConfigFrom(__DIR__.'/config/localization.php', 'localization');
    }

}