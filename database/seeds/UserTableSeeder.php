<?php

use Illuminate\Database\Seeder;
use App\User;


class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::insert([
            [
                'name' => 'admin',
                'email' => 'admin@bmkeros.org.ve',
                'password' => bcrypt('admin'),
            ],
            [
                'name' => 'user',
                'email' => 'user@bmkeros.org.ve',
                'password' => bcrypt('user'),
            ],
            [
                'name' => 'socio',
                'email' => 'socio@bmkeros.org.ve',
                'password' => bcrypt('socio'),
            ],
        ]);
    }
}
