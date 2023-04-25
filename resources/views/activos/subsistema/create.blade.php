@extends('panel.layouts.page')

@section('content')
    <div class="row layout-top-spacing">

        <div class="col-xl-12 col-lg-12 col-md-12 col-12 layout-spacing">
            <div class="widget-content-area br-4">
                <div class="widget-one">
                    @include('include.sesionalert')
                    <form method="POST" action="{{route('subsistemas.store')}}">
                        @csrf
                        <h2 class="tittle"> Creacion de SubSistema</h2>

                        <div class="form-group">
                            <label for="id_sistema">Sistema</label>
                            <select class="custom-select" name="id_sistema" aria-label="">
                                <option selected id="id_sistema">Selecionar Sistema</option>
                                @foreach($sistemas as $sistema)
                                    <option value="{{$sistema->id_sistema}}">{{$sistema->nom_sistema}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="id_subsistema">ID del SubSistema:</label>
                            <input type="text" name="id_subsistema" class="form-control" id="id_subsistema" placeholder="id del subsistema" value="{{old('id_subsistema', $subsistema->id_subsistema ?? '')}}">
                        </div>
                        <div class="form-group">
                            <label for="nombre_subsistema">Nombre del SubSistema:</label>
                            <input type="text" name="nombre_subsistema" class="form-control" id="nombre_subsistema" placeholder="nombre del subsistema" value="{{old('nombre_subsistema', $subsistema->nombre_subsistema ?? '')}}">
                        </div>
                        <div class="form-group">
                            <label for="desc_subsistema">Descripcion del SubSistema:</label>
                            <input type="text" name="desc_subsistema" class="form-control" id="desc_subsistema" placeholder="descripcion del subsistema" value="{{old('desc_subsistema', $subsistema->desc_subsistema ?? '')}}">
                        </div>
                        <div class="form-group">
                            <label for="posicion_tecnica">Posicion Tecnica del SubSistema:</label>
                            <input type="text" name="posicion_tecnica" class="form-control" id="posicion_tecnica" placeholder="posicion tecnnica del subsistema" value="{{old('posicion_tecnica', $subsistema->posicion_tecnica ?? '')}}">
                        </div>
                        <div class="form-group">
                            <label for="capacidad_subsistema">Capacidad del SubSistema:</label>
                            <input type="number" name="capacidad_subsistema" class="form-control" id="capacidad_subsistema" placeholder="capacidad del subsistema" value="{{old('capacidad_subsistema', $subsistema->capacidad_subsistema ?? '')}}">
                        </div>
                        <div class="form-group pt-2">
                            <a href="{{route('subsistemas.index')}}" class="btn btn-dark">Volver</a>
                            <input class="btn btn-primary" type="submit" value="Guardar">
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>

@endsection

@section('scripts')
    <script>
        $(document).ready(function() {
            // Obtener el elemento select que contiene los sistemas
            var sistemasSelect = $("select[name='id_sistema']");

            // Obtener el elemento input de id_subsistema
            var idSubsistemaInput = $("input[name='id_subsistema']");

            // Escuchar el evento "change" en el select de sistemas
            sistemasSelect.on("change", function() {
                // Obtener el valor seleccionado del select
                var selectedSistema = sistemasSelect.val() + '-';

                // Actualizar el valor del input de id_subsistema
                idSubsistemaInput.val(selectedSistema);
            });
        });
    </script>
@endsection
