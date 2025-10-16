<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateStockMovementsTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'            => ['type' => 'INT','constraint' => 11,'unsigned' => true,'auto_increment' => true],
            'item_id'       => ['type' => 'INT','constraint' => 11,'unsigned' => true],
            'warehouse_id'  => ['type' => 'INT','constraint' => 11,'unsigned' => true],
            'ref_type'      => ['type' => 'VARCHAR','constraint' => 100],
            'ref_id'        => ['type' => 'INT','constraint' => 11,'unsigned' => true],
            'change_qty'    => ['type' => 'INT','constraint' => 11],
            'balance_after' => ['type' => 'INT','constraint' => 11],
            'note'          => ['type' => 'TEXT','null' => true],
            'created_at'    => ['type' => 'DATETIME','null' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('item_id', 'items', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('warehouse_id', 'warehouses', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('stock_movements', true, ['ENGINE' => 'InnoDB']);
    }

    public function down()
    {
        $this->forge->dropTable('stock_movements');
    }
}
