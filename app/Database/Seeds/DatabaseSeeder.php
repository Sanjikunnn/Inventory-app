<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call('UsersSeeder');
        $this->call('SuppliersSeeder');
        $this->call('ItemsSeeder');
        $this->call('WarehousesSeeder');
        $this->call('CustomersSeeder');
    }
}
