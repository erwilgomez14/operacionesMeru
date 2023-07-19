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
                            <h4><span style="font-weight: bold;">Nombre:</span> {{$acueducto->nom_acu}}</h4>
                            <h4><span style="font-weight: bold;">Descripcion:</span> {{$acueducto->desc_acu}}</h4>
                            <h4><span style="font-weight: bold;">Fuente de abasteciemiento:</span> {{$acueducto->fuente_abast}}</h4>
                            <h4><span style="font-weight: bold;">Capacidad de Almacenamiento:</span> {{$acueducto->capacidad_almac}} L/S</h4>
                            <h4><span style="font-weight: bold;">Tiempo de operacion:</span> {{$acueducto->tiempo_oper}} Horas</h4>
                            <h4><span style="font-weight: bold;">Energia util:</span> {{$acueducto->energia_util}}</h4>
                            @if($acueducto->id_gerencia != null)
                                <h4><span style="font-weight: bold;">Gerencia:</span> {{$acueducto->gerencias->nombre_gerencia}}</h4>
                            @endif
                            @if($acueducto->cod_ubi != null)
                                <h4><span style="font-weight: bold;">Ubicacion:</span> {{$acueducto->localidades->desubi}}</h4>
                            @endif

                            
                        </div>
                        <div class="card-footer">

                            <a href="{{route('acueductos.index')}}" class="btn btn-primary">Volver al listado</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
