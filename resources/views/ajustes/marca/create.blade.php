@extends('panel.layouts.page')

@section('content')
    <div class="row layout-top-spacing">

        <div class="col-xl-12 col-lg-12 col-md-12 col-12 layout-spacing">
            <div class="widget-content-area br-4">
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
                    <form method="POST" action="{{ route('marca.store') }}">
                        @csrf
                        <h2 class="tittle"> Creacion de Marca para Equipo</h2>


                        <div class="form-group">
                            <label for="nombre">Nombre:</label>
                            <input type="text" name="nombre" class="form-control" id="nombre" placeholder="nombre..."
                                value="{{ old('nombre', $marca->nombre ?? '') }}">
                        </div>

                        <div class="form-group">
                            <label for="descripcion">Descripcion:</label>
                            <textarea class="form-control" aria-label="With textarea" name="descripcion" placeholder="Descripcion...">{{ old('descripcion', $marca->descripcion_marca ?? '') }}</textarea>

                        </div>

                        <div class="form-group pt-2">
                            <a href="{{ route('marca.index') }}" class="btn btn-dark">Volver</a>
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
