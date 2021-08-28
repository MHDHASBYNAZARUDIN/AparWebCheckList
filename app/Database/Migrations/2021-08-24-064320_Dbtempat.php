<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Dbtempat extends Migration
{
	public function up()
	{
		$this->forge->addField([
		'id_lokasi' => [
			'type' => 'INT',
			'unsigned' => TRUE,
			'auto_increment' => TRUE
		],
		'lokasi' => [
			'type' => 'VARCHAR',
			'constraint' => '50',
			]
	]);
	$this->forge->addKey('id_lokasi', TRUE);
	$this->forge->createTable('tempat');
	}

	public function down()
	{
		//
		$this->forge->dropTable('tempat');
	}
}
