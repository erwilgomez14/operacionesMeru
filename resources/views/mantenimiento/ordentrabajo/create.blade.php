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
                    <form method="POST" action="{{route('acueductos.store')}}">
                        @csrf
                        <h2 class="tittle"> Creacion de Orden de trabajo</h2>


                        <div class="form-group">
                            <label for="id_acueducto">Acueducto</label>
                            <select id="id_acueducto" class="custom-select" name="id_acueducto" aria-label="">
                                <option selected>Selecionar Acueducto</option>
                                @foreach($acueductos as $acueducto)
                                    <option value="{{$acueducto->id_acueducto}}">{{$acueducto->nom_acu}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Sistema</label>
                            <select id="id_sistema" class="custom-select" name="id_sistema" aria-label="">
                                <option selected>Selecionar Sistema</option>
                            </select>
                        </div>

                        <div class="form-group pt-2">
                            <a href="{{route('acueductos.index')}}" class="btn btn-dark">Volver</a>
                            <input class="btn btn-primary" type="submit" value="Guardar">
                        </div>
                    </form>


                </div>
            </div>
        </div>

    </div>

@endsection


@section('scripts')

    <script>
        const acueducto = document.getElementById('id_acueducto')
        const sistema = document.getElementById('id_sistema')

        const 

        acueducto.addEventListener('change', async (e)=>{
           // console.log(e.target.value)
            const response = await fetch(`/mantenimiento/ordentrabajo/${e.target.value}/acueducto`)

            const data = await response.json();

            console.log(data)

            let opciones = ``;

            data.forEach(element => {
                opciones = opciones + `<option value="${element.id_sistema}">${element.nom_sistema}`
            })

            sistema.innerHTML = opciones;
        })

    </script>

@endsection

