<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    use HasFactory;

    protected $table = 'pedido';
    protected $fillable = [
        'id_pedido',
        'fecha',
        'total_a_pagar',
        'pagado',
        'entregado',
        'latitud',
        'longitud',
        'id_usuario'
    ];
}
