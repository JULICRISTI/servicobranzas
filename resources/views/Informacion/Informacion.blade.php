<!DOCTYPE html>
<html>
<head>
    <title>Información</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/informacion.css') }}">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">

    <style>
        .dataTables_wrapper, .dataTables_length, .dataTables_filter, .dataTables_paginate {
            padding: 1rem;
        }
    </style>
</head>
<body>
    <h1>Información</h1>
    <table id="dataTable" >
        <thead>
            <tr>
                <th>Dato</th>
                <th>Cédula</th>
                <th>Nombre</th>
                <th>Campaña</th>
                <th>Nombre Referencia</th>
                <th>Parentesco</th>
                <th>Editar</th>
            </tr>
        </thead>
        <tbody>
            @foreach($registros as $registro)
                <tr>
                    <td>{{ $registro->dato }}</td>
                    <td>{{ $registro->cedula_deudor }}</td>
                    <td>{{ $registro->nombre}}</td>
                    <td>{{ $registro->campaña }}</td>
                    <td>{{ $registro->nombre_referencia }}</td>
                    <td>{{ $registro->parentesco }}</td>
                    <td>
                        <a href="/editar-registro/{{ $registro->Id }}" class="btn btn-primary">Editar</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
    <script src="{{ asset('js/informacion.js') }}"></script>
</body>
</html>
