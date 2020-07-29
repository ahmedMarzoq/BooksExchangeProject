<?php

use Illuminate\Database\Seeder;

class BooksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        for($i = 1 ; $i < 11 ; $i+= 1){
        
            DB::table('books')->insert([
                'name' => Str::random(10),
                'description' => Str::random(10),
                'category' => Str::random(10),
                'status' => Str::random(10),
                'owner_id' => $i,
                
            ]);

            }
    }
}
