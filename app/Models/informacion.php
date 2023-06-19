<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class informacion extends Model
{
    protected $table = 'estructura_campaña';
    protected $primaryKey = 'id';
    public $timestamps = false;

    protected $fillable = [
        'dato',
        'cedula_deudor',
        'fecha_campaña',
        'nombre_referencia',
        'parentesco',
        'campaña_Cod_Campaña_SARC',
    ];
    public function titular()
    {
        return $this->belongsTo(Titular::class, 'Cedula_titular', 'Cedula_titular')->where('Campaña', $this->Campaña);
    }

}
