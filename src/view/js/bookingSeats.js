//remove seat from list
function removeSeat(seatListElm, seatValue) {
    var arr = seatListElm.value.split(',');

    var p = arr.indexOf(seatValue);
    if (p != -1) {
        arr.splice(p, 1);
        seatListElm.value = arr.join(',');
    }
}


//add seat to list
function addSeat(seatListElm, seatValue) {
    var arr = seatListElm.value.split(',');
    if (arr.join() == '') { arr = []; }

    var p = arr.indexOf(seatValue);
    if (p == -1) {
        arr.push(seatValue); //append
        arr = arr.sort(); //sort list
        seatListElm.value = arr.join(',');
    }
}

//called everytime a seat is clicked
function seatClick(seat) {
    seat = (this instanceof HTMLInputElement) ? this : seat;
    var firstSelected;
    var selectedSeats = [];
    var thisInputHasAlreadyBeenSeen = false;
    var confirmedSeats = [];
    if (seat.classList.contains('reserved') == false) {

        if (seat.classList.toggle('selected')) {
            addSeat(document.getElementById('seats'), seat.value);
            $(".seat").each(function () {
                if (this != seat) {
                    if (firstSelected == null && this.classList.contains('selected')) {
                        firstSelected = this;
                        selectedSeats.push(firstSelected);
                        confirmedSeats = selectedSeats.slice();
                    } else if (firstSelected) {
                        if (this.classList.contains('selected')) {
                            selectedSeats.push(this);
                            confirmedSeats = selectedSeats.slice();
                        }
                        if (!this.classList.contains('reserved')) {
                            selectedSeats.push(this);
                        }
                        else {
                            if (!thisInputHasAlreadyBeenSeen) {
                                selectedSeats = [];
                                firstSelected = null;
                            } else {
                                return false;
                            }
                        }
                    }
                } else {
                    selectedSeats.push(this);
                    confirmedSeats = selectedSeats.slice();
                    if (firstSelected == null) {
                        thisInputHasAlreadyBeenSeen = true;
                        firstSelected = this;
                    }
                }
            });
            if (confirmedSeats.length > 1) {
                selectAll(confirmedSeats);
            }
        } else {
            removeSeat(document.getElementById('seats'), seat.value);
        }

    } else {
        alert("Ce siège est déjà réservé!\nMerci de sélectionner un autre siège.");
        removeSeat(document.getElementById('seats'), seat.value);
        return;
    }
}


//adding event click to seats
var elms = document.getElementsByClassName('seat');
for (var i = 0, l = elms.length; i < l; i++) {
    elms[i].onclick = seatClick;
}

function selectAll(seats) {
    seats.forEach(function (seat) {
        seat.className = seat.className + ' selected';
    });
}