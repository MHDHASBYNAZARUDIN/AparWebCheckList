<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Add_Role extends Migration
{
    public function up()
	{
		$this->forge->addField([
            'id_role' => [
                'type' => 'INT',
                'unsigned' => TRUE,
                'auto_increment' => TRUE
            ],
            'role' => [
                'type' => 'VARCHAR',
				'constraint' => '50',
            ]
        ]);
		$this->forge->addKey('id_role', TRUE);
        $this->forge->createTable('Role');
	}

	public function down()
	{
		$this->forge->dropTable('Role');
	}
}
