@extends('layout')

@section('styles')
<link href='css/app.css' rel='stylesheet' />
<link href="css/home.css" rel="stylesheet" />
@endsection

@section('navbar')
<div class="navbar">
    <!-- Voeg hier de inhoud van je navigatiebalk toe -->
    <div class="navbar-nav">
        <a href="#" class="nav-link active">Home</a>
        <a href="#" class="nav-link">Kalender</a>
        <a href="#" class="nav-link">Contact</a>
    </div>
</div>
@endsection



@section('content')
<div class="container mt-4 content">
    <!-- Eén grote kalender -->
    <div class="calendar-container">
        <div id="main-calendar" style="height: 600px;"></div>
    </div>
</div>
@endsection

@section('scripts')
<script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.15/index.global.min.js'></script>
<script src='files/index.global.js'></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        var events = @json($events); // Haal de evenementen op van de controller

        // Maak een enkele kalender
        var calendarEl = document.getElementById('main-calendar');
        var calendar = new FullCalendar.Calendar(calendarEl, {
            plugins: [FullCalendar.GoogleCalendar.default],
            googleCalendarApiKey: 'AIzaSyDbRbI8q91m56Hg9jycf00a3zDKbqQGne4',
            events: {
                googleCalendarId: 'cd099f93a95fe6e661355943e2f1f1637b8cd9567e23927a004421207f3a4d27@group.calendar.google.com'
            },
            className: 'gcal-event', // an option!
            initialView: 'timeGridWeek',
            allDaySlot: false,
            slotDuration: '01:00:00',
            slotLabelInterval: '01:00',
            locale: 'nl', // Gebruik Nederlandse vertaling
            eventClick: function (info) {
                alert('Afspraak: ' + info.event.title + '\nStart: ' + info.event.start + '\nEindigt: ' + info.event.end);
            }
        });

        calendar.render();
    });
</script>
@endsection