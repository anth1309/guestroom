document.addEventListener('DOMContentLoaded', function() {
   calculatePrice();
   document.getElementById('start_date').addEventListener('change', calculatePrice);
   document.getElementById('end_date').addEventListener('change', calculatePrice);
   document.getElementById('adults').addEventListener('change', calculatePrice);
   document.getElementById('children').addEventListener('change', calculatePrice);
   document.getElementById('bed').addEventListener('change', calculatePrice);
});

function calculatePrice() {
   var price = 0;

   var weekdayBasePrice = parseInt(document.getElementById('weekday_base_price').value);
   var weekendBasePrice = parseInt(document.getElementById('weekend_base_price').value);
   var maxGuests = parseInt(document.getElementById('max_guests').value);

   var startDate = new Date(document.getElementById('start_date').value);
   var endDate = new Date(document.getElementById('end_date').value);
   var totalDays = Math.ceil((endDate - startDate) / (1000 * 60 * 60 * 24));
   var totalGuests = parseInt(document.getElementById('adults').value) + parseInt(document.getElementById('children').value);

   for (var i = 0; i < totalDays; i++) {
       var currentDate = new Date(startDate.getTime() + (i * 24 * 60 * 60 * 1000));
       var currentDayOfWeek = currentDate.getDay();

       var basePrice = (currentDayOfWeek >= 1 && currentDayOfWeek <= 4) ? weekdayBasePrice : weekendBasePrice;

       var additionalPrice = (totalGuests == 3) ? ((currentDayOfWeek >= 1 && currentDayOfWeek <= 4) ? 1500 : 2000) : 0;
       
       if (document.getElementById('bed').value == 2) {
           additionalPrice += 1000; 
       }

       price += basePrice + additionalPrice;
   }

   document.getElementById('price').value = price + " XPF";
}
