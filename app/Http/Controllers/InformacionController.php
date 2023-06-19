<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\informacion;
use App\Models\Registro;

class InformationController extends Controller
{
    public function showInformacion()
    {
        $registros = informacion::all();
        return view('Informacion.Informacion', compact('registros'));
    }

    public function updateInformation(Request $request)
    {
        // Obtener los datos enviados por la solicitud AJAX
        $id = $request->input('id');
        $dato = $request->input('dato');
        $cedulaDeudor = $request->input('cedula_deudor');
        $nombreReferencia = $request->input('nombre_referencia');
        $parentesco = $request->input('parentesco');
        $campaña_Cod_Campaña_SARC = $request->input('campaña_Cod_Campaña_SARC');

        // Realizar la lógica de actualización de la información
        try {
            $registro = Registro::findOrFail($id);
            $registro->nombre_referencia = $nombreReferencia;
            $registro->cedula = $cedula;
            $registro->save();
            
            $nuevoRegistro = new NuevoRegistro();
            $nuevoRegistro->dato = $registro->dato;
            $nuevoRegistro->nombre_referencia_cedula = $nombreReferencia . '_' . $cedula;
            $nuevoRegistro->save();
            
            // Preparar los datos de respuesta
            $response = [
                'success' => true,
                'message' => 'Registro actualizado exitosamente',
                'data' => [
                    'dato' => $registro->dato,
                    'cedula_deudor' => $registro->cedula_deudor,
                    'nombre_referencia' => $registro->nombre_referencia,
                    'parentesco' => $registro->parentesco,
                    'campaña_Cod_Campaña_SARC' => $campaña_Cod_Campaña_SARC
                ]
            ];

            return response()->json($response);
        } catch (\Exception $e) {
            // Preparar los datos de respuesta en caso de error
            $response = [
                'success' => false,
                'message' => 'Error al actualizar el registro',
                'data' => null
            ];

            return response()->json($response, 500);
        }
    }
}
