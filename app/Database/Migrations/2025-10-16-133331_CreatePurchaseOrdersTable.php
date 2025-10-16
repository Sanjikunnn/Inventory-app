<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreatePurchaseOrdersTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'po_number' => ['type' => 'VARCHAR', 'constraint' => 100],
            'supplier_id' => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true],
            'user_id' => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true],
            'total_amount' => ['type' => 'DECIMAL', 'constraint' => '15,2', 'default' => 0.00],
            'status' => ['type' => 'VARCHAR', 'constraint' => 50],
            'created_at' => ['type' => 'DATETIME', 'null' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('purchase_orders', true, ['ENGINE' => 'InnoDB']);


    }

    public function down()
    {
        $this->forge->dropTable('purchase_orders');
    }
}
