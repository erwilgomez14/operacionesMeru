<!DOCTYPE html>
<html lang="en">
@include('panel.layouts.head')
@php
    $usuario = Auth::user();
@endphp
<body class="sidebar-noneoverflow" style="background-color: {{ $usuario->cedula == '18900129' ? 'rgba(255, 192, 203, 0.5)' : 'transparent' }};" >

    <!--  BEGIN NAVBAR  -->
    @include('panel.layouts.navbar')
    <!--  END NAVBAR  -->

    <!--  BEGIN MAIN CONTAINER  -->
    <div class="main-container" id="container">

        <div class="overlay"></div>
        <div class="search-overlay"></div>

        <!--  BEGIN SIDEBAR  -->
        @include('panel.layouts.sidebar')
        <!--  END SIDEBAR  -->

        <!--  BEGIN CONTENT AREA  -->
        <div id="content" class="main-content">
            <div class="layout-px-spacing">


                <!-- CONTENT AREA -->
                
                @yield('content')

                <!-- CONTENT AREA -->

            </div>
            @include('panel.layouts.footer')
        </div>
        <!--  END CONTENT AREA  -->

    </div>
    <!-- END MAIN CONTAINER -->

    <!-- BEGIN GLOBAL MANDATORY SCRIPTS -->
    @include('panel.layouts.script')
</body>
</html>
