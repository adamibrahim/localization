<?php

namespace Adam\localization\Controllers;

use App\Http\Controllers\Controller;
use Adam\localization\Models\Language;

class LocalizationController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('web');
    }

    /**
     * Language chooser
     *
     * @param $abbr
     * @return void
     */
    public function changeLanguage($abbr)
    {
        if ($abbr == session()->get('locale')) {
            return redirect()->back();
        }

        if (!Language::lang($abbr)) {
            return redirect()->back();
        }

        if (!Language::lang($abbr)->isActive()) {
            return redirect()->back();
        }

        session()->put('locale', $abbr);
        return redirect()->back();
    }
}
