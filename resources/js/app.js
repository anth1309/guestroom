import './bootstrap';

document.addEventListener('DOMContentLoaded', function() {
   const calendarEl = document.getElementById('calendar');
   const calendar = new FullCalendar.Calendar(calendarEl, {
       initialView: 'dayGridMonth',
       locale: 'fr',
       timeZone: 'pacific/Noumea',
       headerToolbar: {
           start: 'prev,next today',
           center: 'title',
           end: 'dayGridMonth,timeGridWeek'
       },
     
   });
   calendar.render();
});


