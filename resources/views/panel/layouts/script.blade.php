<script src="{{asset("template/assets/js/libs/jquery-3.1.1.min.js")}}"></script>
<script src="{{asset("template/plugins/jquery-ui/jquery-ui.min.js")}}"></script>
<script src="{{asset("template/bootstrap/js/popper.min.js")}}"></script>
<script src="{{asset("template/bootstrap/js/bootstrap.min.js")}}"></script>
<script src="{{asset("template/plugins/perfect-scrollbar/perfect-scrollbar.min.js")}}"></script>
<script src="{{asset("template/assets/js/app.js")}}"></script>

    <script>
        $(document).ready(function() {
            App.init();
        });
    </script>
    <script src="{{asset("template/assets/js/custom.js")}}"></script>
    <!-- END GLOBAL MANDATORY SCRIPTS -->

    <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->
    @yield('scripts')
    <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->


    <!-- END GLOBAL MANDATORY SCRIPTS -->

    <!-- BEGIN PAGE LEVEL SCRIPTS -->
    {{--<script src="{{asset("template/plugins/fullcalendar/moment.min.js")}}"></script>
    <script src="{{asset("template/plugins/flatpickr/flatpickr.js")}}"></script>
    <script src="{{asset("template/plugins/fullcalendar/fullcalendar.min.js")}}"></script>--}}
    <!-- END PAGE LEVEL SCRIPTS -->

    <!--  BEGIN CUSTOM SCRIPTS FILE  -->
{{--    <script src="{{asset("template/plugins/fullcalendar/custom-fullcalendar.advance.js")}}"></script>--}}
    <!--  END CUSTOM SCRIPTS FILE  -->
