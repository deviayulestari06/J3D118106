<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Mahasiswa extends Migration
{
	private $table='Mahasiswa';
	public function up()
	{
		$this->forge->addField([
			'nim'          => [
					'type'           => 'VARCHAR',
					'constraint'     => '9',
			],
			'nama'       => [
					'type'           => 'VARCHAR',
					'constraint'     => '100',
			],
			'jenis_kelamin' => [
					'type'           => 'ENUM',
					'constraint'     => ['Pria','Wanita'],
					'default'		 => 'Wanita',
			
			],
			'kode_agama' => [
				'type'           => 'INT',
				'constraint'     => 11,
				'unsigned'		 => true,
			
			],
			'alamat' => [
				'type'           => 'TEXT',
				//'constraint'     => 11,
				//'unsigned'		 => true,
			
			],
			'foto' => [
				'type'           => 'TEXT',
				//'constraint'     => 11,
				//'unsigned'		 => true,

			
			],
			'tempat_lahir' => [
				'type'           => 'VARCHAR',
				'constraint'     => '100',
				//'unsigned'		 => true,

			
			],
			'tanggal_lahir' => [
				'type'           => 'DATE',
				//'constraint'     => 11,
				//'unsigned'		 => true,

			
			],
			
		]);
		$this->forge->addKey('nim', true);
		$this->forge->addForeignKey('kode_agama','agama','kode_agama', 'CASCADE','CASCADE');
		$this->forge->createTable($this->table);
	}

	//--------------------------------------------------------------------

	public function down()
	{
		$this->forge->dropTable($this->table);
	}
}
