@extends('panel.layouts.page')

@section('content')

    <div class="row layout-top-spacing">

        <div class="col-xl-12 col-lg-12 col-md-12 col-12 layout-spacing">
            <div class="widget-content-area br-4">
                <div class="widget-one">

                    @if(session('status'))
                        {{-- <div class="alert alert-success" role="alert">
                            <strong>{{session('status')}}</strong>
                        </div> --}}
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
                                <h4>Bienvenido al listado de Sistemas de Meru Operaciones</h4>
                            </div>
                            <div class="col-md-6">
                                <a href="{{route('sistemas.create')}}" class="btn btn-primary btn-lg float-md-right" role="button" aria-pressed="true">Crear Sistema</a>
                            </div>


                        </div>
                        <table class="table mt-3">
                            <thead class="thead-dark">
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Nombre</th>
                                <th scope="col">Acciones</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($sistemas as $sistema)
                                <tr>
                                    <td>{{$sistema->id_sistema}}</td>
                                    <td>{{$sistema->nom_sistema}}</td>
                                    <td>
                                        <a href="{{route('sistemas.show', $sistema)}}"><i class="far fa-eye"></i><span class="icon-name"></span></a>
                                        <a href="{{route('sistemas.edit', $sistema)}}"><svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path></svg><span class="icon-name"></span> </a>
                                    </td>

                                </tr>
                            @endforeach
                            </tbody>
                        </table>

                </div>
            </div>
        </div>

    </div>

@endsection
