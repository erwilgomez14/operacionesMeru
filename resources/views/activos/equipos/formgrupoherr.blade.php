<form action="" method="POST" id="formulario-edicion">
    @csrf
    <h3 class="tittle mt-3 text-center">Edicion del Tipo: {{$tipo->id_tipo_eq}}</h3>
    <div class="form-group mt-3">
        <label for="nombre_grupo">Nombre del Tipo:</label>
        <input type="text" name="nombre_grupo" class="form-control" data-id="{{ $tipo->id_tipo_eq }}"
            id="nombre_grupo" placeholder="nombre" value="{{ $tipo->descripcion_tieq }}" required>
    </div>

    <!-- Agrega aquí los campos adicionales del formulario de edición -->


    <div class="form-group pt-2">
        <a href="#" class="btn btn-primary" id="btn-actualizar-grupo">Actualizar tipo</a>
    </div>
</form>



<script>
    $(document).ready(function() {

        // Maneja el clic en el botón de "Actualizar Grupo"
        $("#btn-actualizar-grupo").click(function(event) {
            event.preventDefault(); // Evita que el enlace recargue la página

            // Obtén el token CSRF del formulario
            var csrfToken = $("#formulario-edicion input[name='_token']").val();

            // Obtén el valor del atributo data-id del input
            var grupoId = $("#nombre_grupo").data("id");
            var nombreGrupo = $("#nombre_grupo").val();
            nombreGrupo = nombreGrupo.toUpperCase();

            console.log(grupoId);
            // Obtén los datos del formulario
            var formData = $("#formulario-edicion").serialize();

            // Crea un objeto para almacenar los datos que deseas enviar
            var datosEnviar = {
                '_token': csrfToken,
                'grupoId': grupoId,
                'descripcion_tieq': nombreGrupo
                // Agrega otros datos que desees enviar aquí
            };

            // Muestra los datos del formulario en la consola
            console.log("Datos a enviar:", datosEnviar);

            // Realiza la solicitud AJAX para enviar los datos del formulario al controlador
            $.ajax({
                url: "/activos/equipos/tipo/" +
                    grupoId, // Reemplaza esta URL con la ruta correcta a tu controlador y asegúrate de incluir el ID del grupo
                type: "POST",
                data: datosEnviar,
                success: function(response) {
                    // Maneja la respuesta exitosa si es necesario
                    console.log("Actualización exitosa:", response);

                    // Muestra una SweetAlert2 de éxito con un botón de "Aceptar"
                    Swal.fire({
                        icon: 'success',
                        title: 'Éxito',
                        text: response.mensaje,
                        showConfirmButton: true, // Mostrar el botón de "Aceptar"
                    }).then(function() {
                        // Después de hacer clic en el botón de "Aceptar", recarga la página
                        window.location.reload();
                    });
                },
                error: function(xhr, status, error) {
                    // Maneja el error si es necesario
                    console.error("Error en la actualización:", error);
                    // Verifica si la respuesta contiene un mensaje de error y muestra una alerta
                    if (xhr.responseJSON && xhr.responseJSON.error && xhr.responseJSON
                        .mensaje) {
                        Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: xhr.responseJSON.mensaje,
                        });
                    } else {
                        // Si no hay un mensaje de error específico, muestra una SweetAlert2 de error genérico
                        Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: 'Error en la actualización del grupo. Inténtalo de nuevo más tarde.',
                        });
                    }
                }
            });
        });
    });
</script>
