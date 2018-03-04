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

    /**
     * Language Back chooser
     *
     * @param $abbr
     * @return void
     */
    public function changeBackLanguage($abbr)
    {
        if ($abbr == session()->get('locale:back')) {
            return redirect()->back();
        }

        if (!Language::lang($abbr)) {
            return redirect()->back();
        }

        if (!Language::lang($abbr)->isActiveBack()) {
            return redirect()->back();
        }

        session()->put('locale:back', $abbr);
        return redirect()->back();
    }

    /**
     * Language chooser
     *
     * @param $abbr
     * @return void
     */
    public function changeContentLanguage($abbr)
    {
        if ($abbr == session()->get('locale:content')) {
            return redirect()->back();
        }

        if (!Language::lang($abbr)) {
            return redirect()->back();
        }

        if (!Language::lang($abbr)->isActive()) {
            return redirect()->back();
        }

        session()->put('locale:content', $abbr);
        return redirect()->back();
    }
}
