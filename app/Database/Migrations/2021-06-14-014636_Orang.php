<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Orang extends Migration
{
	public function up()
	{
		// buat tabel orang
		 $this->forge->addField([
                        'id'          => [
                                'type'           => 'INT',
                                'constraint'     => 11,
                                'unsigned'       => true, // supaya nilainya positif
                                'auto_increment' => true,
                        ],
                        'nama'       => [
                                'type'       => 'VARCHAR',
                                'constraint' => '255',
                        ],
                        'alamat' => [
                                'type'       => 'VARCHAR',
                                'constraint' => '255',
                        ],
                        'created_at' => [
                                'type'       => 'DATETIME',
                                'null' 		 => true,
                        ],
                        'updated_at' => [
                                'type'       => 'DATETIME',
                                'null' 		 => true,
                        ],
                ]);
                $this->forge->addKey('id', true);
                $this->forge->createTable('orang');
	}

	public function down()
	{
		//hapus tabel orang
		$this->forge->dropTable('orang');
	}
}