<?php

namespace Adam\Localization\database\seeds;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LanguagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('languages')->insert([
            'name'        => 'English',
            'flag'        => 'en.svg',
            'abbr'        => 'en',
            'script'    => 'Latn',
            'native'    => 'English',
            'active'    => '1',
            'default'    => '1',
            'active_back'    => '1',
            'default_back'    => '1'
        ]);

        DB::table('languages')->insert([
            'name'        => 'Romanian',
            'flag'        => 'ro.svg',
            'abbr'        => 'ro',
            'script'    => 'Latn',
            'native'    => 'Română',
            'active'    => '0',
            'default'    => '0',
            'active_back'    => '0',
            'default_back'    => '0'
        ]);

        DB::table('languages')->insert([
            'name'        => 'French',
            'flag'        => 'fr.svg',
            'abbr'        => 'fr',
            'script'    => 'Latn',
            'native'    => 'Français',
            'active'    => '0',
            'default'    => '0',
            'active_back'    => '0',
            'default_back'    => '0'
        ]);

        DB::table('languages')->insert([
            'name'        => 'Italian',
            'flag'        => 'it.svg',
            'abbr'        => 'it',
            'script'    => 'Latn',
            'native'    => 'Italiano',
            'active'    => '0',
            'default'    => '0',
            'active_back'    => '0',
            'default_back'    => '0'
        ]);

        DB::table('languages')->insert([
            'name'        => 'Spanish',
            'flag'        => 'es.svg',
            'abbr'        => 'es',
            'script'    => 'Latn',
            'native'    => 'Español',
            'active'    => '0',
            'default'    => '0',
            'active_back'    => '0',
            'default_back'    => '0'
        ]);

        DB::table('languages')->insert([
            'name'        => 'German',
            'flag'        => 'de.svg',
            'abbr'        => 'de',
            'script'    => 'Latn',
            'native'    => 'Deutsch',
            'active'    => '0',
            'default'    => '0',
            'active_back'    => '0',
            'default_back'    => '0'
        ]);
        DB::table('languages')->insert([
            'name'        => 'Russian',
            'flag'        => 'ru.svg',
            'abbr'        => 'ru',
            'script'    => 'Latn',
            'native'    => 'Русский',
            'active'    => '1',
            'default'    => '0',
            'active_back'    => '1',
            'default_back'    => '0'
        ]);

        $this->command->info('Language seeding successful.');
    }
}
