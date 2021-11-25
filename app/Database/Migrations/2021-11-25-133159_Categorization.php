<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Categorization extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'category_id' => [
                'type' => 'INT',
            ],
            'book_id' => [
                'type' => 'INT',
            ],
        ]);
        $this->forge->addForeignKey('category_id', 'category', 'category_id');
        $this->forge->addForeignKey('book_id', 'book', 'book_id');
        $this->forge->createTable('categorization');
    }

    public function down()
    {
        $this->forge->dropTable('user_profile');
    }
}
