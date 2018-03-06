<?php

Route::get('language/change/{abbr}', 'Adam\Localization\Controllers\LocalizationController@changeLanguage')->name('language.change');


Route::
name('admin.')
    ->prefix(config('localization.admin_prefix'))
    ->group(function() {
        Route::get('language/back/{abbr}', 'Adam\Localization\Controllers\LocalizationController@changeBackLanguage')->name('back.language');
        Route::get('language/content/{abbr}', 'Adam\Localization\Controllers\LocalizationController@changeContentLanguage')->name('content.language');
});