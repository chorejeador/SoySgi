# 📦 Migraciones en CodeIgniter 3 (con SQL Server)

Este proyecto utiliza migraciones secuenciales para mantener el esquema de la base de datos versionado y controlado.

---


## 📁 Estructura de archivos
### Las migraciones se guardan en:
[application/migrations/]()


### Los archivos deben tener un número incremental y un nombre descriptivo, por ejemplo:

```
001_create_users.php
002_add_roles_table.php
```

# ✍️ Cómo crear una nueva migración en CodeIgniter 3

Este documento explica cómo crear manualmente una migración secuencial en CodeIgniter 3 paso a paso.

---

## 1️⃣ Paso 1: Asignar número de versión y nombre

Las migraciones **secuenciales** deben nombrarse con un número incremental de tres dígitos seguido de un nombre descriptivo en minúsculas y snake_case.

### 📌 Formato del nombre de archivo:
```
001_create_users.php
002_create_roles.php
003_add_foreign_keys.php
```

> 💡 Usa el número siguiente al de la última migración existente.

---

## 2️⃣ Paso 2: Crear el archivo

Ubicación:

`application/migrations/`


Ejemplo: `004_create_departamentos.php`

---

## 3️⃣ Paso 3: Crear la clase

- El nombre de la clase debe seguir el formato `Migration_Nombre`, con el nombre en PascalCase (por convención).
- Debe extender `CI_Migration`.
- Implementa los métodos `up()` y `down()`.

### ✅ Ejemplo 1:

```php
<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Migration_Create_departamentos extends CI_Migration
{
    public function up()
    {
        $this->dbforge->add_field(array(
            'id' => array(
                'type' => 'INT',
                'auto_increment' => TRUE
            ),
            'Nombre' => array(
                'type' => 'VARCHAR',
                'constraint' => '100'
            ),
            'Estado' => array(
				'type' => 'TINYINT',
				'default' => 1
			),
            'FechaCrea' => array(
                'type' => 'DATETIME',
                'null' => FALSE
            ),
            'FechaEdita' => array(
                'type' => 'DATETIME',
                'null' => TRUE
            )
        ));

        $this->dbforge->add_key('id', TRUE);

        if ($this->dbforge->create_table('Departamentos')) {
            echo "Tabla Departamentos creada correctamente.";
        }
    }

    public function down()
    {
        $this->dbforge->drop_table('Departamentos', TRUE);
    }
}
```

### ✅ Ejemplo 2:

```php
<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Migration_Create_carpeta_documentos extends CI_Migration
{
	public function up()
	{
		$this->dbforge->add_field(array(
			'id' => array(
				'type' => 'INT',
				'auto_increment' => TRUE,
			),
			'Descripcion' => array(
				'type' => 'VARCHAR',
				'constraint' => '100',
			),
			'IdUsuarioCrea' => array(
				'type' => 'INT',
			),
			'IdUsuarioEdita' => array(
				'type' => 'INT',
			),
			'FechaCrea' => array(
				'type' => 'DATETIME',
				'null' => FALSE
			),
			'FechaEdita' => array(
				'type' => 'DATETIME',
				'null' => TRUE
			),
			'IdDocumento' => array(
				'type' => 'INT',
			),
		));

		$this->dbforge->add_key('id', TRUE);

		if ($this->dbforge->create_table('CarpetasDocumentos')) {
			echo "Tabla creada correctamente.";

			$this->db->query('ALTER TABLE CarpetasDocumentos 
			ADD CONSTRAINT FK_CarpetasDocumentos_IdDocumento 
			FOREIGN KEY (IdDocumento) REFERENCES TblDocumentosGenerales(IdDocumento)');
		} else {
			echo "Error al crear la tabla.";
		}
	}

	public function down()
	{
		// Eliminar la foreign key por su nombre
		$this->db->query('ALTER TABLE CarpetasDocumentos DROP CONSTRAINT FK_CarpetasDocumentos_IdDocumento');

		// Luego eliminar la tabla
		$this->dbforge->drop_table('CarpetasDocumentos', TRUE);
	}

}
```
## ✅ Buenas prácticas
* Usa nombres claros y concisos.
* Mantén un control de versiones ordenado (001, 002, 003...).
* No repitas nombres de clases ni archivos.
* Verifica la sintaxis antes de ejecutar la migración.

---
## 🚀 Cómo ejecutar una migración
### ✅ Para aplicar la migración más reciente:

#### Abre en el navegador:

```bash
 https://localhost/SoySgi/index.php/migrate/
```




## ⏪ Cómo hacer rollback

### Puedes volver a una versión anterior ejecutando:

`http://localhost/index.php/migrate/rollback/{número}
`

Por ejemplo:

* Volver al estado inicial (sin migraciones):

```
https://localhost/SoySgi/index.php/migrate/rollback/0
```
* Volver a la migración 002:
```
https://localhost/SoySgi/index.php/migrate/rollback/2
```


