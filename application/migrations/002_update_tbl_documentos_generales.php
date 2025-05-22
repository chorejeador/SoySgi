<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Migration_Update_tbl_documentos_generales extends CI_Migration

{
	public function up()
	{
		// 1. Agregar columna manualmente (porque add_field no sirve aquí sin create_table)
		$this->db->query("ALTER TABLE TblDocumentosGenerales ADD IdCarpeta INT");

		// 2. Crear la clave foránea
		$this->db->query("ALTER TABLE TblDocumentosGenerales 
			ADD CONSTRAINT FK_TblDocumentosGenerales_IdCarpeta 
			FOREIGN KEY (IdCarpeta) REFERENCES Carpetas(id)");
	}

	public function down()
	{
		// Eliminar la restricción
		$this->db->query("ALTER TABLE TblDocumentosGenerales DROP CONSTRAINT FK_TblDocumentosGenerales_IdCarpeta");

		// Eliminar la columna
		$this->db->query("ALTER TABLE TblDocumentosGenerales DROP COLUMN IdCarpeta");
	}
}

