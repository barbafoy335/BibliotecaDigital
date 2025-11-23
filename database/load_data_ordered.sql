-- Cargar de Datos en la Base de Datos: Biblioteca
-- Versión ordenada para evitar problemas de claves foráneas



-- Tabla AUTOR - Carga de Datos: 5 registros (5 autores)
INSERT INTO autor (nombres_autor, apellidos_autor, fecha_nacimiento, nacionalidad) VALUES
('Kai Leonardo','Schmidt Müller','1975-11-30','Aleman'),
('Elena Valentina','Rossi Ferrari','1988-08-05','Italiana'),
('David Michael','Chen Li','1992-01-12','Estadounidense'),
('María Guadalupe','García Hernández','1980-04-24','Mexicana'),
('Hiroshi Kenji','Tanaka Nakamura','1971-10-19','Japonesa');

-- Tabla CATEGORIA Carga de Datos: 3 registros (3 categorias)
INSERT INTO categoria (nombre_categoria, observacion) VALUES
('Tecnico','Libros tecnicos o profesionales'),
('Informativo', 'Libros informativos como textos de historia o manuales cocina'),
('Literario','Libros de poemas, cuentos, novelas o ficcion');


INSERT INTO editorial (nombre, telefono, correo, pais)VALUES
('Editorial Planeta', '+34 933 123 456', 'contacto@planeta.es', 'España'),
('Penguin Random House', '+1 212 555 7890', 'info@penguinrandomhouse.com', 'Estados Unidos'),
('Editorial Alfaguara', '+34 910 555 222', 'info@alfaguara.es', 'España'),
('Fondo de Cultura Económica', '+52 55 4350 9000', 'contacto@fce.com.mx', 'México'),
('Anagrama', '+34 932 174 707', 'editorial@anagrama-ed.es', 'España');


-- Tabla LIBRO - Carga de Datos: 10 registros (10 libros)
INSERT INTO libro (id_autor, id_categoria, id_editorial,  titulo, isbn, anio_creacion) VALUES
(1, 2, 2, 'Guía esencial para la vida sostenible', '978-84-12345-67-0', 2023),
(3, 2, 1, 'Aprende a meditar en 21 días', '978-84-12345-68-7', 2024),
(5, 2, 2, 'Historia del arte moderno: Un manual para principiantes', '978-84-12345-69-4', 2022),
(2, 1, 3, 'Fundamentos de la Ciberseguridad Moderna', '978-84-12345-70-0', 2021),
(4, 1, 4, 'Introducción a la Inteligencia Artificial y Machine Learning', '978-84-12345-71-7', 2025),
(5, 1, 5, 'Ingeniería de Software: Principios y Prácticas Ágiles', '978-84-12345-72-4', 2020),
(1, 1, 4, 'Manual Avanzado de Botánica Tropical', '978-84-12345-73-1', 2024),
(3, 3, 2, 'El susurro del cuervo', '978-84-12345-74-8', 2023),
(2, 3, 3, 'Poemas del Ocaso y la Aurora', '978-84-12345-75-5', 2022),
(4, 3, 1, 'Los puentes de la memoria', '978-84-12345-76-2', 2021);

