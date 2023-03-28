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
                            <h4>Bienvenido al listado de Acueductos de Meru Operaciones</h4>
                        </div>
                        <div class="col-md-6">
                            <a href="{{route('acueductos.create')}}" class="btn btn-primary btn-lg float-md-right" role="button" aria-pressed="true">Crear Acueducto</a>
                        </div>


                    </div>

                    <table class="table mt-3">
                        <thead class="thead-dark">
                        <tr>
                            <th scope="col">Nombre</th>
                            <th scope="col">Descripcion</th>
                            <th scope="col">Fuente de Abasteciento</th>
                            <th scope="col">Capacidad de almacenamiento</th>
                            <th scope="col">Tiempo de operacion</th>
                            <th scope="col">Energia Util</th>
                            <th scope="col">Modelo de Planta</th>
                         </tr>
                        </thead>
                        <tbody>
                        @foreach ($acueductos as $acueducto)
                            <tr>
                                <td>{{$acueducto['nom_acu']}}</td>
                                <td>{{$acueducto['desc_acu']}}</td>
                                <td>{{$acueducto['fuente_abast']}}</td>
                                <td>{{$acueducto['capacidad_almac']}}</td>
                                <td>{{$acueducto['tiempo_oper']}}</td>
                                <td>{{$acueducto['energia_util']}}</td>
                                <td>{{$acueducto['modelo_planta']}}</td>
                            </tr>
                            @endforeach
                            </tr>
                        </tbody>
                    </table>



                </div>
            </div>
        </div>

    </div>

@endsection


@section('scripts')
    <script type="text/javascript">
        $('#exampleModal').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget) // Button that triggered the modal
            var usuario_id = button.data('userid') // Extract info from data-* attributes
            var modal = $(this)
            modal.find('form').attr('action','/usuarios/'+ usuario_id);
        })
    </script>
@endsection

