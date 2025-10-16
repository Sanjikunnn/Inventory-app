<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateSalesOrderItemsTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'           => ['type' => 'INT','constraint' => 11,'unsigned' => true,'auto_increment' => true],
            'so_id'        => ['type' => 'INT','constraint' => 11,'unsigned' => true],
            'item_id'      => ['type' => 'INT','constraint' => 11,'unsigned' => true],
            'warehouse_id' => ['type' => 'INT','constraint' => 11,'unsigned' => true],
            'qty'          => ['type' => 'INT','constraint' => 11,'default' => 0],
            'price'        => ['type' => 'DECIMAL','constraint' => '15,2','default' => 0.00],
            'subtotal'     => ['type' => 'DECIMAL','constraint' => '15,2','default' => 0.00],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('so_id', 'sales_orders', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('item_id', 'items', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('warehouse_id', 'warehouses', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('sales_order_items', true, ['ENGINE' => 'InnoDB']);
    }

    public function down()
    {
        $this->forge->dropTable('sales_order_items');
    }
}
