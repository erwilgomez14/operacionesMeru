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

                <h6>Bienvenido a Meru Operaciones</h6>

                {{-- <p class="">With CORK starter kit, you can begin your work without any hassle. The starter page is highly optimized which gives you freedom to start with minimal code and add only the desired components and plugins required for your project.</p> --}}

            </div>
        </div>
    </div>

</div>

@endsection
