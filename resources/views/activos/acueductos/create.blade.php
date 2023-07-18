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
            min-height: calc(100vh - 140px) !important;
        }
    </style>
@endsection

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
                    <form method="POST" action="{{ route('acueductos.store') }}">
                        @csrf
                        <h2 class="tittle"> Creacion de acueducto</h2>

                        @include('activos.acueductos.formacueducto')
                    </form>


                </div>
            </div>
        </div>

    </div>

@endsection


@section('scripts')
@endsection
