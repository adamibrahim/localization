<?php

Route::get('language/change/{abbr}', 'Adam\Localization\Controllers\LocalizationController@changeLanguage')->name('language.change');
