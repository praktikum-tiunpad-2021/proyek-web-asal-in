<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Book extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'book_id' => [
                'type' => 'INT',
                'auto_increment' => true,
            ],
            'isbn' => [
                'type' => 'VARCHAR',
                'constraint' => '13',
            ],
            'title' => [
                'type' => 'VARCHAR',
                'constraint' => '256',
            ],
            'author' => [
                'type' => 'VARCHAR',
                'constraint' => '128',
            ],
            'publisher' => [
                'type' => 'VARCHAR',
                'constraint' => '128',
            ],
            'publication_date' => [
                'type' => 'DATE',
            ],
            'pages' => [
                'type' => 'INT',
            ],
            'status' => [
                'type' => 'ENUM',
                'constraint' => ['BOOKED', 'BORROWED', 'AVAILABLE', 'UNAVAILABLE'],
                'default' => 'UNAVAILABLE',
            ],
        ]);
        $this->forge->addPrimaryKey('book_id');
        $this->forge->createTable('book');
    }

    public function down()
    {
        $this->forge->dropTable('book');
    }
}
