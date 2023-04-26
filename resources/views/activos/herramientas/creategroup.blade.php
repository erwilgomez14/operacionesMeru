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
                    @include('include.sesionalert')
                    <form method="POST" id="myForm" action="{{route('herramientas.storeegroup')}}">
                        @csrf
                        <div class="row">
                            <div class="col-md-9">
                        <h2 class="tittle"> Creacion del grupo para las Herramientas</h2>

                            </div>
                            <div class="col-md-3">
                        <button type="button" class="btn btn-custom float-right" data-toggle="modal" data-target="#gruposModal">
                        Mostrar Grupos
                        </button>
                        <!-- Modal -->
                        <div class="modal fade" id="gruposModal" tabindex="-1" role="dialog" aria-labelledby="gruposModalLabel" aria-hidden="true">
                          <div class="modal-dialog" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="gruposModalLabel">Listado de Grupos</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body">
                                <ul>
                                @foreach($grupos as $grupo)
                                    <li>{{ $grupo->nombre_grupo }}</li>
                                @endforeach
                                </ul>
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                              </div>
                            </div>
                          </div>
                        </div>        
                            </div>


                        </div>

                        
                        <div class="form-group mt-3">
                            <label for="nombre_grupo">Nombre del grupo para las herramientas</label>
                            <input type="text" name="nombre_grupo" class="form-control" id="nombre_grupo" placeholder="nombre" value="{{old('nombre_grupo', $grupo->nombre_grupo ?? '')}}">
                        </div>
                        <div class="form-group pt-2">
                            <a href="{{route('herramientas.index')}}" class="btn btn-dark">Volver</a>
                            <!-- <input class="btn btn-primary" type="submit" value="Guardar"> -->
                            <button type="submit" class="btn btn-primary" id="guardarBtn">Guardar</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>

@endsection

@section('scripts')

@endsection
