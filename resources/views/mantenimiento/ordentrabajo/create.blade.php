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
                    <form method="POST" action="{{ route('ordentrabajo.store') }}">
                        @csrf
                        <h2 class="tittle"> Creacion de Orden de trabajo</h2>


                        {{-- <div class="form-group">
                            <label for="id_acueducto">Acueducto</label>
                            <select id="id_acueducto" class="custom-select" name="id_acueducto" aria-label="">
                                <option selected>Selecionar Acueducto</option>
                                @foreach ($acueductos as $acueducto)
                                    <option value="{{$acueducto->id_acueducto}}">{{$acueducto->nom_acu}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Sistema</label>
                            <select id="id_sistema" class="custom-select" name="id_sistema" aria-label="">
                                <option selected>Selecionar Sistema</option>
                            </select>
                        </div> --}}

                        <div class="form-group">
                            <label for="id_acueducto">Acueducto</label>
                            <select id="id_acueducto" class="custom-select" name="id_acueducto" aria-label="">
                                <option selected>Selecionar Acueducto</option>
                                @foreach ($acueductos as $acueducto)
                                    <option value="{{ $acueducto->id_acueducto }}">{{ $acueducto->nom_acu }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="id_sistema">Sistema</label>
                            <select id="id_sistema" class="custom-select" name="id_sistema" aria-label="">
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="id_equipo">Equipo</label>
                            <select id="id_equipo" class="custom-select" name="id_equipo" aria-label="">
                            </select>
                        </div>

                        <div class="m-2">
                            <h6>Seleccionar Tipo de Orden</h6>
                            @foreach ($tiposorden as $item)
                                <div class="form-check">
                                    <input class="form-check-input" name="id_tipo_orden" type="radio" value="{{ $item->id_tipo_orden }}"
                                        id="flexCheckDefault">
                                    <label class="form-check-label" for="flexCheckDefault">
                                        {{ $item->desc_orden }}
                                    </label>
                                </div>
                            @endforeach
                        </div>
                        <div class="m-2">
                            <h6>Seleccionar Prioridad de laphp Orden</h6>
                            @foreach ($ordenprioridad as $item1)
                                <div class="form-check">
                                    <input class="form-check-input" name="" type="radio" value="{{ $item1->id_tipo_orden }}"
                                           id="flexCheckDefault">
                                    <label class="form-check-label" for="flexCheckDefault">
                                        {{ $item1->desc_orden }}
                                    </label>
                                </div>
                            @endforeach
                        </div>


                        <div class="form-group">
                            <label for="fecha_inicio">Fecha Inicio</label>
                            <input type="date" name="fecha_inicio" class="form-control" id="fecha_inicio"
                                placeholder="id del acueducto"
                                value="{{ old('fecha_inicio', $ordenTrabajo->fecha_inicio ?? '') }}">

                            <label for="fecha_final">Fecha Final</label>
                            <div>
                            <input type="date" name="fecha_final" class="form-control" id="fecha_final"
                                placeholder="id del acueducto"
                                value="{{ old('fecha_final', $ordenTrabajo->fecha_final ?? '') }}">
                            </div>
                        </div>
                        <div class="form-group pt-2">
                            <a href="{{ route('acueductos.index') }}" class="btn btn-dark">Volver</a>
                            <input class="btn btn-primary" type="submit" value="Guardar">
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
        document.getElementById('id_acueducto').addEventListener('change', (e) => {
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
                var opciones = "<option value=''>Seleccionar Sistema</option>";
                for (let i in data.lista) {
                    opciones += '<option value="' + data.lista[i].id_sistema + '">' + data.lista[i]
                        .nom_sistema + '</option>';
                }
                console.log(opciones);
                document.getElementById("id_sistema").innerHTML = opciones;
            }).catch(error => console.error(error));
        })

        document.getElementById('id_sistema').addEventListener('change', (e) => {
            fetch('hasEquipo', {
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
                var opciones = "<option value=''>Seleecionar Equipo</option>";
                for (let i in data.lista) {
                    opciones += '<option value="' + data.lista[i].id_equipo + '">' + data.lista[i]
                        .desc_equipo + '</option>';
                }
                document.getElementById("id_equipo").innerHTML = opciones;
            }).catch(error => console.error(error));
        })

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
