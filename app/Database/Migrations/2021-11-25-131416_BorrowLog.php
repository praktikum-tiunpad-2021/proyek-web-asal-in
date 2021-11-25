<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class BorrowLog extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'borrow_log_id' => [
                'type' => 'INT',
                'auto_increment' => true,
            ],
            'user_id' => [
                'type' => 'INT',
            ],
            'book_id' => [
                'type' => 'INT',
            ],
            'reservation_date' => [
                'type' => 'DATE',
            ],
            'borrowing_date' => [
                'type' => 'DATE',
                'null' => true,
            ],
            'returning_date' => [
                'type' => 'DATE',
                'null' => true,
            ],
            'status' => [
                'type' => 'ENUM',
                'constraint' => ['BOOKED', 'IN_PROGRESS', 'DECLINED', 'RETURNED'],
                'default' => 'BOOKED',
            ],
        ]);
        $this->forge->addPrimaryKey('borrow_log_id');
        $this->forge->addForeignKey('user_id', 'user', 'user_id');
        $this->forge->addForeignKey('book_id', 'book', 'book_id');
        $this->forge->createTable('borrow_log');
    }

    public function down()
    {
        $this->forge->dropTable('borrow_log');
    }
}
