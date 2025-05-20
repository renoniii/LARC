<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{

    protected $fillable = [
        'nombre',
        'categoria_id',
        'precio',
        'stock',
        'imagen',
        'descripcion', 
    ];

    public function categoria()
    {
        return $this->belongsTo(Categoria::class);
    }
}
