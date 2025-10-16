<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class CustomersSeeder extends Seeder
{
    public function run()
    {
        $data = [
            ['name' => 'Toko Jaya Abadi', 'contact' => '08123456781', 'address' => 'Depok'],
            ['name' => 'CV Sinar Terang', 'contact' => '08123456782', 'address' => 'Bekasi'],
        ];

        $this->db->table('customers')->insertBatch($data);
    }
}
