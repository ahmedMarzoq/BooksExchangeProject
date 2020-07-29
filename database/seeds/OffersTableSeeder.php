<?php

use Illuminate\Database\Seeder;

class OffersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i = 1 ; $i < 11 ; $i+= 1){
        
            DB::table('offers')->insert([
                'type' => Str::random(10),
                'book_id' => $i,
                
            ]);

            }
    }
}
