<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Migration_Insertar_nuevo_permiso_en_table_permisos extends CI_Migration
{
	public function up()
	{
		$this->db->query("ALTER TABLE dbo.Permisos ALTER COLUMN Nombre NVARCHAR(300) NULL;");
		$this->db->query("ALTER TABLE dbo.Permisos ALTER COLUMN Descripcion NVARCHAR(300) NULL;");

		$this->db->query("SET IDENTITY_INSERT SIG.dbo.Permisos ON;");
		$this->db->query("INSERT INTO SIG.dbo.Permisos 
    (IdPermiso, Nombre, Descripcion, Estado, IdUsuarioCrea, FechaCrea, IdUsuarioEdita, FechaEdita)
    VALUES (10, N'Permiso para visualizar Todas las Áreas en módulo indicadores',
            N'Permiso para visualizar Todas las Áreas en módulo indicadores',
            N'ACTIVO', 1, NULL, NULL, NULL);");
		$this->db->query("SET IDENTITY_INSERT SIG.dbo.Permisos OFF;");
	}

	public function down()
	{
		// Eliminar el permiso insertado
		$this->db->query("DELETE FROM SIG.dbo.Permisos 
            WHERE Nombre = N'Permiso para visualizar Todas las Áreas en módulo indicadores' 
              AND Descripcion = N'Permiso para visualizar Todas las Áreas en módulo indicadores'");

		$this->db->query("ALTER TABLE dbo.Permisos ALTER COLUMN Nombre NVARCHAR(100) NULL;");
		$this->db->query("ALTER TABLE dbo.Permisos ALTER COLUMN Descripcion NVARCHAR(100) NULL;");
	}
}
