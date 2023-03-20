<!DOCTYPE html>
<html lang="en">
@include('panel.layouts.head')
<body class="sidebar-noneoverflow">

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
