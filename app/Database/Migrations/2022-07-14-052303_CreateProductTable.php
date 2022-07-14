<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateProductTable extends Migration
{
    public function up()
    {
        // Products
        $this->forge->addField([
            'id'               => ['type' => 'int', 'constraint' => 5, 'unsigned' => true, 'auto_increment' => true],
            'name'             => ['type' => 'varchar', 'constraint' => 100],
            'description'      => ['type' => 'text'],
            'amount'           => ['type' => 'int', 'constraint' => 5, 'null' => 0],
            'status'           => ['type' => 'int', 'constraint' => 5, 'null' => 0, 'default' => '1'],
            'created_at'       => ['type' => 'datetime', 'null' => true],
            'updated_at'       => ['type' => 'datetime', 'null' => true],
            'deleted_at'       => ['type' => 'datetime', 'null' => true],
        ]);

        $this->forge->addKey('id', true);

        $this->forge->createTable('products', true);
    }

    public function down()
    {
        // drop products table
        $this->forge->dropTable('products', true);
    }
}
