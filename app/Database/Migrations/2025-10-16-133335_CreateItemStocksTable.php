<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateItemStocksTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'item_id'      => ['type' => 'INT'],
            'warehouse_id' => ['type' => 'INT'],
            'qty'          => ['type' => 'INT','default' => 0],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('item_stocks', true, ['ENGINE' => 'InnoDB']);
    }
    public function down()
    {
        $this->forge->dropTable('item_stocks');
    }

}
