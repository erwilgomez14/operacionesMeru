@extends('panel.layouts.page')

@section('content')
    <div class="row layout-top-spacing">

        <div class="col-xl-12 col-lg-12 col-md-12 col-12 layout-spacing">
            <div class="widget-content-area br-4">
                <div class="widget-one">
                    <div class="widget-one">
                        @if ($errors->any())
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>

                            <script>
                                $(".alert").alert();
                            </script>
                        @endif
                        @include('include.sesionalert')
                        <form method="POST" action="{{route('equipos.storetipoeq')}}">
                            @csrf
                            <div class="row">
                                <div class="col-md-9">
                                    <h2 class="tittle"> Creacion de Tipo de equipo</h2>
                                </div>
                                <div class="col-md-3">
                                    <button type="button" class="btn btn-custom float-right" data-toggle="modal" data-target="#gruposModal">
                                        Mostrar Tipos creados
                                    </button>
                                </div>
                            </div>
                            <!-- Modal -->
                            <div class="modal fade" id="gruposModal" tabindex="-1" role="dialog" aria-labelledby="gruposModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="gruposModalLabel">Listado de Grupos</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <ul>
                                                @foreach($tipos_eq as $grupo)
                                                    <li>{{ $grupo->descripcion_tieq }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="desc_tieq">Nombre del tipo equipo</label>
                                <input type="text" name="descripcion_tieq" class="form-control" id="descripcion_tieq" placeholder="Nombre del tipo de equipo" value="{{old('descripcion_tieq', $herramienta->nombre_herramienta ?? '')}}">
                            </div>
                            <div class="form-group">
                                <label for="nombre_tipoeq">Siglas del tipo de equipo</label>
                                <input type="text" name="nombre_tipoeq" class="form-control" id="nombre_tipoeq" placeholder="siglas del tipo de equipo" value="{{old('nombre_tipoeq', $herramienta->nombre_herramienta ?? '')}}">
                            </div>
                             <div class="form-group pt-2">
                                <a href="{{route('equipos.index')}}" class="btn btn-dark">Volver</a>
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
        const inputDescripcion = document.querySelector('#descripcion_tieq');
        const inputAbreviatura = document.querySelector('#nombre_tipoeq');

        inputDescripcion.addEventListener('input', function() {
            const descripcion = inputDescripcion.value;
            const abreviatura = descripcion.substring(0, 4).toUpperCase();
            inputAbreviatura.value = abreviatura;
        });
    </script>
@endsection
