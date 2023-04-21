@extends('panel.layouts.page')

@section('styles')
    <style>
        /*
                The below code is for DEMO purpose --- Use it if you are using this demo otherwise Remove it
            */
        /*.navbar .navbar-item.navbar-dropdown {
                margin-left: auto;
            }*/
        .layout-px-spacing {
            min-height: calc(100vh - 140px) !important;
        }
    </style>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.4/dist/sweetalert2.min.css">
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

                    <form id="formulario" method="POST" action="{{ route('ordentrabajo.store') }}">
                        @csrf
                        <h2 class="tittle"> Edicion de la Orden de trabajo Nº: {{$orden->id_orden}}</h2>

                        <div class="form-group">
                            <label for="descrip_ot">Descripcion de la orden</label>
                            <input type="text" name="descrip_ot" id="descrip_ot" class="form-control" value="{{old('descrip_ot', $orden->descrip_ot ?? '')}}">

                        </div>
                        <div class="form-group">
                            <label for="id_acueducto">Acueducto</label>
                            <select id="id_acueducto" class="custom-select" name="id_acueducto" aria-label="">
                                <option selected value="">Selecionar Acueducto</option>
                                @foreach ($acueductos as $acueducto)
                                    <option value="{{ $acueducto->id_acueducto }}" @if($acueducto->id_acueducto == $orden->id_acueducto) selected @endif>{{ $acueducto->nom_acu }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="id_sistema">Sistema</label>
                            <select id="id_sistema" class="custom-select" name="id_sistema" aria-label="">
                                <option selected>Seleccionar sistema</option>
                                @foreach ($sistemas as $sistema)
                                    <option value="{{ $sistema->id_sistema }}" @if($sistema->id_sistema == $orden->id_sistema) selected @endif>{{ $sistema->nom_sistema }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="id_equipo">Equipo</label>
                            <select id="id_equipo" class="custom-select" name="id_equipo"  aria-label="">
                                <option selected>Seleccionar Equipo</option>
                                @foreach ($subsistemas as $subsistema)
                                    <option value="{{ $subsistema->id_subsistema }}" @if($subsistema->id_subsistema == $orden->id_subsistema) selected @endif>{{ $subsistema->nombre_subsistema }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="observacion">Observacion:</label>
                            <input type="text" name="observacion" id="observacion" class="form-control" value="{{old('observacion', $orden->observacion ?? '')}}">
                        </div>
                        <div class="form-group pt-2">
                            <a href="{{ route('acueductos.index') }}" class="btn btn-dark">Volver</a>
                            <input class="btn btn-primary" {{--type="submit"--}} id="btn-guardar" value="Guardar">
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>

@endsection

@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.4/dist/sweetalert2.min.js"></script>

    <script>
        const csrfToken = document.head.querySelector("[name=csrf-token][content]").content;
        document.getElementById('id_acueducto').addEventListener('change', (e) => {
            $("#id_sistema").empty();
            $("#id_equipo").empty();
            if(document.getElementById('id_acueducto').value === '' )
            {
                document.getElementById('id_sistema').disabled = true;
                return;
            }
            document.getElementById('id_sistema').disabled = false;
            fetch('hasSistema', {
                method: 'POST',
                body: JSON.stringify({
                    texto: e.target.value
                }),
                headers: {
                    'Content-Type': 'application/json',
                    "X-CSRF-Token": csrfToken
                }
            }).then(response => {
                return response.json()
            }).then(data => {
                var opciones = "<option value='' >Seleccionar Sistema</option>";
                for (let i in data.lista) {
                    opciones += '<option value="' + data.lista[i].id_sistema + '" >' + data.lista[i]
                        .nom_sistema + '</option>';
                }
                console.log(opciones);
                document.getElementById("id_sistema").innerHTML = opciones;
            }).catch(error => console.error(error));
        })

        document.getElementById('id_sistema').addEventListener('change', (e) => {
            $("#id_equipo").empty();

            fetch('hasEquipo', {
                method: 'POST',
                body: JSON.stringify({
                    texto: e.target.value,
                }),
                headers: {
                    'Content-Type': 'application/json',
                    "X-CSRF-Token": csrfToken
                }
            }).then(response => {
                return response.json()
            }).then(data => {
                var opciones = "<option value=''>Seleecionar Equipo</option>";
                for (let i in data.lista) {
                    opciones += '<option value="' + data.lista[i].id_subsistema + '" data-tipo="'+data.lista[i].id_tipo_eq+'">' + data.lista[i]
                        .nombre_subsistema + '</option>';
                }
                console.log(opciones);
                document.getElementById("id_equipo").innerHTML = opciones;
            }).catch(error => console.error(error));
        })

        document.getElementById("id_equipo").addEventListener('change', (e) =>{
            //console.log(document.getElementById("id_equipo"));
            const tablaTareas = document.getElementById('tabla-tareas').getElementsByTagName('tbody')[0];
            const opcionSeleccionada = event.target.options[event.target.selectedIndex];
            const tipoEquipo = opcionSeleccionada.getAttribute('data-tipo');
            console.log(tipoEquipo);
            fetch('hasTareas', {
                method: 'POST',
                body: JSON.stringify({
                    texto: e.target.value,
                    tipoEquipo: tipoEquipo,

                }),
                headers: {
                    'Content-Type': 'application/json',
                    "X-CSRF-Token": csrfToken
                }

            }).then(response => {
                return response.json()
            }).then(data => {
                let id = 1;
                data.tarea.forEach(tarea => {
                    const tr = document.createElement('tr');
                    const tdId = document.createElement('td');
                    tdId.textContent = id;
                    const tdTarea = document.createElement('td');
                    tdTarea.textContent = tarea.tarea;
                    tr.appendChild(tdId);
                    tr.appendChild(tdTarea);
                    tablaTareas.appendChild(tr);
                    id++;
                });
                // const tareas = data.tarea;
                // const listado = document.getElementById('listadotareas');
                //console.log(listaUsuarios);
                /*for (){
                    var li = document.createElement('li');
                    li.textContent = tarea.tarea;
                    listado.appendChild(li);
                }*/
                /*tareas.forEach(tarea=> {
                    const li = document.createElement('li');
                    li.textContent = data.tarea.tarea;
                    listaUsuarios.appendChild(li);
                });*/
                // const fragmento = document.createDocumentFragment();
                // data.tarea.forEach(tarea => {
                //     const tr = document.createElement('tr');
                //     //const li = document.createElement('li');
                //     const tdId = document.createElement('td');
                //     const tdTarea = document.createElement('td');
                //
                //     tdTarea.textContent = tarea.tarea;
                //     tdId.textContent = tarea.
                //     //li.textContent = tarea.tarea;
                //     fragmento.appendChild(li);
                // });
                // console.log(fragmento);
                /*for (let i in tareas) {
                    listatareas = '<li>' + tareas[i]
                        .tarea + '</li>';
                }*/
                // listado.appendChild(fragmento);
                // document.getElementById("listadotareas").innerHTML = listatareas;
            }).catch(error => console.error(error));
        })


        const tablaOpciones = document.getElementById('tabla-opciones').getElementsByTagName('tbody')[0];
        const btnAgregar = document.getElementById('btn-agregar');
        const selectUsuario = document.getElementById('select-usuario');
        const btnGuardar = document.getElementById('btn-guardar');
        let datos = [];
        let form = document.getElementById('formulario');

        function agregarOpcion() {
            const tr = document.createElement('tr');
            const tdUsuario = document.createElement('td');
            const tdUsuarioCedula = document.createElement('td');
            tdUsuario.textContent = selectUsuario.options[selectUsuario.selectedIndex].text;
            tdUsuarioCedula.textContent = selectUsuario.options[selectUsuario.selectedIndex].value;
            tr.appendChild(tdUsuario);
            tr.appendChild(tdUsuarioCedula);
            tablaOpciones.appendChild(tr);

            const filas = tablaOpciones.getElementsByTagName('tr');
            datos = Array.from(filas).map(fila => {
                const celdas = fila.getElementsByTagName('td');
                return {
                    cedula: celdas[1].textContent,
                    /*nombre: celdas[0].textContent*/
                }
            });
            console.log(tablaOpciones)
            console.log(datos);

        }

        function guardarOpcion(event){
            event.preventDefault();
            const id_acueducto = document.getElementById('id_acueducto').value;
            const descrip_ot = document.getElementById('descrip_ot').value;
            const id_sistema = document.getElementById('id_sistema').value;
            const id_equipo = document.getElementById('id_equipo').value;
            const id_tipo_orden = document.querySelector('input[name="id_tipo_orden"]:checked').value;
            const id_prioridad = document.querySelector('input[name="id_prioridad"]:checked').value;
            const dias = document.getElementById('dias').value;
            //const hora = document.getElementById('hora').value;
            const fecha_inicio = document.getElementById('fecha_inicio').value;
            const fecha_final = document.getElementById('fecha_final').value;
            const observacion = document.getElementById('observacion').value;
            const odt = {
                id_acueducto,
                descrip_ot,
                id_sistema,
                id_equipo,
                id_tipo_orden,
                id_prioridad,
                dias,
                // hora,
                fecha_inicio,
                fecha_final,
                observacion
            };
            console.log(odt);

            console.log(form);
            console.log(datos);
            fetch('/mantenimiento/ordentrabajo', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    "X-CSRF-Token": csrfToken
                },
                body: JSON.stringify({ data: datos,
                    odt})
            })
                .then(response => response.json())
                .then(data => {
                    const odtNumber = data.odt.id_orden;
                    Swal.fire({
                        title: '¡Éxito!',
                        text: `Orden de trabajo creada satisfactoriamente. Número de orden: ${odtNumber}`,
                        icon: 'success'
                    }).then((result) => {
                        // Redirigir a la ruta
                        if (result.isConfirmed) {
                            window.location.href = '{{route('ordentrabajo.index')}}';
                        }
                    });
                })
                .catch(error => console.error(error));
        }



        btnAgregar.addEventListener('click', agregarOpcion);
        btnGuardar.addEventListener('click', guardarOpcion);
        // const acueducto = document.getElementById('id_acueducto')
        // const sistema = document.getElementById('id_sistema')


        //     acueducto.addEventListener('change', async (e)=>{
        //    // console.log(e.target.value)
        //     const response = await fetch(`/mantenimiento/ordentrabajo/${e.target.value}/acueducto`)

        //     const data = await response.json();

        //    // console.log(data)

        //     let opciones = ``;

        //     data.forEach(element => {
        //         opciones = opciones + `<option value="${element.id_sistema}">${element.nom_sistema}`
        //     })

        //     sistema.innerHTML = opciones;
        // })

    </script>
@endsection


