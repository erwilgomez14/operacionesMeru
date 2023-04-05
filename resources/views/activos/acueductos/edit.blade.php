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
                    <form method="POST" action="{{route('acueductos.update', $acueducto)}}" enctype="multipart/form-data">
                        @method('PATCH')
                        @csrf()
                        <h2 class="tittle"> Edicion de acueducto</h2>


                        <div class="form-group">
                            <label for="id_acueducto">ID del Acueducto:</label>
                            <input type="text" name="id_acueducto" class="form-control" id="id_acueducto" placeholder="id del acueducto" value="{{old('id_acueducto', $acueducto->id_acueducto ?? '')}}">
                        </div>

                        <div class="form-group">
                            <label for="nom_acu">Nombre:</label>
                            <input type="text" name="nom_acu" class="form-control" id="nom_acu" placeholder="nombre..." value="{{old('nom_acu', $acueducto->nom_acu ?? '')}}">
                        </div>
                        <div class="form-group">
                            <label for="desc_acu">Descripcion</label>
                            <input type="text" name="desc_acu"class="form-control" id="desc_acu" placeholder="descripcion acueducto" value="{{old('desc_acu', $acueducto->desc_acu ?? '')}}">
                        </div>
                        <div class="form-group">
                            <label for="fuente_abast">Fuente de abastesimiento</label>
                            <input type="text" name="fuente_abast" class="form-control" id="fuente_abast" placeholder="fuente de abastesimiento" value="{{old('fuente_abast', $acueducto->fuente_abast ?? '')}}">
                        </div>
                        <div class="form-group">
                            <label for="capacidad_almac">Capacidad de Almacenamiento:</label>
                            <input type="text" name="capacidad_almac" class="form-control" id="capacidad_almac" placeholder="capacidad de almacenamiento" value="{{old('capacidad_almac', $acueducto->capacidad_almac ?? '')}}">
                        </div>
                        <div class="form-group">
                            <label for="tiempo_oper">Tiempo de operacion</label>
                            <input type="text" name="tiempo_oper" class="form-control" id="tiempo_oper" placeholder="tiempo de operacion" value="{{old('tiempo_oper', $acueducto->tiempo_oper ?? '')}}">
                        </div>
                        <div class="form-group">
                            <label for="energia_util">Energia util</label>
                            <input type="text" name="energia_util" class="form-control" id="energia_util" placeholder="energia util" value="{{old('energia_util', $acueducto->energia_util ?? '')}}">
                        </div>
                        <div class="form-group">
                            <label for="modelo_planta">Modelo de planta</label>
                            <input type="text" name="modelo_planta" class="form-control" id="modelo_planta" placeholder="modelo de planta" value="{{old('modelo_planta', $acueducto->modelo_planta ?? '')}}">
                        </div>
                        <div class="form-group">
                            <label for="id_gerencia">Gerencia</label>
                            <select class="custom-select" name="id_gerencia" aria-label="">
                                <option selected disabled value="{{$acueducto->id_gerencia}}" >{{old('id_gerencia', $acueducto->sistemas->nom_sistema ?? 'Selecionar Gerencia')}}</option>
                                @foreach($gerencias as $gerencia)
                                    <option value="{{$gerencia->id_gerencia}}">{{$gerencia->nombre_gerencia}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="cod_ubi">Localidad</label>
                            <select class="custom-select" name="cod_ubi" aria-label="">
                                <option selected disabled value="{{$acueducto->cod_ubi}}">{{old('cod_ubi', $acueducto->localidades->desubi ?? 'Seleccionar Localidad')}}</option>
                                @foreach($localidades as $localidad)
                                    <option value="{{$localidad->codubi}}">{{$localidad->desubi}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group pt-2">
                            <a href="{{route('acueductos.index')}}" class="btn btn-dark">Volver</a>
                            <input class="btn btn-primary" type="submit" value="Guardar">
                        </div>
                    </form>


                </div>
            </div>
        </div>

    </div>

@endsection
