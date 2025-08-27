<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Migration_Insertar_campo_en_tabla_tbldocumentos_gerentes extends CI_Migration
{
	public function up()
	{
		if (!$this->db->field_exists('IdArea', 'TblDocumentosGerentes')) {
			$fields = [
				'IdArea' => [
					'type' => 'INT',
					'null' => TRUE,
				]
			];
			$this->dbforge->add_column('TblDocumentosGerentes', $fields);
		}
	}

	public function down()
	{
		if ($this->db->field_exists('IdArea', 'TblDocumentosGerentes')) {
			$this->dbforge->drop_column('TblDocumentosGerentes', 'IdArea');
		}
	}
}
