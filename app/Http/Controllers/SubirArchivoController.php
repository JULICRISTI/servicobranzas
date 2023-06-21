<?php

namespace App\Http\Controllers;

use App\Models\estructuracampana;

use Illuminate\Http\Request;

class SubirArchivoController extends Controller
{
    public function SubirArchivo(Request $request)
    {
        $formato = $request->input('format');
        $file = $request->file('archivo');

        if ($formato === 'csv' || $formato === 'txt') {
            // Procesar el archivo según el formato seleccionado
            if ($file->isValid()) {
                $path = $file->path();

                // Leer el archivo y procesar los datos
                $data = file($path);
                foreach ($data as $line) {
                    // Dividir la línea en campos individuales
                    $fields = explode(',', $line);

                    // Crear una nueva instancia del modelo y asignar los valores
                    $estructuracampana = new estructuracampana();
                    $estructuracampana->dato = $fields[0];
                    $estructuracampana->cedula_deudor = $fields[1];
                    $estructuracampana->nombre = $fields[2];
                    $estructuracampana->campaña = $fields[3];
                    $estructuracampana->fecha_campaña = $fields[4];
                    $estructuracampana->nombre_referencia = $fields[5];
                    $estructuracampana->parentesco = $fields[6];
                    $estructuracampana->campaña_Cod_Campaña_SARC = $fields[7];

                    // Guardar el modelo en la base de datos
                    $estructuracampana->save();
                }

                return redirect()->back()->with('success', 'Archivo importado correctamente.');
            } else {
                return redirect()->back()->with('error', 'El archivo no es válido.');
            }
        }

        // Si el formato no es CSV ni TXT, puedes mostrar un mensaje de error o redirigir a otra página
        return redirect()->back()->with('error', 'El formato seleccionado no es válido.');
    }
}
