<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    use HasFactory;

    protected $table = 'autor';
    protected $primaryKey = 'id_autor';
    public $timestamps = false;

    // Para que Laravel use la clave primaria correcta en las rutas
    public function getRouteKeyName()
    {
        return 'id_autor';
    }

    protected $fillable = [
        'nombres_autor', 
        'apellidos_autor', 
        'fecha_nacimiento', 
        'nacionalidad'
    ];

    protected $casts = [
        'fecha_nacimiento' => 'date'
    ];

    public function libros()
    {
        return $this->hasMany(Book::class, 'id_autor', 'id_autor');
    }
}

