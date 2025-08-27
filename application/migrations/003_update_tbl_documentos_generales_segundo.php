<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Migration_Update_tbl_documentos_generales_segundo extends CI_Migration

{
	public function up()
	{
		$this->db->query("alter table dbo.TblDocumentosGenerales
    	alter column Url nvarchar(300) null");

	}

	public function down()
	{
		$this->db->query("alter table dbo.TblDocumentosGenerales
    	alter column Url nvarchar(50) null");
	}
}

