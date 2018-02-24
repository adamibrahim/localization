<?php

namespace Adam\Localization\database\seeds;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

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
            'script'    => 'Latin',
            'native'    => 'English',
            'active'    => '1',
            'default'    => '1',
            'active_back'    => '1',
            'default_back'    => '1',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('languages')->insert([
            'name'        => 'Romanian',
            'flag'        => 'ro.svg',
            'abbr'        => 'ro',
            'script'    => 'Latin',
            'native'    => 'Română',
            'active'    => '0',
            'default'    => '0',
            'active_back'    => '0',
            'default_back'    => '0',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('languages')->insert([
            'name'        => 'French',
            'flag'        => 'fr.svg',
            'abbr'        => 'fr',
            'script'    => 'Latin',
            'native'    => 'Français',
            'active'    => '0',
            'default'    => '0',
            'active_back'    => '0',
            'default_back'    => '0',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('languages')->insert([
            'name'        => 'Italian',
            'flag'        => 'it.svg',
            'abbr'        => 'it',
            'script'    => 'Latin',
            'native'    => 'Italiano',
            'active'    => '0',
            'default'    => '0',
            'active_back'    => '0',
            'default_back'    => '0',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('languages')->insert([
            'name'        => 'Spanish',
            'flag'        => 'es.svg',
            'abbr'        => 'es',
            'script'    => 'Latin',
            'native'    => 'Español',
            'active'    => '0',
            'default'    => '0',
            'active_back'    => '0',
            'default_back'    => '0',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('languages')->insert([
            'name'        => 'German',
            'flag'        => 'de.svg',
            'abbr'        => 'de',
            'script'    => 'Latin',
            'native'    => 'Deutsch',
            'active'    => '0',
            'default'    => '0',
            'active_back'    => '0',
            'default_back'    => '0',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('languages')->insert([
            'name'        => 'Russian',
            'flag'        => 'ru.svg',
            'abbr'        => 'ru',
            'script'    => 'Cyrillic',
            'native'    => 'Русский',
            'active'    => '1',
            'default'    => '0',
            'active_back'    => '1',
            'default_back'    => '0',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        $this->command->info('Language seeding successful.');
    }
}
