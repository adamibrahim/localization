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
            __DIR__.'/Assets' => public_path(),
        ]);

        view()->composer('*', function ($view) {

            session()->has('locale')
                ? $lang = Language::lang(session()->get('locale'))
                : $lang = Language::defaultLanguage();

            session()->has('locale:back')
                ? $lang_back = Language::lang(session()->get('locale:back'))
                : $lang_back = Language::defaultBackLanguage();

            session()->has('locale:content')
                ? $lang_content = Language::lang(session()->get('locale:content'))
                : $lang_content = Language::defaultLanguage();

            $this->app->setLocale($lang['abbr']);

            if (\Route::current()->getPrefix() === 'admin') {
                $this->app->setLocale($lang_back['abbr']);
            }

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
        // register
    }

}