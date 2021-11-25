<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Category extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'category_id' => [
                'type' => 'INT',
                'auto_increment' => true,
            ],
            'name' => [
                'type' => 'VARCHAR',
                'constraint' => '32',
            ],
        ]);
        $this->forge->addPrimaryKey('category_id');
        $this->forge->createTable('category');
    }

    public function down()
    {
        $this->forge->dropTable('category');
    }
}
