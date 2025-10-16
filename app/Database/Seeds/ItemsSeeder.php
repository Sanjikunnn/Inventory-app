<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class ItemsSeeder extends Seeder
{
    public function run()
    {
        $data = [
            ['name' => 'Baut 12mm', 'unit' => 'pcs', 'price' => 1000],
            ['name' => 'Mur 12mm', 'unit' => 'pcs', 'price' => 800],
            ['name' => 'Kawat Las', 'unit' => 'kg', 'price' => 30000],
        ];

        $this->db->table('items')->insertBatch($data);
    }
}
