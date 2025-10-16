<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateSuppliersTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'      => ['type' => 'INT', 'unsigned' => true, 'auto_increment' => true],
            'name'    => ['type' => 'VARCHAR', 'constraint' => 150],
            'contact' => ['type' => 'VARCHAR', 'constraint' => 100, 'null' => true],
            'address' => ['type' => 'TEXT', 'null' => true],
            'phone'   => ['type' => 'VARCHAR', 'constraint' => 50, 'null' => true],
            'email'   => ['type' => 'VARCHAR', 'constraint' => 150, 'null' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('suppliers', true, ['ENGINE' => 'InnoDB']);
    }

    public function down()
    {
        $this->forge->dropTable('suppliers');
    }
}
