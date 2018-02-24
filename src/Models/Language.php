<?php

namespace Adam\Localization\Models;

use Illuminate\Database\Eloquent\Model;

class Language extends Model
{

    /*
     * Temporary language collection
     */
    public static function tmpLanguage()
    {
        return collect([ ['name' => 'English', 'flag' => 'en.svg', 'abbr' => 'en']]);
    }

    /**
     * The used language
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
     * Default language
     */
    public static function defaultLanguage()
    {
        if (self::notLanguage()){
            return (object) self::tmpLanguage()->first();
        }
        return self::where('default','>', 0)->first();
    }



    /*
     * list of active languages
     */
    public static function languages()
    {
        if (self::notLanguage()){
            return (object) self::tmpLanguage();
        }
        return self::where('active', true)->get();
    }

    /*
     * list of active CMS/back languages
     */
    public static function backLanguages()
    {
        if (self::notLanguage()){
            return (object) self::tmpLanguage();
        }
        return self::where('active_back', true)->get();

    }

    /*
     * Check if language table exist and it has a record/s
     */
    public static function notLanguage()
    {
        if (!\Schema::hasTable('languages') || !self::all() ) {
            return true;
        }
    }

    /**
     * check if this language is active
     *
     * @param $abbr
     * @return bool
     */
    public function isActive()
    {
        return $this->active;
    }

    /**
     * check if this language for CMS/back is active
     *
     * @param $abbr
     * @return bool
     */
    public function isActiveBack()
    {
        return $this->active_back;
    }

}
