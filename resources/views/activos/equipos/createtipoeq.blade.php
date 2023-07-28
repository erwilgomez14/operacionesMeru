@extends('panel.layouts.page')

@section('styles')
    <link rel="stylesheet" href="{{ asset('template/plugins/sweetalerts/sweetalert2.min.css') }}">
    <style>
        /* Estilos para el ícono en estado "hover" */
        .btn-outline-dark:hover .icon-circle {
            /* fill: #ffffff; */
            stroke: #ffffff;
            /* Cambia el color del ícono a blanco */
        }

        .listgrupos:hover {
            color: blue;
        }
    </style>
@endsection

@section('content')
    <div class="row layout-top-spacing">

        <div class="col-xl-12 col-lg-12 col-md-12 col-12 layout-spacing">
            <div class="widget-content-area br-4">
                <div class="widget-one">
                    @if ($errors->any())
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>

                        <script>
                            $(".alert").alert();
                        </script>
                    @endif
                    @include('include.sesionalert')
                    <form method="POST" action="{{ route('equipos.storetipoeq') }}">
                        @csrf
                        <div class="row">
                            <div class="col-md-9">
                                <h2 class="tittle"> Creacion de Tipo de equipo</h2>
                            </div>
                            <div class="col-md-3">
                                <button type="button" class="btn btn-custom btn-lg float-right" data-toggle="modal"
                                    data-target="#gruposModal">
                                    Mostrar Tipos creados
                                </button>
                            </div>
                        </div>
                        <!-- Modal -->
                        <div class="modal fade" id="gruposModal" tabindex="-1" role="dialog"
                            aria-labelledby="gruposModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title" id="gruposModalLabel">Listado de Grupos</h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <ul id="listado-grupos">
                                            @foreach ($tipos_eq as $grupo)
                                                <li class="mb-3 listgrupos"><a href="#"
                                                        class="editar-grupo listgrupos" style="font-weight: bold"
                                                        data-id="{{ $grupo->id_tipo_eq }}">{{ $grupo->descripcion_tieq }}</a>
                                                </li>
                                                {{-- <li>{{ $grupo->descripcion_tieq }}</li> --}}
                                            @endforeach
                                        </ul>
                                    </div>
                                    <!-- Área para mostrar el formulario de edición -->
                                    <div class="modal-body" id="area-formulario-edicion"
                                        style="display: none; margin-top: -3rem;">
                                        <div id="formulario-edicion"></div>

                                    </div>
                                    <div class="modal-footer">
                                        <a style="display: none;" href="#" class="btn btn btn-outline-dark"
                                            id="btn-volver">
                                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <circle class="icon-circle" cx="12" cy="12" r="11.5"
                                                    stroke="#3b3f5c" stroke-width="1" />
                                                <path class="icon-circle"
                                                    d="M9.70711 12.2929C9.31658 11.9024 9.31658 11.2692 9.70711 10.8787L12.8284 7.75736C13.219 7.36684 13.8522 7.36684 14.2426 7.75736C14.6331 8.14789 14.6331 8.78105 14.2426 9.17157L11.4142 12L14.2426 14.8284C14.6331 15.2189 14.6331 15.8521 14.2426 16.2426C13.8522 16.6331 13.219 16.6331 12.8284 16.2426L9.70711 13.1213C9.31658 12.7308 9.31658 12.0976 9.70711 11.7071L9.70711 12.2929ZM9.70711 11.7071L12.8284 8.58579C13.219 8.19526 13.8522 8.19526 14.2426 8.58579C14.6331 8.97631 14.6331 9.60948 14.2426 10L11.4142 12.8284L14.2426 15.6569C14.6331 16.0474 14.6331 16.6805 14.2426 17.0711C13.8522 17.4616 13.219 17.4616 12.8284 17.0711L9.70711 13.9497C9.31658 13.5592 9.31658 12.926 9.70711 12.5355L9.70711 11.7071Z"
                                                    fill="#3b3f5c" />
                                            </svg>

                                        </a>
                                        <button type="button" class="btn btn-dark" data-dismiss="modal">Cerrar</button>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="desc_tieq">Nombre del tipo equipo</label>
                            <input type="text" name="descripcion_tieq" class="form-control" id="descripcion_tieq"
                                placeholder="Nombre del tipo de equipo"
                                value="{{ old('descripcion_tieq', $herramienta->nombre_herramienta ?? '') }}">
                        </div>
                        <div class="form-group">
                            <label for="nombre_tipoeq">Siglas del tipo de equipo</label>
                            <input type="text" name="nombre_tipoeq" class="form-control" id="nombre_tipoeq"
                                placeholder="siglas del tipo de equipo"
                                value="{{ old('nombre_tipoeq', $herramienta->nombre_herramienta ?? '') }}">
                        </div>
                        <div class="form-group pt-2">
                            <a href="{{ route('equipos.index') }}" class="btn btn-dark">Volver</a>
                            <input class="btn btn-primary" type="submit" value="Guardar">
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>

