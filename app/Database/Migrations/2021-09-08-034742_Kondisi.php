<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Kondisi extends Migration
{
	public function up()
	{
		$this->forge->addField([
            'id_kondisi' => [
                'type' => 'INT',
                'unsigned' => TRUE,
                'auto_increment' => TRUE
            ],
            'kondisi' => [
                'type' => 'VARCHAR',
				'constraint' => '50',
            ]
        ]);
		$this->forge->addKey('id_kondisi', TRUE);
        $this->forge->createTable('Tkondisi');
	}

	public function down()
	{
		//
		$this->forge->dropTable('Tkondisi');
	}
}
