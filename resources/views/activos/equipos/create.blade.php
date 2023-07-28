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

                    <form method="POST" action="{{ route('equipos.store') }}">
                        @csrf
                        <h2 class="tittle"> Creacion de Equipo</h2>

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
            const selectAcueducto = document.getElementById("id_subsistema");
            const inputSistema = document.getElementById("id_equipo");

            selectAcueducto.addEventListener("change", function() {
                const selectedValue = selectAcueducto.value;
                if (selectedValue && selectedValue !== "disabled") {
                    const modifiedValue = selectedValue + "-E01";

                    // Realizar la petición fetch
                    fetch(
                            `/activos/consultar-equipo?id_subsistema=${selectedValue}&id_equipo=${modifiedValue}`
                        )
                        .then(response => response.json())
                        .then(data => {
                            if (data.exists) {
                                inputSistema.value = data.newIdEquipo;
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
    {{-- <script>
        var acueducto_select = document.getElementById("id_subsistema");
        var id_sistema_input = document.getElementById("id_equipo");

        acueducto_select.addEventListener("change", function() {
            var selected_option = acueducto_select.options[acueducto_select.selectedIndex].value;
            id_sistema_input.value = selected_option+'-';
        });
    </script> --}}
@endsection
