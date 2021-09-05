<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class DbJenis extends Migration
{
	public function up()
	{
		//
		$this->forge->addField([
            'id_jenis' => [
                'type' => 'INT',
                'unsigned' => TRUE,
                'auto_increment' => TRUE
            ],
            'jenis' => [
                'type' => 'VARCHAR',
				'constraint' => '50',
            ]
        ]);
		$this->forge->addKey('id_jenis', TRUE);
        $this->forge->createTable('Tjenis');
	}

	public function down()
	{
		//
		$this->forge->dropTable('Tjenis');
	}
}
