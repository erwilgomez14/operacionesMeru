@extends('panel.layouts.page')

@section('content')
    <div class="row layout-top-spacing">

        <div class="col-xl-12 col-lg-12 col-md-12 col-12 layout-spacing">
            <div class="widget-content-area br-4">
                <div class="widget-one">

                    <div class="card">
                        <div class="card-header">
                            <h2 class="">Acueducto: {{$acueducto->id_acueducto}}</h2>

                        </div>
                        <div class="card-body">
                            <h4>Nombre: {{$acueducto->nom_acu}}</h4>
                            <h4>Descripcion: {{$acueducto->dexc_acu}}</h4>
                            <h4>Fuente de abasteciemiento: {{$acueducto->fuente_abast}}</h4>
                            <h4>Capacidad de Almacenamiento: {{$acueducto->capacidad_almac}}</h4>
                            <h4>Tiempo de operacion: {{$acueducto->tiempo_oper}}</h4>
                            <h4>Energiautil: {{$acueducto->energia_util}}</h4>
                            <h4>Modelo de planta: {{$acueducto->modelo_planta}}</h4>
                            <h4>Gerencia: {{$acueducto->gerencias->nombre_gerencia}}</h4>
                            <h4>Ubicacion: {{$acueducto->localidades->desubi}}</h4>

                            <div class="card-footer">

                                <a href="{{route('acueductos.index')}}" class="btn btn-primary">Volver al listado</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection
