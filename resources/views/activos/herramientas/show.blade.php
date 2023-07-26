@extends('panel.layouts.page')

@section('content')
    <div class="row layout-top-spacing">

        <div class="col-xl-12 col-lg-12 col-md-12 col-12 layout-spacing">
            <div class="widget-content-area br-4">
                <div class="widget-one">

                    <div class="row">
                        <div class="col-3">
                        </div>

                        <div class="col-6">
                            <div class="card text-center">
                                <div class="card-header">
                                    <h2 class="">Herramienta: {{ $herramienta->nombre_herramienta }}</h2>

                                </div>
                                <div class="card-body">
                                    <h4>Codigo: {{ $herramienta->id_herramienta }}</h4>
                                    @if ($herramienta->id_grupo_herramienta != null)
                                        <h4>Pertenece al grupo: {{ $herramienta->grupos->nombre_grupo }}
                                        </h4>
                                    @endif
                                </div>
                                <div class="card-footer">

                                    <a href="{{ route('herramientas.index') }}" class="btn btn-primary">Volver al listado</a>
                                </div>
                            </div>
                        </div>

                        <div class="col">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
