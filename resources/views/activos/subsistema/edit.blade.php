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
                    <form method="POST" action="{{ route('subsistemas.update', $subsistema) }}">
                        @csrf
                        @method('PUT')
                        <h2 class="tittle"> Edicion del SubSistema Nº : {{ $subsistema->id_subsistema }}</h2>

                        @include('activos.subsistema.formsubsistema')
                    </form>

                </div>
            </div>
        </div>
    </div>

@endsection

@section('scripts')
    <script>
        // document.addEventListener("DOMContentLoaded", function() {
        //     const selectSistema = document.getElementById("id_sistema");
        //     selectSistema.disabled = true;
        // });
        document.addEventListener("DOMContentLoaded", function() {
            const selectEstatus = document.getElementById("id_estatus");
            selectEstatus.disabled = true;
        });
    </script>
@endsection
