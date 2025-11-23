<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Editorial extends Model
{
    use HasFactory;

    protected $table = 'editorial';
    protected $primaryKey = 'id_editorial';
    public $timestamps = false;

    // Para que Laravel use la clave primaria correcta en las rutas
    public function getRouteKeyName()
    {
        return 'id_editorial';
    }

    protected $fillable = [
        'id_editorial',
        'nombre', 
        'pais', 
        'ciudad', 
        'telefono', 
        'correo',
        'sitio_web',
        'fecha_fundacion',
        'activo',
        'created_at',
    ];

    public function libros()
    {
        return $this->hasMany(Book::class, 'id_editorial', 'id_editorial');
    }
}




