@extends('panel.layouts.page')

@section('styles')
   {{-- <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.5/index.global.min.js'></script>--}}
    <script src="{{ asset('template/plugins/fullcalendar-6.1.5/dist/index.global.js') }}"></script>

    <script>

        document.addEventListener('DOMContentLoaded', function() {

            const calendarEl = document.getElementById('calendar');
            const calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth',
                events: @json($eventos),
                eventColor: '#176cf9',
            });
            calendar.render();
        });
    </script>
   <style>



       .fc-scroller-harness{
           height: 25.6px;
       }



   </style>
@endsection
@section('content')
    <div class="row layout-top-spacing">

        <div class="col-xl-12 col-lg-12 col-md-12 col-12 layout-spacing">
            <div class="widget-content-area br-4">
                <div class="widget-one">

                <div id='calendar'></div>


                </div>
            </div>

        </div>

    </div>
@endsection

@section('scripts')


@endsection
