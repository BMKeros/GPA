<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
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
        $data = array( 
            [
                'name' => 'admin',
                'email' => 'admin@admin.com',
                'password' => bcrypt('admin'),
                'role_id' => 1
            ]
        );

        User::insert($data);
    }
}
