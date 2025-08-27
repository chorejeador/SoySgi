<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Migration_Insertar_campo_en_tabla_tbldocumentos_gerentes extends CI_Migration
{
	public function up()
	{
		$sql = "
            ALTER TABLE dbo.TblDocumentosGerentes ADD IdArea INT NULL;
        ";
		$this->db->query($sql);
	}

	public function down()
	{
		$sql = "
            ALTER TABLE dbo.TblDocumentosGerentes DROP COLUMN IdArea;
        ";
		$this->db->query($sql);
	}
}
