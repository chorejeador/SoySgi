USE SIG

SELECT Id, Mes, Anio, Estado
FROM TblDocumentosGerentes;
SELECT Id, Mes, Anio, Estado, IdArea
FROM TblDocumentosGerentes
ORDER BY Id DESC;


SELECT Id, Mes, Anio, Estado, IdArea
FROM TblDocumentosGerentes
WHERE IdArea = 2
ORDER BY Id DESC;


--documentos de prueba indicadores eliminacion 

delete from TblDocumentosGerentes
where Id =17;

DELETE FROM TblDocumentosGerentes
WHERE Id IN (15,16,17,18,19,20,21);
