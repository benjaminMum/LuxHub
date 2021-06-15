let seats = $('#seats')
console.log(seats)
$('#bookingForm').on('submit', (e) => {

    if (seats.first().val() == "") {
        e.preventDefault();
        alert('Veuillez séléctionner au minimum un siège.');
    }
})
