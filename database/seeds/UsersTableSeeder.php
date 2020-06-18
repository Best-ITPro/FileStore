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
        DB::table('users') -> insert ([
            'name' => 'Best-ITPro',
            'email' => 'it@best-itpro.ru',
        ]);

        DB::table('users') -> insert ([
            'name' => 'I.Bugarev',
            'email' => 'i.bugarev@ecocity.ru',
        ]);
    }
}
