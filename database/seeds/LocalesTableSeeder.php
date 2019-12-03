<?php

use Illuminate\Database\Seeder;

class LocalesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('locales')->insert(
            [
                'name' => 'Denmark',
                'country_code' => 'dk',
            ]
        );

        DB::table('locales')->insert(
            [
                'name' => 'Sweden',
                'country_code' => 'se',
            ]
        );

        DB::table('locales')->insert(
            [
                'name' => 'Norway',
                'country_code' => 'no',
            ]
        );

        DB::table('locales')->insert(
            [
                'name' => 'Finland',
                'country_code' => 'fi',
            ]
        );
    }
}
