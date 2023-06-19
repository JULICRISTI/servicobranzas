<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Info_Referencias;
use App\Models\informacion;
use Illuminate\Support\Facades\DB;

class MenuController extends Controller
{
    public function showMenu()
    {
        $result = DB::table('estructura_campaña')->select('id')->first();
        $id = $result ? $result->id : null;
        return view('menu.menu', compact('id'));
    }
    
    
    
    // Otros métodos del menú
    
    // Ejemplo de método para ingresar registro
    ///public function ingresarRegistro()
   // {
        // Lógica para ingresar un registro
        
    //    return view('ingresar_registro');
   // }
    
    // Ejemplo de método para consultar registro
    ///public function consultarRegistro()
   // {
    //    // Lógica para consultar un registro
        
     //   return view('consultar_registro');
    //}
    
    // Ejemplo de método para eliminar registro
    //public function eliminarRegistro()
    //{
        // Lógica para eliminar un registro
        
        //return view('eliminar_registro');
   // }
    
            public function showInformacion()
        {
          $latestRegistro = informacion::latest()->first();
         if ($latestRegistro) {
         $id = $latestRegistro ? $latestRegistro->id : null;
           return view('Informacion.Informacion', compact('id'));
          }    
        else {
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
