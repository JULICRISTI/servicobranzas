<!DOCTYPE html>
<html>
<head>
    <title>Tabla Estructura Campaña</title>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.1/css/jquery.dataTables.min.css">
    <script src="https://cdn.datatables.net/1.11.1/js/jquery.dataTables.min.js"></script>
    <style>
        /* Estilos personalizados */
        #dataTable_wrapper {
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <h1>Tabla Estructura Campaña</h1>
    <table id="dataTable">
        <thead>
            <tr>
                <th>ID</th>
                <th>Dato</th>
                <th>Cédula Deudor</th>
                <th>Campaña</th>
                <th>Fecha Campaña</th>
                <th>Nombre Referencia</th>
                <th>Parentesco</th>
                <th>Campaña Cod</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($registros as $registro)
                <tr>
                    <td>{{ $registro->id }}</td>
                    <td>{{ $registro->dato }}</td>
                    <td>{{ $registro->cedula_deudor }}</td>
                    <td>{{ $registro->campaña }}</td>
                    <td>{{ $registro->fecha_campaña }}</td>
                    <td>{{ $registro->nombre_referencia }}</td>
                    <td>{{ $registro->parentesco }}</td>
                    <td>{{ $registro->campaña_Cod_Campaña_SARC }}</td>
                    <td>
                    <button onclick="editarRegistro('{{ $registro->id }}')">Editar</button>

                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Agregar aquí la pantalla emergente para editar el registro -->
    <div id="editarRegistroModal" style="display: none;">
        <!-- Aquí puedes agregar los campos y los botones para editar el registro -->
    </div>

    <script>
        // Inicializar la tabla DataTables
        $(document).ready(function() {
            $('#dataTable').DataTable();
        });

        // Función para mostrar la pantalla emergente de edición del registro
        function editarRegistro(id) {
            // Obtener los datos del registro mediante una petición AJAX a la ruta correspondiente en Laravel
            $.ajax({
                url: '/editar-registro/' + id, // Reemplazar por la ruta correcta en tu aplicación
                method: 'GET',
                success: function(response) {
                    // Mostrar la pantalla emergente con los datos del registro para editar
                    $('#editarRegistroModal').html(response).show();
                },
                error: function(xhr, status, error) {
                    console.log(error);
                }
            });
        }
    </script>
</body>
</html>
