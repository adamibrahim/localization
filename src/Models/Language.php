<?php

namespace Adam\Localization\Models;

use Illuminate\Database\Eloquent\Model;

class Language extends Model
{

    /*
     * Creating temporary language
     */
    public static function tmpLanguage()
    {
        return [
                'id' => '1',
                'name' => 'English',
                'flag' => 'en.svg',
                'abbr' => 'en',
                'native' => 'English',
           ];
    }

    /**
     * Set Lang
     *
     * @param $abbr
     * @return object
     */
    public static function lang($abbr)
    {

        if (!\Schema::hasTable('languages')) {
            return (object) self::tmpLanguage();
        }
        return self::where('abbr', $abbr)->first();
    }

    /*
     * Getting default language
     */
    public static function defaultLanguage()
    {
        if (!\Schema::hasTable('languages')) {
            return (object) self::tmpLanguage();
        }
        return self::where('default','>', 0)->first();
    }



    /*
     * Getting list of active front languages
     */
    public static function languages()
    {
        if (!\Schema::hasTable('languages')) {
            return (object) self::tmpLanguage();
        }
        return self::where('active', true)->get();
    }

    /*
     * list of active back languages
     */
    public static function backLanguages()
    {
        if (!\Schema::hasTable('languages')) {
            return (object) self::tmpLanguage();
        }
        return self::where('active_back', true)->get();

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
