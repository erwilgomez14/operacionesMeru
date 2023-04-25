@extends('panel.layouts.page')

@section('content')
    <div class="row layout-top-spacing">

        <div class="col-xl-12 col-lg-12 col-md-12 col-12 layout-spacing">
            <div class="widget-content-area br-4">
                <div class="widget-one">
                    @include('include.sesionalert')
                    <form method="POST" action="{{route('grupotareas.store')}}">
                        @csrf
                        <h2 class="tittle"> Creacion de Tarea</h2>
                        <div class="form-group">
                            <label for="id_sistema">Tipo de equipo</label>
                            <select class="custom-select" name="id_sistema" aria-label="">
                                <option selected id="id_sistema">Selecionar Tipo de equipo para la tarea</option>
                                @foreach($tipoequipo as $tipo)
                                    <option value="{{$tipo->id_tipo_eq}}">{{$tipo->descripcion_tieq}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="tarea">Tarea:</label>
                            <input type="text" name="tarea" class="form-control" id="tarea" placeholder="nombre de la tarea" value="{{old('tarea', $tarea->tarea ?? '')}}">
                        </div>
                        <div class="form-group pt-2">
                            <a href="{{route('grupotareas.index')}}" class="btn btn-dark">Volver</a>
                            <input class="btn btn-primary" type="submit" value="Guardar">
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>

@endsection
