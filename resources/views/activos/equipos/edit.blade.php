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
                    <form method="POST" action="{{route('equipos.update', $equipo)}}" enctype="multipart/form-data">
                        @method('PATCH')
                        @csrf()
                        <h2 class="tittle"> Edicion de Equipo</h2>
                        <div class="form-group">
                            <label for="id_equipo">ID de equipo:</label>
                            <input type="text" name="id_equipo" class="form-control" id="id_equipo" placeholder="id del equipo" value="{{old('id_equipo', $equipo->id_equipo ?? '')}}">
                        </div>
                        <div class="form-group">
                            <label for="id_sistema">Sistema:</label>
                            <select class="custom-select" aria-label="" name="id_sistema">
                                @foreach($sistemas as $sistema)
                                    <option value="{{$sistema->id_sistema}}">{{$sistema->nom_sistema}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="id_subsistema">Subsistema:</label>
                            <select class="custom-select" aria-label="" name="id_subsistema">
                                @foreach($subsistemas as $subsistema)
                                    <option value="{{$subsistema->id_subsistema}}">{{$subsistema->nombre_subsistema}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="serial">Serial:</label>
                            <input type="text" name="serial" class="form-control" id="serial" placeholder="serial" value="{{old('serial', $equipo->serial ?? '')}}">
                        </div>
                        <div class="form-group">
                            <label for="desc_equipo">Descripcion de equipo:</label>
                            <input type="text" name="desc_equipo" class="form-control" id="desc_equipo" placeholder="serial" value="{{old('desc_equipo', $equipo->desc_equipo ?? '')}}">
                        </div>

                        <div class="form-group">
                            <label for="potencia">Potencia:</label>
                            <input type="text" name="potencia" class="form-control" id="potencia" placeholder="potencia" value="{{old('potencia', $equipo->potencia ?? '')}}">
                        </div>
                        <div class="form-group">
                            <label for="velocidad">Velocidad:</label>
                            <input type="text" name="velocidad" class="form-control" id="velocidad" placeholder="velocidad" value="{{old('velocidad', $equipo->velocidad ?? '')}}">
                        </div>
                        <div class="form-group">
                            <label for="voltaje">Voltaje:</label>
                            <input type="text" name="voltaje" class="form-control" id="voltaje" placeholder="voltaje" value="{{old('voltaje', $equipo->voltaje ?? '')}}">
                        </div>
                        <div class="form-group">
                            <label for="frame">Frame:</label>
                            <input type="text" name="frame" class="form-control" id="frame" placeholder="frame" value="{{old('frame', $equipo->frame ?? '')}}">
                        </div>
                        <div class="form-group">
                            <label for="fs">Fs:</label>
                            <input type="text" name="fs" class="form-control" id="fs" placeholder="fs" value="{{old('fs', $equipo->fs ?? '')}}">
                        </div>
                        <div class="form-group">
                            <label for="peso">Peso:</label>
                            <input type="text" name="peso" class="form-control" id="peso" placeholder="peso" value="{{old('peso', $equipo->peso ?? '')}}">
                        </div>
                        <div class="form-group">
                            <label for="temperatura">Temperatura:</label>
                            <input type="text" name="temperatura" class="form-control" id="temperatura" placeholder="temperatura" value="{{old('temperatura', $equipo->temperatura ?? '')}}">
                        </div>
                        <div class="form-group">
                            <label for="nvecrep">Numero de veces de reparacion del equipo:</label>
                            <input type="number" name="nvecrep" class="form-control" id="nvecrep" placeholder="nvecrep" value="{{old('nvecrep', $equipo->nvecrep ?? '')}}">
                        </div>
                        <div class="form-group">
                            <label for="permant">permant:</label>
                            <input type="text" name="permant" class="form-control" id="permant" placeholder="permant" value="{{old('permant', $equipo->permant ?? '')}}">
                        </div>
                        <div class="form-group">
                            <label for="rpm">RPM:</label>
                            <input type="text" name="rpm" class="form-control" id="rpm" placeholder="rpm" value="{{old('rpm', $equipo->rpm ?? '')}}">
                        </div>
                        <div class="form-group">
                            <label for="id_tipo_eq">Tipo de equipo:</label>
                            <select class="custom-select" aria-label="" name="id_tipo_eq">
                                @foreach($tiposequipos as $tipoequipo)
                                    <option value="{{$tipoequipo->id_tipo_eq}}">{{$tipoequipo->descripcion_tieq}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="id_estatus">Estatus:</label>
                            <input type="text" name="id_estatus" class="form-control" id="id_estatus" placeholder="id_estatus" value="{{old('id_estatus', $equipo->id_estatus ?? '')}}">
                        </div>
                        <div class="form-group">
                            <label for="fabricante">Fabricante:</label>
                            <input type="text" name="fabricante" class="form-control" id="fabricante" placeholder="fabricante" value="{{old('fabricante', $equipo->fabricante ?? '')}}">
                        </div>
                        <div class="form-group">
                            <label for="amperios">amperios:</label>
                            <input type="text" name="amperios" class="form-control" id="amperios" placeholder="amperios" value="{{old('amperios', $equipo->amperios ?? '')}}">
                        </div>
                        <div class="form-group">
                            <label for="ciclos">ciclos:</label>
                            <input type="text" name="ciclos" class="form-control" id="ciclos" placeholder="ciclos" value="{{old('ciclos', $equipo->ciclos ?? '')}}">
                        </div>
                        <div class="form-group">
                            <label for="ph">ph:</label>
                            <input type="text" name="ph" class="form-control" id="ph" placeholder="ph" value="{{old('ph', $equipo->ph ?? '')}}">
                        </div>
                        <div class="form-group">
                            <label for="capacidad_ac_sup">capacidad acueducto superior:</label>
                            <input type="text" name="capacidad_ac_sup" class="form-control" id="capacidad_ac_sup" placeholder="capacidad_ac_sup" value="{{old('capacidad_ac_sup', $equipo->capacidad_ac_sup ?? '')}}">
                        </div>
                        <div class="form-group">
                            <label for="capacidad_ac_inf">capacidad acueducto inferior:</label>
                            <input type="text" name="capacidad_ac_inf" class="form-control" id="capacidad_ac_inf" placeholder="capacidad_ac_inf" value="{{old('capacidad_ac_inf', $equipo->capacidad_ac_inf ?? '')}}">
                        </div>
                        <div class="form-group">
                            <label for="id_tipo_sistema">capacidad acueducto inferior:</label>
                        </div>
                        <div class="form-group">
                            <label for="fecha_adquisicion">Fecha adquisicion:</label>
                            <input type="date" name="fecha_adquisicion" class="form-control" id="fecha_adquisicion" placeholder="fecha_adquisicion" value="{{old('fecha_adquisicion', $equipo->fecha_adquisicion ?? '')}}">
                        </div>
                        <div class="form-group">
                            <label for="fecha_instalacion">Fecha instalacion:</label>
                            <input type="date" name="fecha_instalacion" class="form-control" id="fecha_instalacion" placeholder="fecha_instalacion" value="{{old('fecha_instalacion', $equipo->fecha_instalacion ?? '')}}">
                        </div>
                        <div class="form-group">
                            <label for="caudal">Caudal:</label>
                            <input type="text" name="caudal" class="form-control" id="caudal" placeholder="caudal" value="{{old('caudal', $equipo->caudal ?? '')}}">
                        </div>
                        <div class="form-group">
                            <label for="altura">Altura:</label>
                            <input type="text" name="altura" class="form-control" id="altura" placeholder="altura" value="{{old('altura', $equipo->altura ?? '')}}">
                        </div>
                        <div class="form-group">
                            <label for="descarga">descarga:</label>
                            <input type="text" name="descarga" class="form-control" id="descarga" placeholder="descarga" value="{{old('descarga', $equipo->descarga ?? '')}}">
                        </div>
                        <div class="form-group">
                            <label for="longitud_columna">longitud de columna:</label>
                            <input type="text" name="longitud_columna" class="form-control" id="longitud_columna" placeholder="longitud_columna" value="{{old('longitud_columna', $equipo->longitud_columna ?? '')}}">
                        </div>
                        <div class="form-group">
                            <label for="succion">succion:</label>
                            <input type="text" name="succion" class="form-control" id="succion" placeholder="succion" value="{{old('succion', $equipo->succion ?? '')}}">
                        </div>
                        <div class="form-group">
                            <label for="num_etapas">Numero de etapas:</label>
                            <input type="number" name="num_etapas" class="form-control" id="num_etapas" placeholder="num_etapas" value="{{old('num_etapas', $equipo->num_etapas ?? '')}}">
                        </div>
                        <div class="form-group">
                            <label for="capacidad">capacidad:</label>
                            <input type="text" name="capacidad" class="form-control" id="capacidad" placeholder="capacidad" value="{{old('capacidad', $equipo->capacidad ?? '')}}">
                        </div>
                        <div class="form-group">
                            <label for="frecuencia">frecuencia:</label>
                            <input type="text" name="frecuencia" class="form-control" id="frecuencia" placeholder="frecuencia" value="{{old('frecuencia', $equipo->frecuencia ?? '')}}">
                        </div>
                        <div class="form-group">
                            <label for="corriente">corriente:</label>
                            <input type="text" name="corriente" class="form-control" id="corriente" placeholder="corriente" value="{{old('corriente', $equipo->corriente ?? '')}}">
                        </div>
                        <div class="form-group">
                            <label for="impedancia">impedancia:</label>
                            <input type="text" name="impedancia" class="form-control" id="impedancia" placeholder="impedancia" value="{{old('impedancia', $equipo->impedancia ?? '')}}">
                        </div>
                        <div class="form-group">
                            <label for="tipo_filtro">tipo de filtro:</label>
                            <input type="text" name="tipo_filtro" class="form-control" id="tipo_filtro" placeholder="tipo_filtro" value="{{old('tipo_filtro', $equipo->tipo_filtro ?? '')}}">
                        </div>
                        <div class="form-group">
                            <label for="rata_filtracion">rata_filtracion:</label>
                            <input type="text" name="rata_filtracion" class="form-control" id="rata_filtracion" placeholder="rata_filtracion" value="{{old('rata_filtracion', $equipo->rata_filtracion ?? '')}}">
                        </div>
                        <div class="form-group">
                            <label for="capacidad_filtracion">capacidad de filtracion:</label>
                            <input type="text" name="capacidad_filtracion" class="form-control" id="capacidad_filtracion" placeholder="capacidad_filtracion" value="{{old('capacidad_filtracion', $equipo->capacidad_filtracion ?? '')}}">
                        </div>
                        <div class="form-group">
                            <label for="rendimiento">rendimiento:</label>
                            <input type="text" name="rendimiento" class="form-control" id="rendimiento" placeholder="rendimiento" value="{{old('rendimiento', $equipo->rendimiento ?? '')}}">
                        </div>
                        <div class="form-group">
                            <label for="perdida_carga">perdida_carga:</label>
                            <input type="text" name="perdida_carga" class="form-control" id="perdida_carga" placeholder="perdida_carga" value="{{old('perdida_carga', $equipo->perdida_carga ?? '')}}">
                        </div>
                        <div class="form-group">
                            <label for="area">area:</label>
                            <input type="text" name="area" class="form-control" id="area" placeholder="area" value="{{old('area', $equipo->area ?? '')}}">
                        </div>
                        <div class="form-group">
                            <label for="largo">largo:</label>
                            <input type="text" name="largo" class="form-control" id="largo" placeholder="largo" value="{{old('largo', $equipo->largo ?? '')}}">
                        </div>
                        <div class="form-group">
                            <label for="ancho">ancho:</label>
                            <input type="text" name="ancho" class="form-control" id="ancho" placeholder="ancho" value="{{old('ancho', $equipo->ancho ?? '')}}">
                        </div>
                        <div class="form-group">
                            <label for="diametro">diametro:</label>
                            <input type="text" name="diametro" class="form-control" id="diametro" placeholder="diametro" value="{{old('diametro', $equipo->diametro ?? '')}}">
                        </div>
                        <div class="form-group">
                            <label for="clase">diametro:</label>
                            <input type="text" name="clase" class="form-control" id="clase" placeholder="clase" value="{{old('clase', $equipo->clase ?? '')}}">
                        </div>
                        <div class="form-group">
                            <label for="flow">flow:</label>
                            <input type="text" name="flow" class="form-control" id="flow" placeholder="flow" value="{{old('flow', $equipo->flow ?? '')}}">
                        </div>
                        <div class="form-group">
                            <label for="tipo">tipo:</label>
                            <input type="text" name="tipo" class="form-control" id="tipo" placeholder="tipo" value="{{old('tipo', $equipo->tipo ?? '')}}">
                        </div>
                        <div class="form-group">
                            <label for="presion">presion:</label>
                            <input type="text" name="presion" class="form-control" id="presion" placeholder="presion" value="{{old('presion', $equipo->presion ?? '')}}">
                        </div>
                        <div class="form-group">
                            <label for="material">material:</label>
                            <input type="text" name="material" class="form-control" id="material" placeholder="material" value="{{old('material', $equipo->material ?? '')}}">
                        </div>
                        <div class="form-group">
                            <label for="sustancia">sustancia:</label>
                            <input type="text" name="sustancia" class="form-control" id="sustancia" placeholder="sustancia" value="{{old('sustancia', $equipo->sustancia ?? '')}}">
                        </div>
                        <div class="form-group">
                            <label for="dias_almacenamiento">dias_almacenamiento:</label>
                            <input type="text" name="dias_almacenamiento" class="form-control" id="dias_almacenamiento" placeholder="dias_almacenamiento" value="{{old('dias_almacenamiento', $equipo->dias_almacenamiento ?? '')}}">
                        </div>
                        <div class="form-group">
                            <label for="rango">rango:</label>
                            <input type="text" name="rango" class="form-control" id="rango" placeholder="rango" value="{{old('rango', $equipo->rango ?? '')}}">
                        </div>
                        <div class="form-group">
                            <label for="precision">precision:</label>
                            <input type="text" name="precision" class="form-control" id="precision" placeholder="precision" value="{{old('precision', $equipo->precision ?? '')}}">
                        </div>
                        <div class="form-group">
                            <label for="capacidad_dinamica">capacidad_dinamica:</label>
                            <input type="text" name="capacidad_dinamica" class="form-control" id="capacidad_dinamica" placeholder="capacidad_dinamica" value="{{old('capacidad_dinamica', $equipo->capacidad_dinamica ?? '')}}">
                        </div>
                        <div class="form-group">
                            <label for="eficiencia_maxima">eficiencia_maxima:</label>
                            <input type="text" name="eficiencia_maxima" class="form-control" id="eficiencia_maxima" placeholder="eficiencia_maxima" value="{{old('eficiencia_maxima', $equipo->eficiencia_maxima ?? '')}}">
                        </div>
                        <div class="form-group">
                            <label for="diseno">diseno:</label>
                            <input type="text" name="diseno" class="form-control" id="diseno" placeholder="diseno" value="{{old('diseno', $equipo->diseno ?? '')}}">
                        </div>
                        <div class="form-group">
                            <label for="cuerpo">cuerpo:</label>
                            <input type="text" name="cuerpo" class="form-control" id="cuerpo" placeholder="cuerpo" value="{{old('cuerpo', $equipo->cuerpo ?? '')}}">
                        </div>
                        <div class="form-group">
                            <label for="modelo">modelo:</label>
                            <select class="custom-select" aria-label="" name="modelo">
                                @foreach($modelos as $modelo)
                                    <option value="{{$modelo->id_modelo}}">{{$modelo->nombre_modelo}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="marca">marca:</label>
                            <select class="custom-select" aria-label="" name="marca">
                                @foreach($marcas as $marca)
                                    <option value="{{$marca->id_marca}}">{{$marca->nombre_marca}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group pt-2">
                            <a href="{{route('equipos.index')}}" class="btn btn-dark">Volver</a>
                            <input class="btn btn-primary" type="submit" value="Guardar">
                        </div>
                    </form>


                </div>
            </div>
        </div>

    </div>

@endsection
