<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\estructuracampana;

class InformacionController extends Controller
{
    public function showInformacion()
    {
        $registros = estructuracampana::all(); 
                  
        return view('Informacion.Informacion', compact('registros'));
    }
}
