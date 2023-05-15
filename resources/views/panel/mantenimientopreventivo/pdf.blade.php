<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8' />
    <meta name='viewport' content='width=device-width, initial-scale=1' />
    <title>Calendario</title>
    <link href='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.css' rel='stylesheet' />
    <link href='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.print.min.css' rel='stylesheet' media='print' />
    <script src='https://code.jquery.com/jquery-3.5.1.min.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.27.0/moment.min.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.js'></script>
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

</head>
<body>
<div id='calendar'></div>

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
</body>
</html>


