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
                    <form method="POST" action="{{route('herramientas.store')}}">
                        @csrf
                        <h2 class="tittle"> Creacion de Herramienta</h2>

                        
                        <div class="form-group">
                            <label for="nombre_herramienta">Nombre de la herramienta</label>
                            <input type="text" name="nombre_herramienta" class="form-control" id="nombre_herramienta" placeholder="nombre" value="{{old('nombre_herramienta', $herramienta->nombre_herramienta ?? '')}}">
                        </div>
                         <div class="form-group">
                            <label for="id_grupo_herramienta">Grupo</label>
                            <select class="custom-select" name="id_grupo_herramienta" aria-label="">
                                <option selected disabled>Selecionar grupo</option>
                                @foreach($grupos as $grupo)
                                    <option value="{{$grupo->id_grupo_herramienta}}">{{$grupo->nombre_grupo}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group pt-2">
                            <a href="{{route('herramientas.index')}}" class="btn btn-dark">Volver</a>
                            <input class="btn btn-primary" type="submit" value="Guardar">
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>

@endsection

@section('scripts')

@endsection
