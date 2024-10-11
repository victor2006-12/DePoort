@extends('layout')

@section('styles')
<link href='css/app.css' rel='stylesheet' />
<link href="css/style.css" rel="stylesheet" />
<style>
    .calendars-grid {
        display: grid;
        grid-template-columns: repeat(4, 1fr); 
        grid-template-rows: repeat(2, auto); 
        grid-gap: 20px; 
        width: 100%; 
        max-width: 1200px; 
    }
    	
    /* Calendar container */
    .calendar-container {
        width: 100%; 
        height: 400px; 
        border: 1px solid #e0e0e0;
        border-radius: 8px; 
        overflow: hidden; 
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2), 0 2px 5px rgba(0, 0, 0, 0.1); 
        display: flex; /* Flexbox voor uitlijning */
    }

    /* Uren container */
    .time-labels {
        display: flex;
        flex-direction: column;
        justify-content: space-between; /* Verdeelt de uren gelijkmatig */
        width: 80px; /* Breedte voor de tijdlabels */
        background-color: #f8f9fa; /* Achtergrondkleur voor tijdlabels */
        padding: 10px; /* Padding rond de tijdlabels */
        border-right: 1px solid #e0e0e0; /* Scheidingslijn */
    }

    /* Tijdstijlen */
    .time-label {
        font-size: 16px; /* Grootte van de tijdstijlen */
        font-family: Arial, sans-serif; /* Arial voor de tijdstijlen */
    }

    /* Style voor dag van de week */
    .day-label {
        text-align: center;
        font-weight: bold;
        margin-bottom: 10px;
        font-size: 18px;
        font-family: Arial, sans-serif; /* Arial toegevoegd */
    }

    footer {
        background-color: #343a40;
        color: white;
        padding: 20px 0;
        width: 100%;
    }

    .header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 20px 20px;
        background-color: #f8f9fa;
        border-bottom: 1px solid #e0e0e0;
        height: 120px;
    }

    .header img {
        height: 50px;
    }

    .client-info {
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    .client-info img {
        width: 60px;
        height: 60px;
        border-radius: 50%;
        margin-bottom: 5px;
    }

    .client-info span {
        font-size: 18px;
    }

    .navbar {
        display: flex;
        justify-content: space-between;
        align-items: center;
        background-color: #f8f9fa;
        padding: 0;
    }

    .navbar-nav {
        display: flex;
        flex-grow: 1;
        justify-content: space-around;
        margin: 0;
        padding: 0;
    }

    .nav-link {
        flex: 1;
        text-align: center;
    }

    .nav-link.active {
        font-weight: bold;
        color: #007bff;
    }

    .nav-link:hover {
        text-decoration: underline;
    }
</style>
@endsection

@section('content') 

<div class="container mt-4 content">
    <div class="calendars-grid">
        <!-- Bovenste rij met 4 kalenders en dagen van de week -->
        <div>
            <div class="day-label">MA</div>
            <div class="calendar-container">
                <div class="time-labels">
                    <div class="time-label">06:00</div>
                    <div class="time-label">12:00</div>
                    <div class="time-label">18:00</div>
                    <div class="time-label">00:00</div>
                </div>
                <div id="calendar1"></div>
            </div>
        </div>
        <div>
            <div class="day-label">DI</div>
            <div class="calendar-container">
                <div class="time-labels">
                    <div class="time-label">06:00</div>
                    <div class="time-label">12:00</div>
                    <div class="time-label">18:00</div>
                    <div class="time-label">00:00</div>
                </div>
                <div id="calendar2"></div>
            </div>
        </div>
        <div>
            <div class="day-label">WO</div>
            <div class="calendar-container">
                <div class="time-labels">
                    <div class="time-label">06:00</div>
                    <div class="time-label">12:00</div>
                    <div class="time-label">18:00</div>
                    <div class="time-label">00:00</div>
                </div>
                <div id="calendar3"></div>
            </div>
        </div>
        <div>
            <div class="day-label">DO</div>
            <div class="calendar-container">
                <div class="time-labels">
                    <div class="time-label">06:00</div>
                    <div class="time-label">12:00</div>
                    <div class="time-label">18:00</div>
                    <div class="time-label">00:00</div>
                </div>
                <div id="calendar4"></div>
            </div>
        </div>
        <!-- Onderste rij met 3 kalenders -->
        <div>
            <div class="day-label">VR</div>
            <div class="calendar-container">
                <div class="time-labels">
                    <div class="time-label">06:00</div>
                    <div class="time-label">12:00</div>
                    <div class="time-label">18:00</div>
                    <div class="time-label">00:00</div>
                </div>
                <div id="calendar5"></div>
            </div>
        </div>
        <div>
            <div class="day-label">ZA</div>
            <div class="calendar-container">
                <div class="time-labels">
                    <div class="time-label">06:00</div>
                    <div class="time-label">12:00</div>
                    <div class="time-label">18:00</div>
                    <div class="time-label">00:00</div>
                </div>
                <div id="calendar6"></div>
            </div>  
        </div>
        <div>
            <div class="day-label">ZO</div>
            <div class="calendar-container">
                <div class="time-labels">
                    <div class="time-label">06:00</div>
                    <div class="time-label">12:00</div>
                    <div class="time-label">18:00</div>
                    <div class="time-label">00:00</div>
                </div>
                <div id="calendar7"></div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('scripts')
<script src=<iframe src="https://calendar.google.com/calendar/embed?height=600&wkst=1&ctz=Europe%2FAmsterdam&bgcolor=%23ffffff&src=ZXJtaW4uYmVzaWM4QGdtYWlsLmNvbQ&src=bmwuZHV0Y2gjaG9saWRheUBncm91cC52LmNhbGVuZGFyLmdvb2dsZS5jb20&src=YWRkcmVzc2Jvb2sjY29udGFjdHNAZ3JvdXAudi5jYWxlbmRhci5nb29nbGUuY29t&color=%23039BE5&color=%230B8043&color=%2333B679" style="border:solid 1px #777" width="800" height="600" frameborder="0" scrolling="no"></iframe>></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var calendar1El = document.getElementById('calendar1');
        var calendar2El = document.getElementById('calendar2');
        var calendar3El = document.getElementById('calendar3');
        var calendar4El = document.getElementById('calendar4');
        var calendar5El = document.getElementById('calendar5');
        var calendar6El = document.getElementById('calendar6');
        var calendar7El = document.getElementById('calendar7');

        // Kalenderinstellingen
        var calendars = [
            calendar1El,
            calendar2El,
            calendar3El,
            calendar4El,
            calendar5El,
            calendar6El,
            calendar7El
        ];

        calendars.forEach((calEl) => {
            var calendar = new FullCalendar.Calendar(calEl, {
                initialView: 'timeGrid',
                allDaySlot: false, // Verberg de hele dag slot
                slotDuration: '01:00:00', // Uren per slot
                slotLabelInterval: '01:00', // Interval voor tijdlabels
                events: [
                    { title: 'Evenement 1', start: '2024-09-24T10:00:00', end: '2024-09-24T12:00:00' },
                    { title: 'Evenement 2', start: '2024-09-25T14:00:00', end: '2024-09-25T16:00:00' },
                    { title: 'Evenement 3', start: '2024-09-28T18:00:00', end: '2024-09-28T20:00:00' }
                ]
            });
            calendar.render();
        });
    });
</script>
@endsection
