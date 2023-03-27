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
				<form method="POST" action="{{route('usuarios.store')}}">
					@csrf
                    <h2 class="tittle"> Creacion de usuario</h2>


                    <div class="form-group">
                        <label for="cedula">cedula:</label>
                        <input type="text" name="cedula" class="form-control" id="cedula" placeholder="cedula..." value="{{old('cedula', $usuario->cedula ?? '')}}">
                    </div>

                    <div class="form-group">
                        <label for="nombre">Nombre:</label>
                        <input type="text" name="nombre" class="form-control" id="nombre" placeholder="nombre..." value="{{old('nombre', $usuario->nombre ?? '')}}">
                    </div>
                    <div class="form-group">
                        <label for="usuario">Usuario</label>
                        <input type="text" name="usuario"class="form-control" id="usuario" placeholder="usuario..." value="{{old('usuario', $usuario->usuario ?? '')}}">
                    </div>
                    <div class="form-group">
                        <label for="cargo">Cargo</label>
                        <input type="text" name="cargo" class="form-control" id="cargo" placeholder="cargo..." value="{{old('cargo', $usuario->cargo ?? '')}}">
                    </div>
                    <div class="form-group" >
                        <label for="grupo">Rol</label>
                        <select id="rol"name="rol" class="rol custom-select">
                            <option selected>Seleciona el Rol</option>
                            @foreach($roles as $rol)
                            <option data-rolid="{{$rol->id}}" data-rolslug="{{$rol->slug}}" value="{{$rol->id}}">{{$rol->nombre}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div id="permisos-caja">
                        <label for="rol">Selecionar Permiso</label>
                        <div id="lista-permisos">
                        </div>

                    </div>
                    <div class="form-group pt-2">
                        <a href="{{route('usuarios.index')}}" class="btn btn-dark">Volver</a>
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
        $(document).ready(function (){
           var permiso_caja = $('#permisos-caja');
           var lista_permisos = $('#lista-permisos');

            permiso_caja.hide();

            $('#rol').on('change', function () {
                var rol = $(this).find(':selected');
                var rol_id = rol.data('rolid');
                var rol_slug = rol.data('rolslug');

                lista_permisos.empty();
                $.ajax({
                    url: "{{route('usuarios.create')}}",
                    method: "get",
                    dataType: "json",
                    data: {
                        rol_id: rol_id,
                        rol_slug: rol_slug
                    }
                }).done(function (data) {
                    console.log(data);

                    permiso_caja.show();
                   // lista_permisos.empty();

                    $.each(data, function (index, element) {
                        $(lista_permisos).append(
                            '<div class="custom-control custom-checkbox">'+
                                '<input class="custom-control-input" type="checkbox" name="permisos[]" id="'+ element.slug +'" value="'+ element.id +'">' +
                                '<label class="custom-control-label" for="'+ element.slug +'">'+element.nombre+ '</label>'+
                            '</div>'
                        );
                    });
                });
            });
        });
    </script>


@endsection
