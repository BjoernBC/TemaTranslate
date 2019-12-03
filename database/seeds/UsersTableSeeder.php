<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert(
            [
                'name' => 'Admin',
                'email' => 'admin@mail.com',
                'password' => Hash::make('password'),
                'is_admin' => 1,
                'country_code' => 'dk',
            ]
        );

        $locales = ['se', 'no', 'fi'];
        for ($i=1; $i < 5; $i++) {
            DB::table('users')->insert(
                [
                    'name' => "Translator {$i}",
                    'email' => "translator{$i}@mail.com",
                    'password' => Hash::make('password'),
                    'is_admin' => 0,
                    'country_code' => $locales[array_rand($locales)],
                ]
            );
        }
    }
}
