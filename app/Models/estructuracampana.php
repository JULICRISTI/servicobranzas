<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Maatwebsite\Excel\Concerns\FromCollection;

class FormatoExport implements FromCollection
{
    public function collection()
    {
        return estructuracampana::all();
    }
}

class estructuracampana extends Model
{
    use HasFactory;

    protected $table = 'estructuracampana';
    protected $primaryKey = 'id';
    public $timestamps = false;

    protected $fillable = [
        'dato',
        'cedula_deudor',
        'campaña',
        'nombre_referencia',
        'parentesco',
    ];

    public function titular()
    {
        return $this->belongsTo(Titular::class, 'cedula_deudor', 'cedula_deudor');
    }
}


