<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CargarDatosController extends Controller
{
    public function showCargarDatos(Request $request)
{
    return view('CargarDatos.CargarDatos');
}

}
