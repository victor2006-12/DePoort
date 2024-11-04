import './bootstrap';

import Alpine from 'alpinejs';

import googleCalendarPlugin from '@fullcalendar/google-calendar';

server.hmr.overlay = false;

Alpine.plugin(googleCalendarPlugin);

window.Alpine = Alpine;

Alpine.start();
