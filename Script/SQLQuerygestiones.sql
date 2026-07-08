use  SIG;


UPDATE CatGestion
    SET Imagen = 'Mapa-1.png'
    WHERE IdGestion = 28;


UPDATE CatGestion
    SET Imagen = 'Mapa-1-2.png'
    WHERE IdGestion IN (27);

UPDATE CatSubGestion
    SET Imagen = 'Mapa-1-01.png' 
    WHERE IdSubGestion = 5;

UPDATE CatSubGestion
    SET Imagen = 'Mapa-1-2-01.png' 
    WHERE IdSubGestion = 6;

UPDATE CatGestion
    SET Imagen = CASE 
    WHEN IdGestion = 29 THEN 'Mapa-2-1.png'
    WHEN IdGestion = 30 THEN 'Mapa-2-2.png'
    WHEN IdGestion = 31 THEN 'Mapa-2-3.png'
    WHEN IdGestion = 32 THEN 'Mapa-2-4.png'
    WHEN IdGestion = 33 THEN 'Mapa-2-5.png'
    ELSE Imagen 
END
WHERE IdGestion IN (29,30,31,32,33);


UPDATE CatGestion
SET Imagen = CASE 
    WHEN IdGestion = 34 THEN 'Mapa 3-1.png'
    WHEN IdGestion = 35 THEN 'Mapa 3-2.png'
    WHEN IdGestion = 39 THEN 'Mapa 3-4.png'
    WHEN IdGestion = 40 THEN 'Mapa 3-5.png'
    WHEN IdGestion = 41 THEN 'Mapa 3-6.png'
    WHEN IdGestion = 42 THEN 'Mapa 3-7.png'
    WHEN IdGestion = 43 THEN 'Mapa 3-3.png'
    ELSE Imagen 
END
WHERE IdGestion IN (34,35,39,40,41,42,43);



