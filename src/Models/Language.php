<?php

namespace Adam\Localization\Models;

use Illuminate\Database\Eloquent\Model;

class Language extends Model
{

    /*
     * Creating temporary language collection
     */
    public static function tmpLanguage()
    {
        return collect([ ['name' => 'English', 'flag' => 'en.svg', 'abbr' => 'en']]);
    }

    /**
     * Set Lang
     *
     * @param $abbr
     * @return object
     */
    public static function lang($abbr)
    {
        if (self::notLanguage()){
            return (object) self::tmpLanguage()->first();
        }
        return self::where('abbr', $abbr)->first();

    }

    /*
     * Getting default language
     */
    public static function defaultLanguage()
    {
        if (self::notLanguage()){
            return (object) self::tmpLanguage()->first();
        }
        return self::where('default','>', 0)->first();
    }



    /*
     * Getting list of active front languages
     */
    public static function languages()
    {
        if (self::notLanguage()){
            return (object) self::tmpLanguage();
        }
        return self::where('active', true)->get();
    }

    /*
     * list of active back languages
     */
    public static function backLanguages()
    {
        if (self::notLanguage()){
            return (object) self::tmpLanguage();
        }
        return self::where('active_back', true)->get();

    }

    /*
     * Getting tmp language
     */
    public static function notLanguage()
    {
        if (!\Schema::hasTable('languages') || !self::all() ) {
            return true;
        }
    }

    /**
     * list of active front languages
     *
     * @param $abbr
     * @return bool
     */
    public function isActive()
    {
        return $this->active;
    }

    /**
     * Getting list of active back languages
     *
     * @param $abbr
     * @return bool
     */
    public function backIsActive()
    {
        return $this->active_back;
    }

}
