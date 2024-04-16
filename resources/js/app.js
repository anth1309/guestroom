import './bootstrap';
import './reservation.js';
import './price.js';


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
        daysOfWeek: [ 2, 3, 4, 5, 6, 7 ], 
        startTime: '00:00', 
        endTime: '24:00', 
    },

    events: '/get-reservations', 
    editable: true, 
    eventDrop: function(info) {
      
        console.log('Event dropped', info);
    }
   });
   calendar.render();

   
});


