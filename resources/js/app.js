import './bootstrap';

import Alpine from 'alpinejs';

import googleCalendarPlugin from '@fullcalendar/google-calendar';

Alpine.plugin(googleCalendarPlugin);

window.Alpine = Alpine;

Alpine.start();
