@extends('panel.layouts.page')

@section('content')
    <div class="row layout-top-spacing">

        <div class="col-xl-12 col-lg-12 col-md-12 col-12 layout-spacing">
            <div class="widget-content-area br-4">
                <div class="widget-one">

                    <div class="card">
                        <div class="card-header">
                            <h2 class="">Subsistema: {{$subsistema->id_subsistema}}</h2>

                        </div>
                        <div class="card-body">
                            <h4>Nombre del subsistema: {{$subsistema->nombre_subsistema}}</h4>
                            <h4>Sistema: {{$subsistema->sistemas->nom_sistema}}</h4>
                            <h4>Descripcion del subsistema: {{$subsistema->desc_subsistema}}</h4>
                            <h4>Posicion Tecnica: {{$subsistema->posicion_tecnica}}</h4>
                            <h4>Capacidad del subsistema: {{$subsistema->capacidad_subsistema}}</h4>
                            @if($subsistema->observacion != null)
                                <h4>Georeferencia: {{$subsistema->observacion}}</h4>
                            @endif
                        </div>
                        <div class="card-footer">

                            <a href="{{route('subsistemas.index')}}" class="btn btn-primary">Volver al listado</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
