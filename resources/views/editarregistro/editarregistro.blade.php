<!DOCTYPE html>
<html>
<head>
    <title>Editar Registro</title>
</head>
<body>
    <h1>Editar Registro</h1>

    <form action="{{ route('editarregistro_post') }}" method="POST">
        @csrf
        <input type="hidden" name="id" value="{{ $registro->Id }}">
        
        <div>
            <label for="dato">Dato:</label>
            <input type="text" name="dato" value="{{ $registro->dato }}">
        </div>
        
        <div>
            <label for="nombre">Nombre:</label>
            <input type="text" name="nombre" value="{{ $registro->nombre }}">
        </div>
        
        <div>
            <label for="cedula">Cédula:</label>
            <input type="text" name="cedula" value="{{ $registro->cedula_deudor }}">
        </div>
        
        <div>
            <label for="nombre_referencia">Nombre Referencia:</label>
            <input type="text" name="nombre_referencia" value="{{ $registro->nombre_referencia }}">
        </div>
        
        <div>
            <label for="parentesco">Parentesco:</label>
            <input type="text" name="parentesco" value="{{ $registro->parentesco }}">
        </div>
        
        <button type="submit">Guardar</button>
    </form>
   
</body>
</html>
