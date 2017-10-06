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
        $data = [
            [
                'name' => 'admin',
                'email' => 'admin@bmkeros.org.ve',
                'password' => bcrypt('admin'),
                'role_id' => 1
            ],
            [
                'name' => 'user',
                'email' => 'user@bmkeros.org.ve',
                'password' => bcrypt('user'),
                'role_id' => 2
            ],
            [
                'name' => 'socio',
                'email' => 'socio@bmkeros.org.ve',
                'password' => bcrypt('socio'),
                'role_id' => 3
            ],
        ];

        User::insert($data);
    }
}
