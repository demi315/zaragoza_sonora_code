@extends('layouts.calendario')

@section('contenido')
    <style>
        table{
            width: 100vw;
        }
    </style>
    <a class="btn" href="{{url()->previous()}}">Atrás</a>
    <div id="calendario" class="h-auto w-auto">
        @push('scripts')
            <script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.3/main.min.js"></script>
            <link href='https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css' rel='stylesheet'>
            <script>
                document.addEventListener('DOMContentLoaded', function () {
                    var calendarEl = document.getElementById('calendario');
                    var calendar = new FullCalendar.Calendar(calendarEl, {
                        timeZone: 'UTC',
                        themeSystem: 'bootstrap5',
                        headerToolbar: {
                            left: 'prev,next today',
                            center: 'title',
                            right: 'dayGridMonth,timeGridWeek,timeGridDay,listMonth'
                        },
                        weekNumbers: true,
                        dayMaxEvents: true, // allow "more" link when too many events
                        events: @json($eventos),
                    });
                    calendar.render();
                    calendar.updateSize();
                });
            </script>
        @endpush
    </div>
@endsection

@section('titulo')
    Calendario
@endsection

@section('h1')
    Calendario
@endsection
