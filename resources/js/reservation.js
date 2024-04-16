document.addEventListener('DOMContentLoaded', function() {
    const startDatePicker = document.getElementById('start_date');
    const endDatePicker = document.getElementById('end_date');
    const roomId = document.getElementById('room_id').value;
    const reservations = JSON.parse(document.getElementById('reservation-date').value);


    // Fonction pour vérifier si une date est un lundi
    function isMonday(date) {
        return date.getDay() === 1; 
    }
 
    // Fonction pour désactiver la sélection des lundis
    function disableMondays(datePicker) {
        datePicker.addEventListener('input', function() {
            const selectedDate = new Date(datePicker.value);
            if (isMonday(selectedDate)) {
                datePicker.value = '';
                alert("Le gite du Grand Col est fermé les lundis.");
            }
        });
    }
 
    // Fonction pour vérifier la disponibilité des dates
 
    function isDateAvailable(startDate, endDate) {
        for (let reservation of reservations) {
            
            const reservationStartDate = new Date(reservation.start_date);
            const reservationEndDate = new Date(reservation.end_date);
           
            const reservationStartDateAdjusted = new Date(reservationStartDate);
            reservationStartDateAdjusted.setDate(reservationStartDateAdjusted.getDate() + 1);

            const reservationEndDateAdjusted = new Date(reservationEndDate);
            reservationEndDateAdjusted.setDate(reservationEndDateAdjusted.getDate() -1);
   
            if (startDate.getTime() >= reservationStartDate.getTime() && startDate.getTime() <= reservationEndDateAdjusted.getTime()) {
                return false; 
            }
            if (endDate.getTime() >= reservationStartDateAdjusted.getTime() && endDate.getTime() <= reservationEndDate.getTime()) {
                return false;
            }
        }
        return true; 
    }
    
    // Fonction pour vérifier la disponibilité lorsque les dates changent
    function checkAvailability() {
        const startDate = new Date(startDatePicker.value);
        const endDate = new Date(endDatePicker.value);    
        if (!isDateAvailable(startDate, endDate)) {
            alert("Ces dates ne sont pas disponibles. Veuillez sélectionner d'autres dates.");
        }
    }
    
    
    // Désactiver la sélection des lundis
    disableMondays(startDatePicker);
    disableMondays(endDatePicker);
 
  
    startDatePicker.addEventListener('change', checkAvailability);
    endDatePicker.addEventListener('change', checkAvailability);
 
 });
 