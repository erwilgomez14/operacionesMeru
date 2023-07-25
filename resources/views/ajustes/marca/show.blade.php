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
                                    <h2 class="">Marca: {{ $marca->nombre_marca }}</h2>

                                </div>
                                <div class="card-body">
                                    <h4>Codigo: {{ $marca->id_marca }}</h4>
                                    <h4>Descripcion: {{ $marca->descripcion_marca }}</h4>
                                </div>
                                <div class="card-footer">

                                    <a href="{{ route('marca.index') }}" class="btn btn-primary">Volver al listado</a>
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