@endsection

@section('scripts')
    <script src="{{ asset('template/plugins/sweetalerts/sweetalert2.min.js') }}"></script>

    <script>
        const inputDescripcion = document.querySelector('#descripcion_tieq');
        const inputAbreviatura = document.querySelector('#nombre_tipoeq');

        inputDescripcion.addEventListener('input', function() {
            inputDescripcion.value = inputDescripcion.value.toUpperCase();

            const descripcion = inputDescripcion.value;
            const abreviatura = descripcion.substring(0, 4).toUpperCase();
            inputAbreviatura.value = abreviatura;
        });


        inputAbreviatura.addEventListener('input', function() {
            inputAbreviatura.value = inputAbreviatura.value.toUpperCase().substring(0, 4);
        });
    </script>

    <script>
        $(document).ready(function() {
            // Maneja el clic en el enlace de "Editar" del listado de grupos
            var idHerramienta;
            $(".editar-grupo").click(function(event) {
                event.preventDefault(); // Evita que el enlace recargue la página

                var grupoId = $(this).data("id");
                idHerramienta = grupoId;
                // Oculta el listado de grupos y muestra el área del formulario de edición
                $("#btn-volver").show();
                $("#listado-grupos").hide();
                $("#area-formulario-edicion").show();

                // Realiza una solicitud AJAX para obtener el formulario de edición
                $.ajax({
                    url: "/activos/equipos/obtener_formulario_edicion/" +
                        grupoId, // Reemplaza con la ruta que obtiene el formulario de edición en tu aplicación.
                    type: "GET",
                    success: function(data) {
                        $("#formulario-edicion").html(
                            data); // Inserta el formulario en el área del modal.
                    },
                    error: function(xhr, status, error) {
                        // Maneja el error si es necesario.
                    }
                });
            });

            // Maneja el clic en el enlace de "Volver"
            $("#btn-volver").click(function(event) {
                event.preventDefault(); // Evita que el enlace recargue la página

                // Oculta el área del formulario de edición y muestra nuevamente el listado de grupos
                $("#area-formulario-edicion").hide();
                $("#listado-grupos").show();
                $("#btn-volver").hide();

            });

            // Maneja el clic en el botón de "Actualizar Grupo"
            $("#btn-actualizar-grupo").click(function(event) {
                event.preventDefault(); // Evita que el enlace recargue la página

                // Obtén los datos del formulario
                var formData = $("#formulario-edicion").serialize();

                // Realiza la solicitud AJAX para enviar los datos del formulario al controlador
                $.ajax({
                    url: "activos/herramientas/group/" +
                        idHerramienta, // Reemplaza con la ruta que maneja la actualización del grupo en tu controlador
                    type: "POST",
                    data: formData,
                    success: function(response) {
                        // Maneja la respuesta exitosa si es necesario
                        console.log("Actualización exitosa:", response);
                    },
                    error: function(xhr, status, error) {
                        // Maneja el error si es necesario
                        console.error("Error en la actualización:", error);
                    }
                });
            });
        });
    </script>
@endsection
