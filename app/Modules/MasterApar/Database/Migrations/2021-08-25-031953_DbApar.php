<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class DbApar extends Migration
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
            'lokasi' => [
                'type' => 'VARCHAR',
				'constraint' => '50',
            ],
            'jenis' => [
                'type' => 'VARCHAR',
                'constraint' => '50',
            ],
			'masa_berlaku_awal' => [
                'type' => 'DATETIME',
            ],
			'masa_berlaku_akhir' => [
                'type' => 'DATETIME',
            ],
			'foto' => [
                'type' => 'BLOB',
            ],
			'Deskripsi' => [
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
        $this->forge->createTable('apar');
	}

	public function down()
	{
		//
		$this->forge->dropTable('apar');
	}
}
