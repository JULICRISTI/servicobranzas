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

            <li><a href="{{ route('Informacion') }}" target="content">Informacion</a></li>
            <li><a href="{{ route('cargar-datos') }}" target="content">Carga de datos</a></li>

            </ul>
        </div>
        <div class="form-container">
            <!-- Botón de cerrar sesión -->
            <form method="post" action="{{ url('cerrar_sesion') }}">
                @csrf
                <button type="submit">Cerrar sesión</button>
            </form>
        </div>
    </div>
    <div class="content">
    <iframe src="{{ route('Informacion') }}" name="content"></iframe>
    </div>
<!-- ... código omitido ... -->
</div>
<script src="{{ asset('script.js') }}"></script>
</body>
</html>

