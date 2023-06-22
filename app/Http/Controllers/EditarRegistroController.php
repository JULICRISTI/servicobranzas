<?php

namespace App\Http\Controllers;

use App\Models\estructuracampana;
use Illuminate\Http\Request;
use App\Models\nuevosregistros;
use Symfony\Component\Mailer\Transport\Smtp\EsmtpTransportFactory;

class EditarRegistroController extends Controller
{
    public function editarRegistro($id)
    {
        // Obtener el registro específico a editar
        $registro = estructuracampana::find($id);

        // Verificar si se encontró el registro
        if (!$registro) {
            return response()->json(['error' => 'Registro no encontrado'], 404);
        }

        // Retornar la vista de edición con los datos del registro
        return view('editarregistro.editarregistro', compact('registro'));
    }

    public function guardarRegistro(Request $request)
    {
        // Validar los datos recibidos del formulario
        // $request->validate([
        //     'id' => 'required|exists:nuevosregistros,id',
        //     'dato' => 'required',
        //     'nombre_referencia' => 'required',
        //     'parentesco' => 'required',
        //     'cedula' => 'required',
        // ]);
        
        // Inserta los datos en la tabla de registros
        nuevosregistros::create([
            // 'id' => $request->id,
            'dato' => $request->dato,
            'nombre' => $request->nombre,
            // 'parentesco' => $request->parentesco,
            'cedula' => $request->cedula,
        ]);

        // Redireccionar o retornar una respuesta adecuada según tus necesidades
        return redirect()->route('Informacion')->with('success', 'Registro actualizado correctamente');
    }
}
