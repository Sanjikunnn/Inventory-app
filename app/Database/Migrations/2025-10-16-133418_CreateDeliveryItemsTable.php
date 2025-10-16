<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateDeliveryItemsTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'           => ['type' => 'INT','constraint' => 11,'unsigned' => true,'auto_increment' => true],
            'delivery_id'  => ['type' => 'INT','constraint' => 11,'unsigned' => true],
            'item_id'      => ['type' => 'INT','constraint' => 11,'unsigned' => true],
            'warehouse_id' => ['type' => 'INT','constraint' => 11,'unsigned' => true],
            'qty'          => ['type' => 'INT','constraint' => 11,'default' => 0],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('delivery_id', 'deliveries', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('item_id', 'items', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('warehouse_id', 'warehouses', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('delivery_items', true, ['ENGINE' => 'InnoDB']);
    }

    public function down()
    {
        $this->forge->dropTable('delivery_items');
    }
}
