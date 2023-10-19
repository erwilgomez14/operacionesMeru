@extends('panel.layouts.page')

@section('styles')
    <link rel="stylesheet" type="text/css" href="{{ asset('template/plugins/table/datatable/datatables.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('template/plugins/table/datatable/dt-global_style.css') }}">
    <style>
        /*
                                                                    The below code is for DEMO purpose --- Use it if you are using this demo otherwise Remove it
                                                                */
        /*.navbar .navbar-item.navbar-dropdown {
                                                                    margin-left: auto;
                                                                }*/
        .layout-px-spacing {
            min-height: calc(100vh - 140px) !important;
        }
    </style>
@endsection

@section('content')
    <div class="row layout-top-spacing">
        <div class="col-xl-12 col-lg-12 col-md-12 col-12 layout-spacing">
            <div class="widget-content-area br-4">
                <div class="widget-one">

                    @include('include.sesionalert')
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <h3>Listado de Modelos de Equipos</h3>
                        </div>
                        <div class="col-md-6">
                            <a href="{{ route('modelo.create') }}" class="btn btn-primary btn-lg float-md-right"
                                role="button" aria-pressed="true">Registrar Modelos</a>
                        </div>


                    </div>
                    
                    <table id="zero-config" class="table table-hover" style="width:100%">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Nombre de Modelo</th>
                                <th scope="col">Descripcion</th>
                                <th scope="col">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($modelos as $modelo)
                                <tr>
                                    <td>{{ $modelo['id_modelo'] }}</td>
                                    <td>{{ $modelo['nombre_modelo'] }}</td>
                                    <td>{{ $modelo['descripcion_modelo'] }}</td>
                                
                                    <td class="">
                                
                                        <a class="rounded bs-tooltip" title="Ver" href="{{ route('modelo.show', $modelo) }}"><i class="far fa-eye"></i><span
                                                class="icon-name"></span></a>

                                        <a class="rounded bs-tooltip" title="Editar" href="{{ route('modelo.edit', $modelo) }}"><svg
                                                xmlns="http://www.w3.org/2000/svg" width="15" height="15"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                                stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit">
                                                <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7">
                                                </path>
                                                <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path>
                                            </svg><span class="icon-name"></span> </a>

                                        {{-- <a href="" class="text-danger" data-toggle="modal"
                                            data-target="#exampleModal" data-userid=""><svg
                                                xmlns="http://www.w3.org/2000/svg" width="15" height="15"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                                stroke-linecap="round" stroke-linejoin="round"
                                                class="feather feather-x-octagon">
                                                <polygon
                                                    points="7.86 2 16.14 2 22 7.86 22 16.14 16.14 22 7.86 22 2 16.14 2 7.86 7.86 2">
                                                </polygon>
                                                <line x1="15" y1="9" x2="9" y2="15">
                                                </line>
                                                <line x1="9" y1="9" x2="15" y2="15">
                                                </line>
                                            </svg><span class="icon-name"></span></a> --}}



                                        <!-- Modal -->
                                        <div class="modal fade" id="exampleModal" tabindex="-1"
                                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Esta apunto de
                                                            eliminar el registro</h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        ¿Esta seguro que desea eliminar el registro?
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal">Cancelar</button>
                                                        <form method="POST" action="">
                                                            @method('DELETE')
                                                            @csrf()
                                                            <a class="btn btn-primary"
                                                                onclick="$(this).closest('form').submit();">Borrar
                                                                Registro</a>
                                                        </form>


                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Nombre de Marca</th>
                                <th scope="col">Descripcion</th>
                                <th scope="col">Acciones</th>
                            </tr>
                        </tfoot>
                    </table>
                    


                </div>
            </div>
        </div>

    </div>
@endsection


@section('scripts')
    <script type="text/javascript">
        $('#exampleModal').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget) // Button that triggered the modal
            var usuario_id = button.data('userid') // Extract info from data-* attributes
            var modal = $(this)
            modal.find('form').attr('action', '/usuarios/' + usuario_id);
        })
    </script>
    <script src="{{ asset('template/plugins/table/datatable/datatables.js') }}"></script>
    <script>
        $('#zero-config').DataTable({
            "oLanguage": {
                "oPaginate": {
                    "sPrevious": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>',
                    "sNext": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>'
                },
                "sInfo": "Mostrando página _PAGE_ de _PAGES_",
                "sSearch": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>',
                "sSearchPlaceholder": "Buscar:",
                "sLengthMenu": "Resultados :  _MENU_",
            },
            "stripeClasses": [],
            "lengthMenu": [7, 10, 20, 50],
            "pageLength": 7
        });
    </script>
@endsection