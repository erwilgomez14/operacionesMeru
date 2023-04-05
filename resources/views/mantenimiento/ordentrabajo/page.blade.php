@extends('panel.layouts.page')

@section('styles')
    <style>
        /*
            The below code is for DEMO purpose --- Use it if you are using this demo otherwise Remove it
        */
        /*.navbar .navbar-item.navbar-dropdown {
            margin-left: auto;
        }*/
        .layout-px-spacing {
            min-height: calc(100vh - 140px)!important;
        }

    </style>
@endsection

@section('content')

    <div class="row layout-top-spacing">
        <div class="col-xl-12 col-lg-12 col-md-12 col-12 layout-spacing">
            <div class="widget-content-area br-4">
                <div class="widget-one">

                    @if(session('status'))

                        <div class="alert alert-primary alert-dismissible fade show" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <strong>{{session('status')}}</strong>
                        </div>

                        <script>
                            $(".alert").alert();
                        </script>
                    @endif



                    <div class="row">
                        <div class="col-md-6">
                            <h4>Bienvenido al listado de Ordenes de trabajo de Meru Mantenimiento</h4>
                        </div>
                        <div class="col-md-6">
                            <a href="{{route('ordentrabajo.create')}}" class="btn btn-primary btn-lg float-md-right" role="button" aria-pressed="true">Crear orden de trabajo</a>
                        </div>


                    </div>

                </div>
            </div>
        </div>

    </div>

@endsection
