<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class OurDomainsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('our_domains') -> insert ([
           'domain' => 'ecocity.ru'
        ]);
        DB::table('our_domains') -> insert ([
            'domain' => 'igsp.ru'
        ]);
        DB::table('our_domains') -> insert ([
            'domain' => 'ikrt.ru'
        ]);
        DB::table('our_domains') -> insert ([
            'domain' => 'modul.ooo'
        ]);
        DB::table('our_domains') -> insert ([
            'domain' => 'best-itpro.ru'
        ]);
    }
}
