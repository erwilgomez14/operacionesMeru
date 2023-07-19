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
                    <form method="POST" action="{{ route('sistemas.store') }}">
                        @csrf
                        <h2 class="tittle mb-3"> Creacion de Sistema</h2>

                        @include('activos.sistemas.formsistema')
                    </form>


                </div>
            </div>
        </div>

    </div>

@endsection


@section('scripts')
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const selectAcueducto = document.getElementById("id_acueducto");
            const inputSistema = document.getElementById("id_sistema");

            selectAcueducto.addEventListener("change", function() {
                const selectedValue = selectAcueducto.value;
                if (selectedValue && selectedValue !== "disabled") {
                    const modifiedValue = selectedValue + "-S01";

                    // Realizar la petición fetch
                    fetch(
                            `/activos/consultar-sistema?id_acueducto=${selectedValue}&id_sistema=${modifiedValue}`
                            )
                        .then(response => response.json())
                        .then(data => {
                            if (data.exists) {
                                inputSistema.value = data.newIdSistema;
                            } else {
                                inputSistema.value = modifiedValue;
                            }
                        })
                        .catch(error => {
                            console.error("Error al hacer la petición fetch:", error);
                        });
                } else {
                    inputSistema.value = "";
                }
            });
        });
    </script>
@endsection
