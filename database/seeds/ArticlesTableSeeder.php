<?php

use Illuminate\Database\Seeder;

class ArticlesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i = 1; $i<=20; $i++) {
            DB::table('articles')->insert([
                'id'=> $i,
                'username' => str_random(10),
                'password' => bcrypt('secret'),
                'email' => str_random(10).'@gmail.com',
                'fullname' => str_random(15),
                'phone' => '0'.rand(1600000000,1699999999),
                'address' => ''
            ]);
        }
    }
}
