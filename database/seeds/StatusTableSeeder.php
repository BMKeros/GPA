<?php

use Illuminate\Database\Seeder;

use App\Status;

class StatusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ["name" => 'Disponible'],
            ["name" => 'No Disponible']

        ];

        Status::insert($data);
    }
}