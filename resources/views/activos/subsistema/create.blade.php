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
                    <form method="POST" action="{{ route('subsistemas.store') }}">
                        @csrf
                        <h2 class="tittle">Creacion de SubSistema</h2>

                        @include('activos.subsistema.formsubsistema')
                    </form>

                </div>
            </div>
        </div>
    </div>

@endsection

@section('scripts')
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const selectSistema = document.getElementById("id_sistema");
        const inputSubsistema = document.getElementById("id_subsistema");

        selectSistema.addEventListener("change", function() {
            const selectedValue = selectSistema.value;
            if (selectedValue && selectedValue !== "disabled") {
                const modifiedValue = selectedValue + "-SB01";
                //console.log(modifiedValue);
                // Realizar la petición fetch
                fetch(
                        `/activos/consultar-subsistema?id_sistema=${selectedValue}&id_subsistema=${modifiedValue}`
                        )
                    .then(response => response.json())
                    .then(data => {
                        if (data.exists) {
                            inputSubsistema.value = data.newIdSubistema;
                        } else {
                            inputSubsistema.value = modifiedValue;
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
