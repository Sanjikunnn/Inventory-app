<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class SuppliersSeeder extends Seeder
{
    public function run()
    {
        $data = [
            ['name' => 'PT Sumber Makmur', 'contact' => '08123456789', 'address' => 'Jakarta'],
            ['name' => 'CV Maju Jaya', 'contact' => '08198765432', 'address' => 'Bandung']
        ];

        $this->db->table('suppliers')->insertBatch($data);
    }
}
