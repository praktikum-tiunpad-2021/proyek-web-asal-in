<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Book extends Migration
{
    public function up()
    {
        $this->forge->modifyColumn('book', [
            'status' => [
                'type' => 'ENUM',
                'constraint' => ['BOOKED', 'BORROWED', 'AVAILABLE', 'UNAVAILABLE'],
                'default' => 'UNAVAILABLE',
            ],
        ]);
    }

    public function down()
    {
        $this->forge->modifyColumn('book', [
            'status' => [
                'type' => 'ENUM',
                'constraint' => ['BOOKED', 'BORROWED', 'AVALIABLE', 'UNAVALIABLE'],
                'default' => 'UNAVALIABLE',
            ],
        ]);
    }
}
