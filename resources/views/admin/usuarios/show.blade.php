@extends('panel.layouts.page')

@section('content')
<div class="row layout-top-spacing">

	<div class="col-xl-12 col-lg-12 col-md-12 col-12 layout-spacing">
		<div class="widget-content-area br-4">
			<div class="widget-one">

				<div class="card">
					<div class="card-header">
						<h2 class="">Usuario: {{$usuario->usuario}}</h2>
						<h3>Nombre: {{$usuario->nombre}}</h3>
						<h4>Cédula: {{$usuario->cedula}}</h4>
						<h4>Cargo: {{$usuario->cargo}}</h4>
					</div>
					<div class="card-body">
						<h4>Permisos</h4>
						<p>...</p>
						<h4>Roles</h4>
						<p>...</p>

					</div>
					<div class="card-footer">
						
						<a href="{{url()->previous()}}" class="btn btn-primary">Volver al listado</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection