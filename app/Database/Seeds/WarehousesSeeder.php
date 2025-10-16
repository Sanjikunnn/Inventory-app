<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class WarehousesSeeder extends Seeder
{
    public function run()
    {
        $data = [
            ['name' => 'Gudang Utama', 'location' => 'Jakarta'],
            ['name' => 'Gudang Cabang', 'location' => 'Surabaya'],
        ];

        $this->db->table('warehouses')->insertBatch($data);
    }
}
