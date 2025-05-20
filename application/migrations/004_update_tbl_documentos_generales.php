<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Migration_Update_tbl_documentos_generales extends CI_Migration

{
	public function up()
	{
		$this->db->query("
			alter table dbo.TblDocumentosGenerales
    		add Directorio nvarchar(300)
		");

	}

	public function down()
	{
		$this->db->query("
			alter table dbo.TblDocumentosGenerales
			drop column Directorio");
	}
}

