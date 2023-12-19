@extends('panel.layouts.page')

@section('content')
    <div class="row layout-top-spacing">

        <div class="col-xl-12 col-lg-12 col-md-12 col-12 layout-spacing">
            <div class="widget-content-area br-4">
                <div class="widget-one">
                    <div class="row">
                        <div class="col-md-6">
                            <h3>Grupo de tareas</h3>
                        </div>
                        <div class="col-md-6">
                            <a href="{{ route('grupotareas.create') }}" class="btn btn-primary btn-lg float-md-right"
                                role="button" aria-pressed="true">Crear Tarea</a>
                        </div>
                    </div>
                    <div class="mt-5">
                        <h4> Presione un Grupo </h4>
                        <div class="mt-3" style="margin: 0 auto">
                            @foreach ($tiposDeEquipo as $equipo)
                                <a href="#" class="btn btn-{{ $equipo['color'] }} mr-3 mt-2" role="button" aria-pressed="true"
                                    data-toggle="modal" data-target="#modal-{{ $equipo['id_tipo_eq'] }}">
                                    {{ $equipo['descripcion_tieq'] }}
                                </a>

                                <!-- Modal para mostrar las tareas -->
                                <div class="modal fade" id="modal-{{ $equipo['id_tipo_eq'] }}" tabindex="-1" role="dialog"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Tareas para
                                                    {{ $equipo['descripcion_tieq'] }}</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <!-- Aquí puedes mostrar las tareas asociadas al equipo -->
                                                {{-- Ejemplo: --}}
                                                @foreach ($tareas as $tarea)
                                                    @if ($tarea['id_tipo_eq'] == $equipo['id_tipo_eq'])
                                                        <p>{{ $tarea['tarea'] }}</p>
                                                        
                                                    @endif
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            {{-- 
                        <a href="" class="btn btn-primary btn-lg mr-3" role="button" aria-pressed="true">Motor</a>
                        <a href="" class="btn btn-secondary btn-lg mr-3" role="button" aria-pressed="true">Bomba</a>
                        <a href="" class="btn btn-custom btn-lg mr-3" role="button" aria-pressed="true">Valvula antiretorno</a>
                        <a href="" class="btn btn-danger btn-lg mr-3" role="button" aria-pressed="true">Valvula de Control</a>
                        <a href="" class="btn btn-dark btn-lg mr-3" role="button" aria-pressed="true">Junta mecanica</a>
                        <a href="" class="btn btn-light btn-lg mr-3" role="button" aria-pressed="true">Tablero de control</a> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
