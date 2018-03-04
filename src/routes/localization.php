<?php

Route::get('language/change/{abbr}', 'Adam\Localization\Controllers\LocalizationController@changeLanguage')->name('language.change');
Route::get('admin/language/back/{abbr}', 'Adam\Localization\Controllers\LocalizationController@changeBackLanguage')->name('admin.back.language');
Route::get('admin/language/content/{abbr}', 'Adam\Localization\Controllers\LocalizationController@changeContentLanguage')->name('admin.content.language');