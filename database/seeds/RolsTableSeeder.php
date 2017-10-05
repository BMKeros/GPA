<?php

use Illuminate\Database\Seeder;

use App\Rol;

class RolsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Rol::insert([
            [
                'id' => 1,
                'name' => 'USER'
            ],
            [
                'id' => 2,
                'name' => 'ADMIN'
            ],
            [
                'id' => 3,
                'name' => 'SOCIO'
            ]
        ]);
    }
}
