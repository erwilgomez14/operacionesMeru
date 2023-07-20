@extends('panel.layouts.page')

@section('content')
    <div class="row layout-top-spacing">

        <div class="col-xl-12 col-lg-12 col-md-12 col-12 layout-spacing">
            <div class="widget-content-area br-4">
                <div class="widget-one">

                    <div class="card">
                        <div class="card-header">
                            <h2 class="">Subsistema: {{ $subsistema->id_subsistema }}</h2>

                        </div>
                        <div class="card-body">
                            {{-- <h4><span style="font-weight: bold;">Nombre:</span> {{$acueducto->nom_acu}}</h4> --}}
                            <h4><span style="font-weight: bold;">Nombre del subsistema:</span>
                                {{ $subsistema->nombre_subsistema }}</h4>
                            <h4><span style="font-weight: bold;">Sistema:</span> {{ $subsistema->sistemas->nom_sistema }}
                            </h4>
                            <h4><span style="font-weight: bold;">Descripcion del subsistema:</span>
                                {{ $subsistema->desc_subsistema }}</h4>
                            <h4><span style="font-weight: bold;">Estatus:</span> {{ $subsistema->estatus->nombre_estatus }}
                            </h4>
                            <h4><span style="font-weight: bold;">Capacidad del subsistema:</span>
                                {{ $subsistema->capacidad_subsistema }}</h4>
                            @if ($subsistema->observacion != null)
                                <h4><span style="font-weight: bold;">Observacion:</span> {{ $subsistema->observacion }}
                                </h4>
                            @endif

                        </div>
                        <div class="card-footer">

                            <a href="{{ route('subsistemas.index') }}" class="btn btn-primary">Volver al listado</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
