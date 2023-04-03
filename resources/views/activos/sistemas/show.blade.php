@extends('panel.layouts.page')

@section('content')
    <div class="row layout-top-spacing">

        <div class="col-xl-12 col-lg-12 col-md-12 col-12 layout-spacing">
            <div class="widget-content-area br-4">
                <div class="widget-one">

                    <div class="card">
                        <div class="card-header">
                            <h2 class="">Sistema: {{$sistema->id_sistema}}</h2>

                        </div>
                        <div class="card-body">
                            <h4>Acueducto: {{$sistema->acueductos->nom_acu}}</h4>
                            <h4>Nombre del sistema: {{$sistema->nom_sistema}}</h4>
                            <h4>Descripcion del sistema: {{$sistema->desc_sistema}}</h4>
                            <h4>Posiciones: {{$sistema->posiciones}}</h4>
                            <h4>Posicion Necesaria: {{$sistema->posicion_necesaria}}</h4>
                            <h4>Area: {{$sistema->areas->descripcion_area}}</h4>
                            <h4>Maestro de Sistem: {{$sistema->msistemas->nombre_partsi}}</h4>
                            <h4>Ubicaion en planta: {{$sistema->ubicacionesPlantas->descripcion_ubicpl}}</h4>
                            <h4>Capacidad Sistema: {{$sistema->capacidad_sistema}}</h4>
                            @if($sistema->georeferencia != null)
                                <h4>Georeferencia: {{$sistema->georeferencia}}</h4>
                            @endif
                        </div>
                        <div class="card-footer">

                            <a href="{{route('sistemas.index')}}" class="btn btn-primary">Volver al listado</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
