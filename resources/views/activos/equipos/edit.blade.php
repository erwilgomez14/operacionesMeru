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
                    <form method="POST" action="{{ route('equipos.update', $equipo) }}" enctype="multipart/form-data">
                        @method('PATCH')
                        @csrf()
                        <h2 class="tittle"> Edicion de Equipo</h2>

                        @include('activos.equipos.formequipo')

                    </form>


                </div>
            </div>
        </div>

    </div>

@endsection

@section('scripts')
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const selectSubsistema = document.getElementById("id_subsistema");
            selectSubsistema.disabled = true;
            const selectTipoEq = document.getElementById("id_tipo_eq");
            selectTipoEq.disabled = true;
            const selectModelo = document.getElementById("modelo");
            selectModelo.disabled = true;
            const selectMarca = document.getElementById("marca");
            selectMarca.disabled = true;
        });
    </script>
@endsection
