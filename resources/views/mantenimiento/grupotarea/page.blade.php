@extends('panel.layouts.page')

@section('content')
    <div class="row layout-top-spacing">

        <div class="col-xl-12 col-lg-12 col-md-12 col-12 layout-spacing">
            <div class="widget-content-area br-4">
                <div class="widget-one">
                    <div class="row">
                        <div class="col-md-6">
                            <h4>Bienvenido al Grupo de tareas del Meru Operaciones</h4>
                        </div>
                        <div class="col-md-6">
                            <a href="{{route('grupotareas.create')}}" class="btn btn-primary btn-lg float-md-right" role="button" aria-pressed="true">Crear Tarea</a>
                        </div>
                    </div>
                    <div class="mt-5">
                    <h3> Presione un Grupo </h3>
                    <div class="mt-3" style="margin: 0 auto">

                        <a href="" class="btn btn-primary btn-lg mr-3" role="button" aria-pressed="true">Motor</a>
                        <a href="" class="btn btn-secondary btn-lg mr-3" role="button" aria-pressed="true">Bomba</a>
                        <a href="" class="btn btn-custom btn-lg mr-3" role="button" aria-pressed="true">Valvula antiretorno</a>
                        <a href="" class="btn btn-danger btn-lg mr-3" role="button" aria-pressed="true">Valvula de Control</a>
                        <a href="" class="btn btn-dark btn-lg mr-3" role="button" aria-pressed="true">Junta mecanica</a>
                        <a href="" class="btn btn-light btn-lg mr-3" role="button" aria-pressed="true">Tablero de control</a>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
