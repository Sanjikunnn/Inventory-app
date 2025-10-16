<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateGoodsReceiptsTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'          => ['type' => 'INT','constraint' => 11,'unsigned' => true,'auto_increment' => true],
            'grn_number'  => ['type' => 'VARCHAR','constraint' => 100],
            'po_id'       => ['type' => 'INT','constraint' => 11,'unsigned' => true],
            'approved_by' => ['type' => 'INT','constraint' => 11,'unsigned' => true, 'null' => true],
            'status'      => ['type' => 'VARCHAR','constraint' => 50],
            'created_at'  => ['type' => 'DATETIME','null' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('po_id', 'purchase_orders', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('approved_by', 'users', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('goods_receipts', true, ['ENGINE' => 'InnoDB']);
    }

    public function down()
    {
        $this->forge->dropTable('goods_receipts');
    }
}
