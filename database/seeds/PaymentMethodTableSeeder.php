<?php

use Illuminate\Database\Seeder;
use App\PaymentMethod;


class PaymentMethodTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PaymentMethod::insert([
            [
                'name' => 'Transferencia',
            ],
            [
                'name' => 'Tarjeta de Credito',
            ],
            [
                'name' => 'Tarjeta de Debito',
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
        ]);
    }
}
