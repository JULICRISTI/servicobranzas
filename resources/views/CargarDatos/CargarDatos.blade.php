<!DOCTYPE html>
<html>
<head>
    <title>Carga de datos</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/CargarDatos.css') }}">
</head>
<body>
    <h1>Carga de datos</h1>
    <ul>
        <li>
            <form method="post" action="{{ route('Descargar') }}">
                @csrf
                <label for="export-format">Formato de archivo:</label>
                <select name="format" id="export-format">
                    <option value="txt">Texto</option>
                </select>
                <button type="submit">Descargar</button>
            </form>
        </li>
        <li>
            <form method="post" action="{{ route('Subir') }}" enctype="multipart/form-data">
                @csrf
                <label for="import-format">Tipo de archivo:</label>
                <select name="format" id="import-format">
                    <option value="csv">CSV</option>
                    <option value="txt">Texto</option>
                    <option value="xml">XML</option>
                </select>
                <input type="file" name="archivo" id="archivo">
                <button type="submit">Subir archivo</button>
            </form>
        </li>
    </ul>
    {{-- Mostrar mensajes de error --}}
    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif
    
    {{-- Mostrar mensajes de éxito --}}
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
</body>
</html>
