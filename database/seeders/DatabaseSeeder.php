<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;
use Hash;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('rendezvoustypes')->insert([
       'type'=>'dermatologie',
        ]);
        DB::table('rendezvoustypes')->insert([
            'type'=>'churergie',
             ]);
             DB::table('rendezvoustypes')->insert([
                'type'=>'auphtalement',
                 ]);
                 DB::table('rendezvoustypes')->insert([
                'type'=>'neurologie',
                 ]);
                 DB::table('rendezvoustypes')->insert([
                    'type'=>'traumatologie',
                     ]);
              
            
    }
}
