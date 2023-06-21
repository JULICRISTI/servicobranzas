<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\estructuracampana;

class InformacionController extends Controller
{
    public function showInformacion($id = null)
    {
        if ($id) {
            $registros = estructuracampana::where('id', $id)->get();
        } else {
            $registros = estructuracampana::all();
        }
    
        return view('Informacion.Informacion', compact('registros'));
    }
}
