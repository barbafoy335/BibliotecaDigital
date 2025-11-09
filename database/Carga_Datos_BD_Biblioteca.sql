-- Cargar de Datos en la Base de Datos: Biblioteca

use biblioteca;

-- Tabla LIBRO - Carga de Datos: 10 registros (10 libros)
INSERT INTO libro (id_autor, id_categoria, titulo, isbn, nombre_editorial, anio_creacion) VALUES
(1, 2, 'Guía esencial para la vida sostenible', '978-84-12345-67-0', 'EcoHabits Publicaciones', 2023),
(3, 2, 'Aprende a meditar en 21 días', '978-84-12345-68-7', 'Mente Clara Ediciones', 2024),
(5, 2, 'Historia del arte moderno: Un manual para principiantes', '978-84-12345-69-4', ' UniversArte', 2022),
(2, 1, 'Fundamentos de la Ciberseguridad Moderna', '978-84-12345-70-0', 'Tech Solutions Press', 2021),
(4, 1, 'Introducción a la Inteligencia Artificial y Machine Learning', '978-84-12345-71-7', 'Data Driven Books', 2025),
(5, 1,'Ingeniería de Software: Principios y Prácticas Ágiles', '978-84-12345-72-4', 'Editorial Byte', 2020),
(1, 1, 'Manual Avanzado de Botánica Tropical', '978-84-12345-73-1', 'Ciencias Naturales Ediciones', 2024),
(3, 3, 'El susurro del cuervo', '978-84-12345-74-8', 'Tinta Negra Editores', 2023),
(2, 3, 'Poemas del Ocaso y la Aurora', '978-84-12345-75-5', 'Lira y Verso Publicaciones', 2022),
(4, 3,'Los puentes de la memoria', '978-84-12345-76-2', 'Editorial Legado', 2021);

select * from libro;

-- Tabla AUTOR - Carga de Datos: 5 registros (5 autores)
INSERT INTO autor (nombres_autor, apellidos_autor, fecha_nacimiento, nacionalidad) VALUES
('Kai Leonardo','chmidt Müller','1975-11-30','Aleman'),
('Elena Valentina','Rossi Ferrari','1988-08-05','Italiana'),
('David Michael','Chen Li','1992-01-12','Estadounidense'),
('María Guadalupe','García Hernández','1980-04-24','Mexicana'),
('Hiroshi Kenji','Tanaka Nakamura','1971-10-19','Japonesa');

select * from autor;

-- Tabla CATEGORIA Carga de Datos: 3 registros (3 categorias)
INSERT INTO categoria (nombre_categoria, observacion) VALUES
('Tecnico','Libros tecnicos o profesionales'),
('Informativo', 'Libros informativos como textos de historia o manuales cocina'),
('Literario','Libros de poemas, cuentos, novelas o ficcion');

select * from categoria;
