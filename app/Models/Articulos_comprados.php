<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Articulos_comprados extends Model
{
    use HasFactory;

    protected $table = 'articulos_comprados';
    protected $fillable = [
        'id_articulo',
        'productos',
        'id_pedido',
        
    ];

    protected $casts = [
        'productos' => 'json'
    ];
}
