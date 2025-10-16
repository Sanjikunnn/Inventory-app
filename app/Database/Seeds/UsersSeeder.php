<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UsersSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'username'      => 'admin',
                'password_hash' => password_hash('admin123', PASSWORD_DEFAULT),
                'name'          => 'Administrator',
                'role'          => 'admin',
                'email'         => 'admin@example.com',
                'created_at'    => date('Y-m-d H:i:s'),
            ],
            [
                'username'      => 'staff',
                'password_hash' => password_hash('staff123', PASSWORD_DEFAULT),
                'name'          => 'Staff User',
                'role'          => 'staff',
                'email'         => 'staff@example.com',
                'created_at'    => date('Y-m-d H:i:s'),
            ],
        ];

        $this->db->table('users')->insertBatch($data);
    }
}
