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
       firstDay: 1,
       businessHours: { 
        daysOfWeek: [ 2, 3, 4, 5, 6 ], 
        startTime: '00:00', 
        endTime: '24:00', 
    },
     
   });
   calendar.render();

   
});


