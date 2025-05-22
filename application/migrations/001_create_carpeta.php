<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Migration_Create_carpeta extends CI_Migration
{
	public function up()
	{

		$this->dbforge->add_field(array(
			'id' => array(
				'type' => 'INT',
				'auto_increment' => TRUE,
			),
			'Nombre' => array(
				'type' => 'VARCHAR',
				'constraint' => '100',
			),
			'Descripcion' => array(
				'type' => 'VARCHAR',
				'constraint' => '100',
				'null' => TRUE,
			),
			'Estado' => array(
				'type' => 'TINYINT',
				'default' => 1
			),
			'IdUsuarioCrea' => array(
				'type' => 'INT',
			),
			'IdUsuarioEdita' => array(
				'type' => 'INT',
				'null' => TRUE
			),
			'FechaCrea' => [
				'type' => 'DATETIME',
				'null' => FALSE,
				'default' => 'getdate()'
			],
			'FechaEdita' => [
				'type' => 'DATETIME',
				'null' => TRUE
			],

		));

		$this->dbforge->add_key('id', TRUE);

		if ($this->dbforge->create_table('Carpetas')) {
			echo "Table users created successfully.";
		} else {
			echo "Failed to create table users.";
		}
	}

	public function down()
	{
		$this->dbforge->drop_table('Carpetas', TRUE);
	}

}
