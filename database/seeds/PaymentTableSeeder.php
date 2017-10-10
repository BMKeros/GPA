<?php

use Illuminate\Database\Seeder;
use App\Payment;


class PaymentTableSeeder extends Seeder
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

        Payment::insert($data);
    }
}
