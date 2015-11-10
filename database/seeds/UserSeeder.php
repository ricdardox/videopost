<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder {

    public function run() {

        App\User::insert([
            [
                'name' => 'Ricardo Jose Montes Rodriguez',
                'email' => 'ricardomontesrodriguez@gmail.com',
                'password' => bcrypt(123456),
                'username' => 'rmontes',
                'active' => true    ,
                'remember_token' => str_random(10),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ]
        ]);
    }

}
