<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateDeliveriesTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'           => ['type' => 'INT','constraint' => 11,'unsigned' => true,'auto_increment' => true],
            'delivery_number' => ['type' => 'VARCHAR','constraint' => 100],
            'so_id'        => ['type' => 'INT','constraint' => 11,'unsigned' => true],
            'approved_by'  => ['type' => 'INT','constraint' => 11,'unsigned' => true],
            'status'       => ['type' => 'VARCHAR','constraint' => 50],
            'created_at'   => ['type' => 'DATETIME','null' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('so_id', 'sales_orders', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('approved_by', 'users', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('deliveries', true, ['ENGINE' => 'InnoDB']);
    }

    public function down()
    {
        $this->forge->dropTable('deliveries');
    }
}
