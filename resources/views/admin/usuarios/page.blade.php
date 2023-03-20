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

          <h6>Bienvenido al panel de Usuarios de Meru Operaciones</h6>


          <table class="table mt-3">
  <thead class="thead-dark">
    <tr>
      <th scope="col">Cedula</th>
      <th scope="col">Usuario</th>
      <th scope="col">Nombre</th>
      <th scope="col">Roles</th>
      <th scope="col">Permisos</th>
      <th scope="col">Acciones</th>

    </tr>
  </thead>
  <tbody>
    @foreach ($usuarios as $usuario)
    <tr>
      <td>{{$usuario['cedula']}}</td>
      <td>{{$usuario['usuario']}}</td>
      <td>{{$usuario['nombre']}}</td>
      <td>Roles</td>
      <td>Permisos</td>
      <td>
        <a href="{{ route('usuarios.show', $usuario) }}"><i class="far fa-eye"></i><span class="icon-name"></span></a>

        <a href=""><svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path></svg><span class="icon-name"></span> </a>

        <a href="" class="text-danger"><svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x-octagon"><polygon points="7.86 2 16.14 2 22 7.86 22 16.14 16.14 22 7.86 22 2 16.14 2 7.86 7.86 2"></polygon><line x1="15" y1="9" x2="9" y2="15"></line><line x1="9" y1="9" x2="15" y2="15"></line></svg><span class="icon-name"></span></a>
      </td>

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
