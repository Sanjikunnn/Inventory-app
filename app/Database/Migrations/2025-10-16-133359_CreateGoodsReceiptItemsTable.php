<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateGoodsReceiptItemsTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'           => ['type' => 'INT','constraint' => 11,'unsigned' => true,'auto_increment' => true],
            'grn_id'       => ['type' => 'INT','constraint' => 11,'unsigned' => true],
            'item_id'      => ['type' => 'INT','constraint' => 11,'unsigned' => true],
            'warehouse_id' => ['type' => 'INT','constraint' => 11,'unsigned' => true],
            'qty'          => ['type' => 'INT','constraint' => 11,'default' => 0],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('grn_id', 'goods_receipts', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('item_id', 'items', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('warehouse_id', 'warehouses', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('goods_receipt_items', true, ['ENGINE' => 'InnoDB']);
    }

    public function down()
    {
        $this->forge->dropTable('goods_receipt_items');
    }
}
