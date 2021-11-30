<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class UserProfile extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'user_id' => [
                'type' => 'INT',
                'unique' => true,
            ],
            'name' => [
                'type' => 'VARCHAR',
                'constraint' => '128',
            ],
            'gender' => [
                'type' => 'ENUM',
                'constraint' => ['MALE', 'FEMALE', 'OTHER'],
                'null' => true
            ],
            'date_of_birth' => [
                'type' => 'DATE',
                'null' => true,
            ],
            'address' => [
                'type' => 'VARCHAR',
                'constraint' => '128',
                'null' => true,
            ],
            'status' => [
                'type' => 'ENUM',
                'constraint' => ['PELAJAR', 'MAHASISWA', 'UMUM', 'PENELITI'],
                'null' => true,
            ],
            'institution_name' => [
                'type' => 'VARCHAR',
                'constraint' => '64',
                'null' => true,
            ],
            'phone_number' => [
                'type' => 'VARCHAR',
                'constraint' => '15',
                'null' => true,
            ],
        ]);
        $this->forge->addForeignKey('user_id', 'user', 'user_id');
        $this->forge->createTable('user_profile');
    }

    public function down()
    {
        $this->forge->dropTable('user_profile');
    }
}
