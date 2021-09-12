<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TambahTransaksiApar extends Migration
{
	public function up()
	{
		//
		$this->forge->addColumn('apar',[
			'noperiksa' => [
                'type' => 'VARCHAR',
                'constraint' => '50',
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
