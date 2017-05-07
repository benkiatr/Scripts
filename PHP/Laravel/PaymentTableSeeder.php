<?php

use Illuminate\Database\Seeder;

class PaymentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('payments')->insert([
            [
                'name'         => 'Efectivo',
                'description'  => 'Pago en efectivo directamente en las oficinas de la empresa',
                'status'       => 1,
                'created_at'   => date('Y-m-d H:i:s'),
                'updated_at'   => date('Y-m-d H:i:s')
            ],
            [
                'name' => 'Depósito',
                'description' => 'Deposito a cuentas de la empresa',
                'status' => 1,
                'created_at'          => date('Y-m-d H:i:s'),
                'updated_at'          => date('Y-m-d H:i:s')
            ],
            [
                'name' => 'Cheques',
                'description' => 'Pago con cheques a nombre de la empresa',
                'status' => 1,
                'created_at'          => date('Y-m-d H:i:s'),
                'updated_at'          => date('Y-m-d H:i:s')
            ],
            [
                'name' => 'Transferencia',
                'description' => 'Transferencia interbancaria a la cuentas de la empresa',
                'status' => 1,
                'created_at'          => date('Y-m-d H:i:s'),
                'updated_at'          => date('Y-m-d H:i:s')
            ],
            [
                'name' => 'Intercambio',
                'description' => 'Pago por medio de otros productos',
                'status' => 1,
                'created_at'          => date('Y-m-d H:i:s'),
                'updated_at'          => date('Y-m-d H:i:s')
            ],
            [
                'name' => 'Vales',
                'description' => 'Pago con vales de Despensa, Comida',
                'status' => 1,
                'created_at'          => date('Y-m-d H:i:s'),
                'updated_at'          => date('Y-m-d H:i:s')
            ],
            [
                'name' => 'No Identificado',
                'description' => '',
                'status' => 1,
                'created_at'          => date('Y-m-d H:i:s'),
                'updated_at'          => date('Y-m-d H:i:s')
            ]
        ]);
    }
}
