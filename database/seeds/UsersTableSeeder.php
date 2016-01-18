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
        for($i = 2; $i<=10; $i++) {
            DB::table('users')->insert([
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
