<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/menu.css') }}">
    <title>Menú</title>
</head>
<body>
<div class="container">
    <div class="menu" id="menu">
        <img src="{{ asset('imagenes/logo.png') }}" alt="Descripción de la imagen"
             style="position: absolute; top: 100; left: 50; max-width: 255px;filter: invert(1)">
        <br>
        <br>
        <h1></h1>
        <div class="items">
            <ul>
                <li><a href="{{ url('ingresar') }}" target="content">Ingresar registro</a></li>
                <li><a href="{{ url('consultar') }}" target="content">Consultar registro</a></li>
                <li><a href="{{ url('eliminar') }}" target="content">Eliminar registro</a></li>
                <li><a href="{{ isset($id) ? route('informacion', ['id' => $id->id]) : '#' }}" target="content">Informacion</a></li>
            </ul>
        </div>
        <div class="form-container">
            <form method="post" action="{{ url('import_export/export') }}">
                @csrf
                <label for="export-format">Formato de archivo:</label>
                <select name="format" id="export-format">
                    <option value="csv">CSV</option>
                    <option value="txt">Texto</option>
                    <option value="xml">XML</option>
                </select>
                <button type="submit">Descargar</button>
            </form>
            <form method="post" action="{{ url('import_export/import') }}" enctype="multipart/form-data">
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
            <!-- Botón de cerrar sesión -->
            <form method="post" action="{{ url('cerrar_sesion') }}">
                @csrf
                <button type="submit">Cerrar sesión</button>
            </form>
        </div>
    </div>
    <div class="content">
        <iframe src="{{ url('ingresar') }}" name="content"></iframe>
    </div>
</div>
<script src="{{ asset('script.js') }}"></script>
</body>
</html>
