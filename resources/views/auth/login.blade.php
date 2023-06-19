<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">
    <title>Login</title>
</head>
<body>
    <div id="contenedor">
        <div id="contenedorcentrado">
            <div id="login">
                <img src="{{ asset('imagenes/logo.png') }}" alt="Logo" style="position: absolute; top: 100px; left: 550px; max-width: 255px; filter: invert(1)">
                <form id="loginform" action="{{ route('login-post') }}" method="POST">
                    @csrf
                    <div transition-style class="--in-custom">
                    </div>
                    <label for="usuario">Email</label>
                    <input id="email" type="text" name="email" placeholder="Email" required>
                    
                    <label for="password">Contraseña</label>
                    <input id="password" type="password" placeholder="Password" name="password" required>
                 
                    <button type="submit" title="Ingresar" name="Ingresar">Login</button>
                </form>
            </div>
        </div>
    </div>

    <script src="{{ asset('js/index.js') }}"></script>
</body>
</html>
