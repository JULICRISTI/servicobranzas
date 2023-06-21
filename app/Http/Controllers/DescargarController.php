<?php

namespace App\Http\Controllers;

use App\Models\estructuracampana;
use Illuminate\Http\Request;

class DescargarController extends Controller
{
    public function Descargar(Request $request)
    {
        $formato = $request->input('format');

        if ($formato === 'txt') {
            $fileName = 'data.txt';

            $data = estructuracampana::select('dato', 'cedula_deudor', 'nombre', 'campaña', 'fecha_campaña', 'nombre_referencia', 'parentesco', 'campaña_Cod_Campaña_SARC', 'datos_Id', 'observaciones_Id')->get();

            $fileContents = '';
            foreach ($data as $item) {
                $line = $item->dato . ', ' . $item->cedula_deudor . ', ' . $item->nombre . ', ' . $item->campaña . ', ' . $item->fecha_campaña . ', ' . $item->nombre_referencia . ', ' . $item->parentesco . ', ' . $item->campaña_Cod_Campaña_SARC . ', ' . $item->datos_Id . ', ' . $item->observaciones_Id;
                $fileContents .= $line . "\n";
            }

            // Devuelve el archivo de texto como una respuesta de descarga
            return response($fileContents)->header('Content-Disposition', 'attachment; filename=' . $fileName)->header('Content-Type', 'text/plain');
        }

        // Si el formato no es TXT, puedes mostrar un mensaje de error o redirigir a otra página
        return redirect()->back()->with('error', 'El formato seleccionado no es válido.');
    }
}
