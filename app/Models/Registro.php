<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Registro extends Model
{
    protected $table = 'informacion'; // Nombre de la tabla en la base de datos

    protected $primaryKey = 'id'; // Nombre de la clave primaria en la tabla

    public $timestamps = false; // Desactivar la creación automática de los campos de fecha de creación y actualización

    // Definir los campos de la tabla
    protected $fillable = [
        'Cedula_titular',
        'Nombre_Refe',
        'Telefono_Refe',
        'Correo_Refe',
        'Cartera',
        'Estatus',
        'Observacion'
    ];
}
