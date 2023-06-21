$(document).ready(function() {
    $('#dataTable').DataTable({
        paging: true,
        searching: true,
        ordering: true
    });
});

// Función para mostrar la pantalla emergente de edición del registro
function obtenerIdYEditar(nombre) {
    // Realizar una solicitud AJAX para obtener el ID correspondiente al nombre
    $.ajax({
        url: '/obtener-id-por-nombre', // Ruta en Laravel para obtener el ID
        method: 'POST',
        data: { nombre: nombre },
        success: function(response) {
            // Obtener el ID de la respuesta
            var id = response.id;
            // Llamar a la función editarRegistro() con el ID obtenido
            editarRegistro(id);
        },
        error: function(xhr, status, error) {
            console.log(error);
        }
    });
}
