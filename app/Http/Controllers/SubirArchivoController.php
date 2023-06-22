<?php

namespace App\Http\Controllers;

use App\Models\estructuracampana;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SubirArchivoController extends Controller
{
    public function SubirArchivo(Request $request)
    {
        $datos_a_subir = [];
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

                    // dd(count($fields) == 10);

                    // Verificar que la línea tenga todos los campos
                    if (count($fields) >= 10) {
                        // Recorre todas las líneas del archivo y agrega línea por línea en una lista
                        $datos_a_subir[] = [
                            'dato' => $fields[0],
                            'cedula_deudor' => $fields[1],
                            'nombre' => $fields[2],
                            'campaña' => $fields[3],
                            'fecha_campaña' => $fields[4],
                            'nombre_referencia' => $fields[5],
                            'parentesco' => $fields[6],
                            'campaña_Cod_Campaña_SARC' => $fields[7],
                            'datos_Id' => intval($fields[8]) == 0 ? null : intval($fields[8]) ,
                            'observaciones_Id' => intval($fields[9]) == 0 ? null : intval($fields[9]) ,
                        ];
                    } else {
                        return redirect()->route('cargar-datos')->with('error', 'Datos incompletos en el archivo.');
                    }

                    // Crear una nueva instancia del modelo y asignar los valores
                    // $estructuracampana = new estructuracampana();
                    // $estructuracampana->dato = $fields[0];
                    // $estructuracampana->cedula_deudor = $fields[1];
                    // $estructuracampana->nombre = $fields[2];
                    // $estructuracampana->campaña = $fields[3];
                    // $estructuracampana->fecha_campaña = $fields[4];
                    // $estructuracampana->nombre_referencia = $fields[5];
                    // $estructuracampana->parentesco = $fields[6];
                    // $estructuracampana->campaña_Cod_Campaña_SARC = $fields[7];

                    // // Guardar el modelo en la base de datos
                    // $estructuracampana->save();
                }

                // Se suben en una sola consulta todos los datos de la lista $datos_a_subir. Esta forma de insertar
                // datos, hace que el timepo de ejecución del query y el tiempo del manejo de los datos sea más eficiente
                // con datos masivos
                DB::table('estructuracampana')->insert($datos_a_subir);

                return redirect()->route('cargar-datos')->with('success', 'Datos cargados correctamente.');
            } else {
                return redirect()->route('cargar-datos')->with('error', 'El archivo no es válido.');
            }
        }

        // Si el formato no es CSV ni TXT, puedes mostrar un mensaje de error o redirigir a otra página
        return redirect()->route('cargar-datos')->with('error', 'El formato seleccionado no es válido.');
    }
}
