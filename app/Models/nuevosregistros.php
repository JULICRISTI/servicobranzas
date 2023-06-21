<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class nuevosregistros extends Model
{
    protected $table = 'nuevosregistros'; // Nombre de la tabla en la base de datos

    protected $fillable = ['dato', 'nombre', 'cedula']; // Campos que se pueden asignar masivamente

    // Asegúrate de ajustar los timestamps si no los necesitas
    public $timestamps = true;

    // Añade relaciones o métodos adicionales según tus necesidades
}
