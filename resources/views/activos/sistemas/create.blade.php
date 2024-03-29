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
            min-height: calc(100vh - 140px)!important;
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
                    <form method="POST" action="{{route('sistemas.store')}}">
                        @csrf
                        <h2 class="tittle"> Creacion de Sistema</h2>

                        <div class="form-group">
                            <label for="id_acueducto">Acueducto:</label>
                            <select class="custom-select" name="id_acueducto" id="id_acueducto" aria-label="">
                                <option selected disabled>Selecionar Acueducto</option>
                                @foreach($acueductos as $acueducto)
                                    <option value="{{$acueducto->id_acueducto}}">{{$acueducto->nom_acu}}</option>

                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="id_sistema">ID del Sistema:</label>
                            <input type="text" name="id_sistema" class="form-control" id="id_sistema" placeholder="id del sistema" value="{{old('id_sistema', $sistema->id_sistema ?? '')}}">
                        </div>


                        <div class="form-group">
                            <label for="nom_sistema">Nombre:</label>
                            <input type="text" name="nom_sistema"class="form-control" id="nom_sistema" placeholder="nombre sistema" value="{{old('nom_sistema', $sistema->nom_sistema ?? '')}}">
                        </div>
                        <div class="form-group">
                            <label for="desc_sistema">Descripcion</label>
                            <input type="text" name="desc_sistema" class="form-control" id="fuente_abast" placeholder="descripcion del sistema" value="{{old('desc_sistema', $sistema->desc_sistema ?? '')}}">
                        </div>
                        <div class="form-group">
                            <label for="posiciones">Posiciones:</label>
                            <input type="number" name="posiciones" class="form-control" id="posiciones" placeholder="posiciones" value="{{old('posiciones', $sistema->posiciones ?? '')}}">
                        </div>
                        <div class="form-group">
                            <label for="posicion_necesaria">Posicion Necesaria</label>
                            <input type="number" name="posicion_necesaria" class="form-control" id="posicion_necesaria" placeholder="Posicion Necesaria" value="{{old('posicion_necesaria', $sistema->posicion_necesaria ?? '')}}">
                        </div>
                        <div class="form-group">
                            <label for="id_area">Area</label>
                            <select class="custom-select" name="id_area" aria-label="">
                                <option selected>Selecionar area</option>
                                @foreach($areas as $area)
                                    <option value="{{$area->id_area}}">{{$area->descripcion_area}}</option>

                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="id_ubicpl">Ubicaion en planta:</label>
                            <select class="custom-select" name="id_ubicpl" aria-label="">
                                <option selected>Selecionar ubicacion</option>
                                @foreach($ubiplantas as $plantas)
                                    <option value="{{$plantas->id_ubicpl}}">{{$plantas->descripcion_ubicpl}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="id_pardeftsi">Tipo de sistema</label>
                            <select class="custom-select" name="id_pardeftsi" aria-label="">
                                <option selected>Selecionar tipo de sistema</option>
                                @foreach($maestrosistemas as $tiposistema)
                                    <option value="{{$tiposistema->id_pardeftsi}}">{{$tiposistema->nombre_partsi}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="capacidad_sistema">Capacidad de Sistema</label>
                            <input type="number" name="capacidad_sistema" class="form-control" id="capacidad_sistema" placeholder="Capacidad de Sistema" value="{{old('capacidad_sistema', $sistema->capacidad_sistema ?? '')}}">
                        </div>
                        <div class="form-group">
                            <label for="georeferencia">Georeferencia</label>
                            <input type="text" name="georeferencia" class="form-control" id="georeferencia" placeholder="Georeferencia" value="{{old('georeferencia', $sistema->georeferencia ?? '')}}">
                        </div>

                        <div class="form-group pt-2">
                            <a href="{{route('sistemas.index')}}" class="btn btn-dark">Volver</a>
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
        var acueducto_select = document.getElementById("id_acueducto");
        var id_sistema_input = document.getElementById("id_sistema");

        acueducto_select.addEventListener("change", function() {
            var selected_option = acueducto_select.options[acueducto_select.selectedIndex].value;
            id_sistema_input.value = selected_option+'-';
        });
    </script>
@endsection

