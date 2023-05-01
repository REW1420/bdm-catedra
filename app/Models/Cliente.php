<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;

    protected $table = 'cliente';
    protected $fillable = [
        'id_cliente',
        'nombre',
        'correo',
        'contrasena',
        'numero_de_telefono'
    ];
}