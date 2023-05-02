@extends('panel.layouts.page')

@section('styles')


@endsection
@section('content')
    <div class="row layout-top-spacing">

        <div class="col-xl-12 col-lg-12 col-md-12 col-12 layout-spacing">
            <div class="widget-content-area br-4">
                <div class="widget-one">
                    <div class="card">
                        <div class="card-header">
                            <h2 class="">Orden de trabajo Nº: {{$registro->id_orden}}</h2>

                        </div>
                        <div class="card-body">

                            <h4>Descripcion: {{$registro->descrip_ot}}</h4>
                            <h4>Acueducto: {{$acueducto->nom_acu}}</h4>
                            <h4>Area/estacion: {{$area->nom_sistema}}</h4>
                            <h4>Equipo: {{$equipo->nombre_subsistema}}</h4>
                            <h4>Tipo de Orden: {{$tipo->desc_orden}}</h4>
                            <h4>Fecha de creacion de la orden: {{$registro->fecha}}</h4>
                            <h4>Fecha de inicio programada: {{$registro->fecha_inicio}}</h4>
                            <h4>Fecha final programda: {{$registro->fecha_final}}</h4>
                            <h4>Duracion: {{$registro->dias}} dias</h4>


                            <table class="table mt-3">
                                <thead class="thead-dark">
                                <tr>
                                    <th>Cedula</th>
                                    <th>Nombre</th>
                                </tr>
                                </thead>
                                <tbody>
                                <h4 class="text-center mt-4">Datos de la mano de obra</h4>
                                @foreach ($obreros as $obrero)
                                    <tr>
                                        <td>{{ $obrero->cedula }}</td>
                                        <td>{{ $obrero->obreros->nombre }}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <table class="table mt-3">
                                <thead class="thead-dark">
                                <tr>
                                    <th>#</th>
                                    <th>Descripcion</th>
                                </tr>
                                </thead>
                                <tbody>
                                <h4 class="text-center mt-4">Datos del conjuntos de equipos del subsistema</h4>
                                @foreach ($equipos as $equipo)
                                    <tr>
                                        <td>{{ $equipo->id_equipo }}</td>
                                        <td>{{ $equipo->desc_equipo }}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>

                            <table class="table mt-3">
                                <thead class="thead-dark">
                                <tr>
                                    <th>Descripcion</th>
                                    <th>tareas</th>
                                </tr>
                                </thead>
                                <tbody>
                                <h4 class="text-center mt-4">Tareas asignadas al conjuntos de equipos del subsistema</h4>
                                @foreach ($equipos as $equipo)
                                    <tr>
                                        <td>{{ $equipo->desc_equipo }}</td>
                                        <td>
                                            @foreach ($equipo->tareas as $tarea)
                                                {{ $tarea->tarea }}<br>
                                            @endforeach
                                        </td>

                                    </tr>
                                @endforeach
                                </tbody>
                            </table>

                            <table class="table mt-3">
                                <thead class="thead-dark">
                                <tr>
                                    <th>Herramientas</th>
                                    <th>tareas</th>
                                </tr>
                                </thead>
                                <tbody>
                                <h4 class="text-center mt-4">Herramientas asignadas al conjuntos de tareas del subsistema</h4>
                                    @foreach($colecciontahr as $item)
                                        <tr>
                                            <td>{{ $item['nombre_grupo'] }}</td>
                                            <td>{{ $item['tarea'] }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>


                            <div class="card-footer">

                                <a href="{{route('mantenimientopreventivo.index')}}" class="btn btn-primary">Volver al calendario</a>
                                <a href="{{route('ordentrabajo.pdf', $registro->id_orden)}}" class="btn btn-primary" target="_blank">Imprimir orden</a>
                                <a href="{{route('ordentrabajo.pdfff')}}" class="btn btn-primary" target="_blank">Imprimir orde1n</a>
                            </div>
                        </div>

                    </div>
                </div>

            </div>

        </div>
@endsection

@section('scripts')


@endsection
