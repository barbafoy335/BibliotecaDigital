-- Creacion de la BD, tablas, campos, relaciones de la Base de Datos: biblioteca
-- Versión ordenada para evitar problemas de claves foráneas

USE biblioteca;

-- Tabla AUTOR (debe crearse primero)
CREATE TABLE autor (
  id_autor INT PRIMARY KEY not null AUTO_INCREMENT,
  nombres_autor varchar(100) NOT null,
  apellidos_autor varchar(100) NOT null,
  fecha_nacimiento date NOT null,
  nacionalidad VARCHAR(100) not null
) ENGINE=InnoDB;

-- Tabla CATEGORIA (debe crearse antes que LIBRO)
CREATE TABLE categoria (
  id_categoria INT PRIMARY KEY not null AUTO_INCREMENT,
  nombre_categoria varchar(100) NOT null UNIQUE,
  observacion text NOT null
) ENGINE=InnoDB;

-- Tabla LIBRO (se crea al final porque depende de AUTOR y CATEGORIA)
CREATE TABLE libro (
  id_libro INT PRIMARY KEY not null AUTO_INCREMENT,
  id_autor int NOT null,
  id_categoria int NOT null,
  titulo VARCHAR(100) NOT NULL,
  isbn VARCHAR(100) not null UNIQUE,
  nombre_editorial VARCHAR(100) NOT null,
  anio_creacion int not null,
  constraint check_anio_creacion check(anio_creacion >= 1971 and anio_creacion <= 2025),
  constraint check_long_isbn check(LENGTH(isbn) between 12 and 17),
  constraint fk_id_autor foreign key(id_autor) references autor(id_autor) on delete cascade on update cascade,
  constraint fk_id_categoria foreign key(id_categoria) references categoria(id_categoria) on delete cascade on update cascade
) ENGINE=InnoDB;