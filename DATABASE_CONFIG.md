# Configuración de Base de Datos - Biblioteca Digital

## Base de Datos Configurada
- **Nombre**: biblioteca
- **Motor**: MySQL (utf8mb3)
- **Host**: 127.0.0.1
- **Puerto**: 3306
- **Usuario**: root
- **Contraseña**: (vacía)

## Tablas Creadas
1. **autor** - 10 registros
   - id_autor (PK)
   - nombres_autor
   - apellidos_autor
   - fecha_nacimiento
   - nacionalidad

2. **categoria** - 3 registros
   - id_categoria (PK)
   - nombre_categoria
   - observacion

3. **libro** - 10 registros
   - id_libro (PK)
   - id_autor (FK)
   - id_categoria (FK)
   - titulo
   - isbn
   - nombre_editorial
   - anio_creacion

## Modelos Laravel Configurados
- `App\Models\Author` - Mapea a tabla `autor`
- `App\Models\Book` - Mapea a tabla `libro`
- `App\Models\Category` - Mapea a tabla `categoria`

## Relaciones
- Un autor puede tener muchos libros
- Una categoría puede tener muchos libros
- Un libro pertenece a un autor y una categoría

## Archivos SQL
- `database/DataBase_Biblioteca.sql` - Estructura de BD
- `database/Carga_Datos_BD_Biblioteca.sql` - Datos iniciales
- `database/create_tables_ordered.sql` - Script ordenado para crear tablas
- `database/load_data_ordered.sql` - Script ordenado para cargar datos

## Estado
✅ Base de datos conectada y funcionando
✅ Datos cargados correctamente
✅ Modelos Laravel configurados
✅ Relaciones establecidas