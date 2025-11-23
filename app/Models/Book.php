<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $table = 'libro';
    protected $primaryKey = 'id_libro';
    public $timestamps = false;

    // Para que Laravel use la clave primaria correcta en las rutas
    public function getRouteKeyName()
    {
        return 'id_libro';
    }

    protected $fillable = [
        'id_autor',
        'id_categoria',
        'id_editorial', 
        'titulo', 
        'isbn', 
        'anio_creacion'
    ];

    public function autor()
    {
        return $this->belongsTo(Author::class, 'id_autor', 'id_autor');
    }

    public function categoria()
    {
        return $this->belongsTo(Category::class, 'id_categoria', 'id_categoria');
    }

    public function editorial()
    {
        return $this->belongsTo(Editorial::class, 'id_editorial', 'id_editorial');
    }
}




