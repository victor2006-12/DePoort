import { Calendar } from '@fullcalendar/core';
import dayGridPlugin from '@fullcalendar/daygrid';
import timeGridPlugin from '@fullcalendar/timegrid';
import interactionPlugin from '@fullcalendar/interaction';

document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendar');

    var calendar = new Calendar(calendarEl, {
        plugins: [dayGridPlugin, timeGridPlugin, interactionPlugin],
        initialView: 'timeGridWeek', // Start met weekweergave
        editable: true,
        events: [
            {
                title: 'Evenement 1',
                start: '2024-09-10T10:00:00',
                end: '2024-09-10T12:00:00'
            },
            {
                title: 'Evenement 2',
                start: '2024-09-11T14:00:00',
                end: '2024-09-11T16:00:00'
            }
        ]
    });

    calendar.render();
});
