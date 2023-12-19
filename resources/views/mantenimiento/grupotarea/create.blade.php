@extends('panel.layouts.page')

@section('styles')
{{--    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.4/dist/sweetalert2.min.css">--}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
@endsection

@section('content')
    <div class="row layout-top-spacing">

        <div class="col-xl-12 col-lg-12 col-md-12 col-12 layout-spacing">
            <div class="widget-content-area br-4">
                <div class="widget-one">
                    @include('include.sesionalert')
                    <form method="POST" action="{{route('grupotareas.store')}}">
                        @csrf
                        <h2 class="tittle"> Creacion de Tarea</h2>

                        <div class="form-group">
                            <label for="tarea">Tarea:</label>
                            <input type="text" name="tarea" class="form-control" id="tarea"
                                   placeholder="nombre de la tarea" value="{{old('tarea', $tarea->tarea ?? '')}}">
                        </div>
                        <div class="form-group">
                            <label for="id_tipo_eq">Tipo de equipo</label>
                            <select class="custom-select" id="id_tipo_eq" name="id_tipo_eq" aria-label="">
                                <option selected disabled>Selecionar Tipo de equipo</option>
                                @foreach($tipoequipo as $tipo)
                                    <option value="{{$tipo->id_tipo_eq}}">{{$tipo->descripcion_tieq}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group mt-3 bg-gradient-dark">
                            <label for="grupo_herramienta">Seleccionar conjunto de Herramientas:</label>
                            <select id="grupo_herramienta" class="custom-select">
                                <option selected disabled>Selecionar grupo de herramientas</option>
                                @foreach ($grupo_herramienta as $grupo)
                                    <option value="{{$grupo->id_grupo_herramienta}}">{{$grupo->nombre_grupo}}</option>
                                @endforeach
                            </select>
                            <button type="button" class="btn btn-dark mt-3" id="btn-agregar">Agregar</button>

                            <table class="table mt-3" id="tabla-opciones">
                                <thead class="thead-dark">
                                <h4 class="text-center"> Datos de las herramientas a utilizar</h4>
                                <tr>
                                    <th>#</th>
                                    <th>Nombre</th>
                                </tr>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>
                        </div>
                        <div class="form-group pt-2">
                            <a href="{{route('grupotareas.index')}}" class="btn btn-dark">Volver</a>
                            <button class="btn btn-primary" type="button" id="btn-guardar">Guardar</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>

@endsection

@section('scripts')
    <script>
        const csrfToken = document.head.querySelector("[name=csrf-token][content]").content;
        // document.getElementById('id_sistema').addEventListener('change', (e) => {
        //     $("#id_equipo").empty();
        //     fetch('/mantenimiento/grupotareas/hasEquipo', {
        //         method: 'POST',
        //         body: JSON.stringify({
        //             texto: e.target.value
        //         }),
        //         headers: {
        //             'Content-Type': 'application/json',
        //             "X-CSRF-Token": csrfToken
        //         }
        //     }).then(response => {
        //         return response.json()
        //     }).then(data => {
        //         var opciones = "<option value=''>Seleccionar Sistema</option>";
        //         for (let i in data.lista) {
        //             opciones += '<option value="' + data.lista[i].id_equipo + '">' + data.lista[i]
        //                 .desc_equipo + '</option>';
        //         }
        //         console.log(opciones);
        //         document.getElementById("id_equipo").innerHTML = opciones;
        //     }).catch(error => console.error(error));
        // })

        const tablaOpciones = document.getElementById('tabla-opciones').getElementsByTagName('tbody')[0];
        const btnAgregar = document.getElementById('btn-agregar');
        const selectUsuario = document.getElementById('grupo_herramienta');
        const btnGuardar = document.getElementById('btn-guardar');
        let datos = [];
        let form = document.getElementById('formulario');

        function agregarOpcion() {
            // Obtener el valor y el texto seleccionado
            const valorSeleccionado = selectUsuario.options[selectUsuario.selectedIndex].value;
            const textoSeleccionado = selectUsuario.options[selectUsuario.selectedIndex].text;

            // Si el valor seleccionado es "Selecionar grupo de herramientas", no hacer nada
            if (valorSeleccionado === "Selecionar grupo de herramientas" && textoSeleccionado === "Selecionar grupo de herramientas") {
                return;
            }
            const tr = document.createElement('tr');
            const tdUsuario = document.createElement('td');
            const tdUsuarioCedula = document.createElement('td');
            tdUsuario.textContent = selectUsuario.options[selectUsuario.selectedIndex].text;
            tdUsuarioCedula.textContent = selectUsuario.options[selectUsuario.selectedIndex].value;
            tr.appendChild(tdUsuarioCedula);
            tr.appendChild(tdUsuario);
            tablaOpciones.appendChild(tr);

            const filas = tablaOpciones.getElementsByTagName('tr');
            datos = Array.from(filas).map(fila => {
                const celdas = fila.getElementsByTagName('td');
                return {
                    id: celdas[0].textContent,
                    nombre: celdas[1].textContent
                }
            });
            console.log(tablaOpciones)
            console.log(datos);

        }

        function guardarOpcion(event){
            event.preventDefault();
            const tarea = document.getElementById('tarea').value;
            const id_sistema = document.getElementById('id_tipo_eq').value;
            //const id_equipo = document.getElementById('id_equipo').value;

            const odt = {
                tarea,
                id_sistema,
            //    id_equipo,

            };
            console.log(odt);

            console.log(form);
            console.log(datos);
            fetch('/mantenimiento/grupotareas', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    "X-CSRF-Token": csrfToken
                },
                body: JSON.stringify({ data: datos,
                    odt})
            })
                .then(response => {
                    if (response.ok) {
                        return response.json();
                    } else {
                        throw new Error('Error al guardar la tarea');
                    }
                })
                .then(data => {
                    const odtNumber = data.tra.id_tareas;
                    Swal.fire({
                        title: '¡Éxito!',
                        text: `Tarea Nº: ${odtNumber} creada satisfactoriamente.`,
                        icon: 'success'
                    }).then((result) => {
                        // Redirigir a la ruta si se hizo clic en OK
                        if (result.isConfirmed) {
                            window.location.href = '{{route('grupotareas.index')}}';
                        }
                    });
                })
                .catch(error => {
                    console.error('Error:', error);
                    Swal.fire({
                        title: 'Error',
                        text: 'No se pudo guardar la tarea',
                        icon: 'error'
                    });
                });
        }
        btnAgregar.addEventListener('click', agregarOpcion);
        btnGuardar.addEventListener('click', guardarOpcion);
    </script>
@endsection
