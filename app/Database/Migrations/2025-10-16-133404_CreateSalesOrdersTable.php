<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateSalesOrdersTable extends Migration
{
    public function up()
    {
        // Pastikan tabel 'customers' dan 'users' sudah ada sebelum bikin FK
        if (! $this->db->tableExists('customers') || ! $this->db->tableExists('users')) {
            echo "⚠️ Tabel 'customers' atau 'users' belum ada.\n";
            return;
        }

        $this->forge->addField([
            'id'           => ['type' => 'INT','constraint' => 11,'unsigned' => true,'auto_increment' => true],
            'so_number'    => ['type' => 'VARCHAR','constraint' => 100],
            'customer_id'  => ['type' => 'INT','constraint' => 11,'unsigned' => true],
            'user_id'      => ['type' => 'INT','constraint' => 11,'unsigned' => true],
            'total_amount' => ['type' => 'DECIMAL','constraint' => '15,2','default' => 0.00],
            'status'       => ['type' => 'VARCHAR','constraint' => 50],
            'created_at'   => ['type' => 'DATETIME','null' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('customer_id', 'customers', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('user_id', 'users', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('sales_orders', true, ['ENGINE' => 'InnoDB']);
    }

    public function down()
    {
        // Drop dulu foreign key-nya sebelum drop table
        if ($this->db->tableExists('sales_orders')) {
            $this->forge->dropForeignKey('sales_orders', 'sales_orders_customer_id_foreign');
            $this->forge->dropForeignKey('sales_orders', 'sales_orders_user_id_foreign');
            $this->forge->dropTable('sales_orders');
        }
    }
}
