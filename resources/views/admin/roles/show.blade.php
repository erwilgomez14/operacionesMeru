@extends('panel.layouts.page')

@section('content')
    <div class="row layout-top-spacing">
        <div class="col-xl-12 col-lg-12 col-md-12 col-12 layout-spacing">
            <div class="widget-content-area br-4">
                <div class="widget-one">

                    <div class="card">
                        <div class="card-header">
                            <h2 class="">Rol: {{$rol->id}}</h2>
                            <h3>Nombre: {{$rol->nombre}}</h3>
                            <h4>Slug: {{$rol->slug}}</h4>
                        </div>
                        <div class="card-body">
                            <h4>Permisos</h4>
                            <p>...</p>
                        </div>
                        <div class="card-footer">

                            <a href="{{route('rol.index')}}" class="btn btn-primary">Volver al listado</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
