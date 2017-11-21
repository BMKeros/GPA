<?php

use Illuminate\Database\Seeder;

use App\Permission;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Permission::insert([
            [
                'id' => 1,
                'name' => 'CREAR'
            ],
            [
                'id' => 2,
                'name' => 'LEER'
            ],
            [
                'id' => 3,
                'name' => 'EDITAR'
            ],
            [
                'id' => 4,
                'name' => 'ELIMINAR'
            ]
        ]);
    }
}
