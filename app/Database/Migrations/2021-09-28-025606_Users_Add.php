<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class User_sAdd extends Migration
{
    public function up() {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'unsigned' => TRUE,
                'auto_increment' => TRUE
            ],
            'firstname' => [
                'type' => 'VARCHAR',
                'constraint' => '50',
            ],
            'lastname' => [
                'type' => 'VARCHAR',
                'constraint' => '50',
            ],
            'email' => [
                'type' => 'VARCHAR',
                'constraint' => '50',
            ],
            'password' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'created_at' => [
                'type' => 'DATETIME',
            // 'default'        => 'current_timestamp()',
            ],
            'updated_at' => [
                'type' => 'DATETIME',
            // 'default'        => 'current_timestamp()',
            ],
            'role' => [
                'type' => 'INT',
                'default' => '2',
            ],
            'status' => [
                'type' => 'INT',
                'default' => '1',
            ],
        ]);
        $this->forge->addKey('id', TRUE);
        $this->forge->createTable('users');
    }

    public function down() {
        $this->forge->dropTable('users');
    }
}
