<?php

use Illuminate\Database\Seeder;
use App\Pyment;


class PymentTableSeeder extends Seeder
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
                'name' => 'Transferencia',

            ],
            [
                'name' => 'Targeta de Credito',

            ],
            [
                'name' => 'Targeta de Debito',

            ],
            [
                'name' => 'Cheques',

            ],
            [
                'name' => 'Efectivo',

            ],
            [
                'name' => 'Paypal',

            ],
            [
                'name' => 'Bitcoins',

            ],
        ];

        Pyment::insert($data);
    }
}
