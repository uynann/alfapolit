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
        DB::table('users')->truncate();

        DB::table('users')->insert([
            [
                'name' => 'uynann',
                'email' => 'uynann@mail.ru',
                'password' => bcrypt('uynann1993'),
            ],
            [
                'name' => 'rithy',
                'email' => 'rithy@mail.ru',
                'password' => bcrypt('rithy1993'),
            ],
        ]);
    }
}
