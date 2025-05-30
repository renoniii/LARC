<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Orden extends Model
{
    protected $table = 'ordenes';

    protected $fillable = ['user_id', 'direccion', 'telefono', 'total', 'productos'];

    protected $casts = [
        'productos' => 'array',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}

