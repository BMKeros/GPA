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
                'id' => 1,
                'name' => 'admin',
                'email' => 'admin@bmkeros.org.ve',
                'password' => bcrypt('admin'),
            ],
            [   
                'id' => 2,
                'name' => 'user',
                'email' => 'user@bmkeros.org.ve',
                'password' => bcrypt('user'),
            ],
            [
                'id' => 3,
                'name' => 'socio',
                'email' => 'socio@bmkeros.org.ve',
                'password' => bcrypt('socio'),
            ],
        ];

        User::insert($data);
    }
}
