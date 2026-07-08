USE SIG;
GO

/* =========================
1. DESACTIVAR LO QUE NO SE USA
========================= */
UPDATE PortafolioCategoria
SET Estado = 'INA'
WHERE Descripcion IN ('Enlatados', 'Productos Frescos', 'Premium');


/* =========================
2. AGREGAR COLUMNA FAMILIA
========================= */
ALTER TABLE PortafolioCategoria
ADD Familia VARCHAR(100);


/* =========================
3. ASIGNAR FAMILIAS
========================= */
UPDATE PortafolioCategoria
SET Familia = 'Embutidos'
WHERE Descripcion IN ('Jamones','Salchichas','Mortadelas','Chorizos');

UPDATE PortafolioCategoria
SET Familia = 'Carnes'
WHERE Descripcion = 'Carnes Molidas';

UPDATE PortafolioCategoria
SET Familia = 'Especiales'
WHERE Descripcion = 'Premium';

UPDATE PortafolioCategoria
SET Familia = 'Carnes'
WHERE Descripcion = 'Ahumados';


/* =========================
4. CREAR NUEVAS CATEGORÍAS
========================= */
INSERT INTO PortafolioCategoria
    (Descripcion, Familia, Estado)
VALUES
    ('Bacon', 'Embutidos', 'ACT');

INSERT INTO PortafolioCategoria
    (Descripcion, Familia, Estado)
VALUES
    ('Tortas para Hamburguesas', 'Carnes', 'ACT');


/* =========================
5. LIMPIAR DATOS VIEJOS
========================= */
DELETE FROM PortafolioCategoriaDetalle
WHERE IdDetalle IN (7,8,46,47,48,64,65,69,70);


/* =========================
6. INSERTAR PRODUCTOS
========================= */

-- Salchichas
INSERT INTO PortafolioCategoriaDetalle
    (IdPortafolioCategoria, Nombre, Descripcion, Imagen, Estado, FechaCrea, IdUsuarioCrea)
VALUES
    (6, 'Salchichas', 'Salchichas Munich', 'Premium3.jpg', 'ACT', GETDATE(), 1),
    (6, 'Salchichas', 'Salchichas Desayuno', 'Premium6.jpg', 'ACT', GETDATE(), 1),
    (6, 'Salchichas', 'Salchichas Coctel', 'salchicha2.jpg', 'ACT', GETDATE(), 1);

-- Tortas
INSERT INTO PortafolioCategoriaDetalle
    (IdPortafolioCategoria, Nombre, Descripcion, Imagen, Estado, FechaCrea, IdUsuarioCrea)
VALUES
    (10, 'Torta para Hamburguesas', 'Torta de Res', 'carnemolida1.jpg', 'ACT', GETDATE(), 1),
    (10, 'Torta para Hamburguesas', 'Torta de Pollo', 'carnemolida2.jpg', 'ACT', GETDATE(), 1),
    (10, 'Torta para Hamburguesas', 'Torta Premium', 'carnemolida3.jpg', 'ACT', GETDATE(), 1);

-- Carnes Molidas
INSERT INTO PortafolioCategoriaDetalle
    (IdPortafolioCategoria, Nombre, Descripcion, Imagen, Estado, FechaCrea, IdUsuarioCrea)
VALUES
    (7, 'Carnes Molidas', 'Chorizo Criollo', 'Salchicha7.jpg', 'ACT', GETDATE(), 1),
    (7, 'Carnes Molidas', 'Chorizo Criollo con huevo', 'Salchicha8.jpg', 'ACT', GETDATE(), 1);


/* =========================
7. NUEVAS FAMILIAS
========================= */
INSERT INTO PortafolioCategoria
    (Descripcion, Imagen, Estado, FechaCrea, IdUsuarioCrea)
VALUES
    ('Ahumados', NULL, 'ACT', GETDATE(), 1),
    ('Pollo Ahumado', NULL, 'ACT', GETDATE(), 1),
    ('Salchichón', NULL, 'ACT', GETDATE(), 1),
    ('Chorizos', NULL, 'ACT', GETDATE(), 1);



UPDATE PortafolioCategoria
SET Familia = 'Ahumados'
WHERE Descripcion IN ('Ahumados', 'Pollo Ahumado');

UPDATE PortafolioCategoria
SET Familia = 'Embutidos'
WHERE Descripcion IN ('Salchichón', 'Chorizos')

/* =========================
8. PRODUCTOS NUEVOS
========================= */

-- Ahumados
INSERT INTO PortafolioCategoriaDetalle
    (IdPortafolioCategoria, Descripcion, Imagen, Estado, FechaCrea, IdUsuarioCrea)
VALUES
    (11, 'Chuleta Ahumada', 'premium13.jpg', 'ACT', GETDATE(), 1),
    (11, 'Pierna Ahumada', 'premium10.jpg', 'ACT', GETDATE(), 1),
    (11, 'Pierna Ahumada', 'premium11.jpg', 'ACT', GETDATE(), 1),
    (11, 'Roller Ham', 'premium14.jpg', 'ACT', GETDATE(), 1),
    (11, 'Costilla Ahumada', 'premium12.jpg', 'ACT', GETDATE(), 1);

-- Pollo Ahumado
INSERT INTO PortafolioCategoriaDetalle
    (IdPortafolioCategoria, Descripcion, Imagen, Estado, FechaCrea, IdUsuarioCrea)
VALUES
    (12, 'Chuleta Ahumada', 'premium16.jpg', 'ACT', GETDATE(), 1);

-- Salchichón
INSERT INTO PortafolioCategoriaDetalle
    (IdPortafolioCategoria, Descripcion, Imagen, Estado, FechaCrea, IdUsuarioCrea)
VALUES
    (13, 'Salchichon', 'salchicha5.jpg', 'ACT', GETDATE(), 1),
    (13, 'Salchichon', 'salchicha6.jpg', 'ACT', GETDATE(), 1);

-- Chorizos
INSERT INTO PortafolioCategoriaDetalle
    (IdPortafolioCategoria, Descripcion, Imagen, Estado, FechaCrea, IdUsuarioCrea)
VALUES
    (14, 'Chorizo', 'Premium1.jpg', 'ACT', GETDATE(), 1),
    (14, 'Chorizo', 'Premium2.jpg', 'ACT', GETDATE(), 1),
    (14, 'Chorizo', 'Premium5.jpg', 'ACT', GETDATE(), 1),
    (14, 'Chorizo', 'Premium7.jpg', 'ACT', GETDATE(), 1);