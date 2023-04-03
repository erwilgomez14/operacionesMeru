@extends('panel.layouts.page')

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
                    <form method="POST" action="{{route('sistemas.update', $sistema)}}" enctype="multipart/form-data">
                        @method('PATCH')
                        @csrf()
                        <h2 class="tittle"> Creacion de sistemas</h2>


                        <div class="form-group">
                            <label for="id_sistema">ID del Sistema:</label>
                            <input type="text" name="id_sistema" class="form-control" id="id_sistema" placeholder="id del sistema" value="{{old('id_sistema', $sistema->id_sistema ?? '')}}">
                        </div>

                        <div class="form-group">
                            <label for="id_acueducto">Acueducto:</label>
                            <select class="custom-select" name="id_acueducto" aria-label="">
                                <option selected disabled value="{{$sistema->id_acueducto}}">{{old('id_acueducto', $sistema->acueductos->nom_acu ?? 'Seleccionar Localidad')}}</option>
                                @foreach($acueductos as $acueducto)
                                    <option value="{{$acueducto->id_acueducto}}">{{$acueducto->nom_acu}}</option>

                                @endforeach
                            </select>
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
                            <input type="text" name="posiciones" class="form-control" id="posiciones" placeholder="posiciones" value="{{old('posiciones', $sistema->posiciones ?? '')}}">
                        </div>
                        <div class="form-group">
                            <label for="posicion_necesaria">Posicion Necesaria</label>
                            <input type="text" name="posicion_necesaria" class="form-control" id="posicion_necesaria" placeholder="Posicion Necesaria" value="{{old('posicion_necesaria', $sistema->posicion_necesaria ?? '')}}">
                        </div>
                        <div class="form-group">
                            <label for="id_area">Area</label>
                            <select class="custom-select" name="id_area" aria-label="">
                                <option selected disabled value="{{$sistema->id_area}}">{{old('id_area', $sistema->areas->descripcion_area ?? 'Seleccionar Localidad')}}</option>
                                @foreach($areas as $area)
                                    <option value="{{$area->id_area}}">{{$area->descripcion_area}}</option>

                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="id_ubicpl">Ubicaion en planta:</label>
                            <select class="custom-select" name="id_ubicpl" aria-label="">
                                <option selected disabled value="{{$sistema->id_ubicpl}}">{{old('id_ubicpl', $sistema->ubicacionesPlantas->descripcion_ubicpl ?? 'Seleccionar Localidad')}}</option>
                                @foreach($ubiplantas as $plantas)
                                    <option value="{{$plantas->id_ubicpl}}">{{$plantas->descripcion_ubicpl}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="id_pardeftsi">Tipo de sistema</label>
                            <select class="custom-select" name="id_pardeftsi" aria-label="">
                                <option selected disabled value="{{$sistema->id_pardeftsi}}">{{old('id_pardeftsi', $sistema->msistemas->nombre_partsi ?? 'Seleccionar Localidad')}}</option>
                                @foreach($maestrosistemas as $tiposistema)
                                    <option value="{{$tiposistema->id_pardeftsi}}">{{$tiposistema->nombre_partsi}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="capacidad_sistema">Capacidad de Sistema</label>
                            <input type="text" name="capacidad_sistema" class="form-control" id="capacidad_sistema" placeholder="Capacidad de Sistema" value="{{old('capacidad_sistema', $sistema->capacidad_sistema ?? '')}}">
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
