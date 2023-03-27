@extends('panel.layouts.page')
@section('styles')
    <link href="{{asset("/template/plugins/bootstrap-tagsinput/dist/bootstrap-tagsinput.css")}}" rel="stylesheet" type="text/css" />

@endsection
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
                    <form method="POST" action="{{route('rol.update', $rol)}}" enctype="multipart/form-data">
                        @method('PATCH')
                        @csrf()
                        <h2 class="tittle"> Rol Nº: {{$rol->id}}</h2>
                        <div class="form-group">
                            <label for="nombre_rol">Nombre:</label>
                            <input type="text" name="nombre_rol" class="form-control" id="nombre_rol" placeholder="nombre..." value="{{old('nombre_rol', $rol->nombre ?? '')}}" required>
                        </div>
                        <div class="form-group">
                            <label for="rol_slug">Slug</label>
                            <input type="text" name="rol_slug"class="form-control" id="rol_slug" tag="rol_slug" placeholder="slug..." value="{{old('slug', $rol->slug ?? '')}}" required>
                        </div>
                        <div class="form-group">
                            <label for="rol_permiso">Añadir permisos</label>
                            <input type="text" data-role="tagsinput" name="rol_permiso" class="form-control" id="rol_permiso"
                                   value="
                                   @foreach($rol->permisos as $permiso)
                                        {{$permiso->nombre. ','}}
                                   @endforeach" >
                        </div>

                        <div class="form-group pt-2">
                            <a href="{{route('rol.index')}}" class="btn btn-dark">Volver</a>
                            <input class="btn btn-primary" type="submit" value="Guardar">
                        </div>

                    </form>

                </div>
            </div>
        </div>
@endsection
@section('scripts')
            <script src="{{asset("template/plugins/bootstrap-tagsinput/dist/bootstrap-tagsinput.js")}}"></script>
            <script>
                $(document).ready(function (){
                    $('#nombre_rol').keyup(function (e){
                        var str = $('#nombre_rol').val();
                        str = str.replace(/\W+(?!$)/g, '-').toLowerCase();
                        $('#rol_slug').val(str);
                        $('#rol_slug').attr('placeholder', str);
                    });
                });
            </script>
@endsection
