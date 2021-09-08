<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class DbTransaksi extends Migration
{
	public function up()
	{
		//
		$this->forge->addField([
            'id_transaksi' => [
                'type' => 'INT',
                'unsigned' => TRUE,
                'auto_increment' => TRUE
            ],
			'noperiksa' => [
                'type' => 'VARCHAR',
                'constraint' => '50',
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
			'kondisifisik' => [
                'type' => 'VARCHAR',
                'constraint' => '50',
			],
			'kondisipin' => [
                'type' => 'VARCHAR',
                'constraint' => '50',
			],
			'kondisitekanan' => [
                'type' => 'VARCHAR',
                'constraint' => '50',
			],
			'kondisinozzle' => [
                'type' => 'VARCHAR',
                'constraint' => '50',
			],
			'kondisiselang' => [
                'type' => 'VARCHAR',
                'constraint' => '50',
			],
            'dibuat' => [
                'type' => 'DATETIME',
            // 'default'        => 'current_timestamp()',
            ],
            'diedit' => [
                'type' => 'DATETIME',
            // 'default'        => 'current_timestamp()',
            ]
        ]);
		$this->forge->addKey('id_transaksi', TRUE);
        $this->forge->createTable('transaksi');
	}

	public function down()
	{
		//
        //      
		$this->forge->dropTable('transaksi');
	}
}
