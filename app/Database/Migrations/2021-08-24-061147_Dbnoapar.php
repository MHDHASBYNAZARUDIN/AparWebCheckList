<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Dbnoapar extends Migration
{
	public function up()
	{
		//
		$this->forge->addField([
            'id_apar' => [
                'type' => 'INT',
                'unsigned' => TRUE,
                'auto_increment' => TRUE
            ],
            'id_lokasi' => [
                'type' => 'int',
            ],
            'noapar' => [
                'type' => 'VARCHAR',
                'constraint' => '50',
            ],
			'lokasi' => [
                'type' => 'VARCHAR',
                'constraint' => '50',
            ],
            'created_at' => [
                'type' => 'DATETIME',
            // 'default'        => 'current_timestamp()',
            ],
            'updated_at' => [
                'type' => 'DATETIME',
            // 'default'        => 'current_timestamp()',
            ]
        ]);
		$this->forge->addKey('id_apar', TRUE);
        $this->forge->createTable('no_apar');
	}

	public function down()
	{
		//
		$this->forge->dropTable('no_apar');
	}
}
