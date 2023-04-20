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



                            <div class="card-footer">

                                <a href="{{route('mantenimientopreventivo.index')}}" class="btn btn-primary">Volver al calendario</a>
                            </div>
                        </div>

                    </div>
                </div>

            </div>

        </div>
@endsection

@section('scripts')


@endsection
