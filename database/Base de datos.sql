CREATE DATABASE senati;
USE senati;

CREATE TABLE cursos 
(

 idcurso      INT AUTO_INCREMENT PRIMARY KEY,
 nombrecurso VARCHAR(50)  NOT NULL,
 especialidad VARCHAR(70) NOT NULL,
 complejidad CHAR(1) NOT NULL DEFAULT 'B',
 fechainicio DATE       NOT NULL,
 precio      DECIMAL(7,2) NOT NULL,
 fechacreacion DATETIME NOT NULL DEFAULT NOW(),
 fechaupdate DATETIME        NULL,
 estado          CHAR(1)     NOT NULL DEFAULT '1'
)ENGINE = INNODB;

INSERT INTO cursos(nombrecurso, especialidad, complejidad, fechainicio, precio) VALUES
('Java','ETI','M','2023-05-10', 180),
('Desarrollo Web','ETI','B','2023-04-20', 190),
('Excel financiero','Administracion','A','2023-05-14', 250),
('ERP SAP','Administracion','A','2023-05-11', 400),
('Inventor','Mecanica','M','2023-04-29', 380);

SELECT * FROM cursos;

-- store procedure
-- un procedimiento almacenado es un programa que se ejecuta desde el
-- motor de BD, y que permite recibir valores de entrada, realizar
-- diferentes tipos de calculos y entregar una salida.
DELIMITER $$
CREATE PROCEDURE spu_cursos_listar()
BEGIN
  SELECT idcurso,
         nombrecurso,
         especialidad,
         complejidad,
         fechainicio,
         precio
  FROM cursos
  WHERE estado = '1'
  ORDER BY idcurso DESC;
END $$

CALL spu_cursos_listar();

-- Procedimiento registrar cursos
DELIMITER $$
CREATE PROCEDURE spu_cursos_registrar
(
  IN _nombrecurso  VARCHAR(50),
  IN _especialidad VARCHAR(70),
  IN _complejidad  CHAR(1),
  IN _fechainicio  DATE,
  IN _precio       DECIMAL(7,2)
  
)
BEGIN
 INSERT INTO cursos (nombrecurso, especialidad, complejidad, fechainicio, precio) VALUES
(_nombrecurso, _especialidad, _complejidad, _fechainicio, _precio);
END $$

CALL spu_cursos_registrar('Python para todos','ETI', 'B', '2023-05-10', 120)
CALL spu_cursos_listar();