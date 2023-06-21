<?php

namespace App\Http\Controllers;

use App\Models\estructuracampana;
use Illuminate\Http\Request;
use App\Models\informacion;
use Illuminate\Support\Facades\DB;

class MenuController extends Controller
{
    public function showMenu()
    {
        $result = DB::table('estructuracampana')->select('id')->first();
        $id = $result ? $result->id : null;
        return view('menu.menu', compact('id'));
    }

    public function showInformacion()
    {
        $latestRegistro = estructuracampana::latest()->first();
        if ($latestRegistro) {
            $id = $latestRegistro->id;
            return view('Informacion.Informacion', compact('id'));
        } else {
            $mensaje = 'No se encontraron registros en la tabla de información.';
            return view('Informacion.Informacion', compact('mensaje'));
        }
    }

    // Método para cerrar sesión
    public function cerrarSesion()
    {
        auth()->logout();
        return redirect()->route('login');
    }
}
