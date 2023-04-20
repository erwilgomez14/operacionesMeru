@extends('panel.layouts.page')

@section('styles')
   {{-- <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.5/index.global.min.js'></script>--}}
    <script src="{{ asset('template/plugins/fullcalendar-6.1.5/dist/index.global.js') }}"></script>
   <style>
       .fc-daygrid-event {
           margin-top: 10px;
           padding: 4px;
           border-radius: 4px;
           font-size: 14px;
           font-weight: 500;
           color: #fff;
       }
       .fc-event-blue {
           background-color: #176cf9;
       }
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
    <script>

        document.addEventListener('DOMContentLoaded', function() {

            const calendarEl = document.getElementById('calendar');
            const calendar = new FullCalendar.Calendar(calendarEl, {
                headerToolbar: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'dayGridMonth,timeGridWeek,timeGridDay,listMonth'
                },
                events: @json($eventos),
                eventColor: '#176cf9',
            });
            calendar.render();
        });
    </script>

@endsection
