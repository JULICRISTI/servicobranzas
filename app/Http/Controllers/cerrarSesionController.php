<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class cerrarSesionController extends Controller
{
    public function cerrarSesion()
    {
        Auth::logout();

        // Redireccionar a la página de inicio de sesión u otra página de tu elección
        return redirect()->route('login');
    }
}
