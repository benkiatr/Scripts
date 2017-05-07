<?php

use Illuminate\Database\Seeder;

class ServiceTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('services')->insert([
            [
                'name'        => 'Servicios WEB',
                'description' => 'Desarrollo de paginas web, Landing Page, ',
                'status'      => 1,
                'created_at'  => date('Y-m-d H:i:s'),
                'updated_at'  => date('Y-m-d H:i:s')
            ],
            [
                'name'        => 'Sistemas',
                'description' => 'Desarrollo de Sistemas a medida, de información, manejo de paginas.',
                'status'      => 1,
                'created_at'  => date('Y-m-d H:i:s'),
                'updated_at'  => date('Y-m-d H:i:s')
            ],
            [
                'name'        => 'Redes Sociales',
                'description' => 'Manejo de redes sociales como Facebook, Twitter, Google Plus, Instagram, Youtube.',
                'status'      => 1,
                'created_at'  => date('Y-m-d H:i:s'),
                'updated_at'  => date('Y-m-d H:i:s')
            ],
            [
                'name'        => 'Google',
                'description' => 'Manejo de Google Adwords, e inversión de campañas.',
                'status'      => 1,
                'created_at'  => date('Y-m-d H:i:s'),
                'updated_at'  => date('Y-m-d H:i:s')
            ],
            [
                'name'        => 'Producción Audiovisual',
                'description' => 'Desarrollos de videos, stops y mas.',
                'status'      => 1,
                'created_at'  => date('Y-m-d H:i:s'),
                'updated_at'  => date('Y-m-d H:i:s')
            ],
            [
                'name'        => 'Fotografía',
                'description' => 'Seciones fotograficas, desarrollo de imagen.',
                'status'      => 1,
                'created_at'  => date('Y-m-d H:i:s'),
                'updated_at'  => date('Y-m-d H:i:s')
            ],
            [
                'name'        => 'Desarrollo de Apps',
                'description' => 'Desarrollo de Aplicaciones para iOS y Android.',
                'status'      => 1,
                'created_at'  => date('Y-m-d H:i:s'),
                'updated_at'  => date('Y-m-d H:i:s')
            ],
            [
                'name'        => 'Hosting',
                'description' => 'Servicio de hosting para el hospedaje de paginas web.',
                'status'      => 1,
                'created_at'  => date('Y-m-d H:i:s'),
                'updated_at'  => date('Y-m-d H:i:s')
            ],
            [
                'name'        => 'Soporte y Mantenimiento',
                'description' => 'Soporte a clientes con alguna condiguración, mantenimiento preventivo y correctivo del equipo de computo',
                'status'      => 1,
                'created_at'  => date('Y-m-d H:i:s'),
                'updated_at'  => date('Y-m-d H:i:s')
            ],
            [
                'name'        => 'Diseño',
                'description' => 'Diseño de marca, Páginas web, identidad empresarial etc.',
                'status'      => 1,
                'created_at'  => date('Y-m-d H:i:s'),
                'updated_at'  => date('Y-m-d H:i:s')
            ],
            [
                'name'        => 'Computo y Electrónica',
                'description' => 'Venta de equipo de computo, tv,',
                'status'      => 1,
                'created_at'  => date('Y-m-d H:i:s'),
                'updated_at'  => date('Y-m-d H:i:s')
            ],
            [
                'name'        => 'Stand y Totems',
                'description' => 'Venta de SmartScreen',
                'status'      => 1,
                'created_at'  => date('Y-m-d H:i:s'),
                'updated_at'  => date('Y-m-d H:i:s')
            ],
            [
                'name'        => 'Digital Signage',
                'description' => '',
                'status'      => 1,
                'created_at'  => date('Y-m-d H:i:s'),
                'updated_at'  => date('Y-m-d H:i:s')
            ],
            [
                'name'        => 'Espacio Comercial',
                'description' => 'Renta de Espacio comercial en plazas, supermercado etc.',
                'status'      => 1,
                'created_at'  => date('Y-m-d H:i:s'),
                'updated_at'  => date('Y-m-d H:i:s')
            ]
            ,
            [
                'name'        => 'Circuito SmartAds',
                'description' => 'Renta de Espacio en smartads en cualquier circuito',
                'status'      => 1,
                'created_at'  => date('Y-m-d H:i:s'),
                'updated_at'  => date('Y-m-d H:i:s')
            ]
        ]);
    }
}
