<?php

use Illuminate\Database\Seeder;

class ContactsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i = 1 ; $i < 11 ; $i+= 1){
        
            DB::table('contact_info')->insert([
                'facebook_url' => "https://www.facebook.com/".Str::random(10),
                'phone_number' => rand(111111111, 999999999),
                
                'user_id' => $i,
                
            ]);

            }
    }
}
