@extends('layouts.calendario')

@section('contenido')
    <a class="btn" href="{{url()->previous()}}">Atrás</a>
    <div id="calendario"></div>
    @push('scripts')
        <script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.3/main.min.js"></script>
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                var calendarEl = document.getElementById('calendario');
                var calendar = new FullCalendar.Calendar(calendarEl, {
                    slotMinTime: '0:00:00',
                    slotMaxTime: '23:59:00',
                    events: @json($eventos),
                });
                calendar.render();
            });
        </script>
    @endpush
@endsection

@section('titulo')
    Calendario
@endsection

@section('h1')
    Calendario
@endsection
