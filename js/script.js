
// Navbar turn on and turn off funcionality
function openNav() {
  document.getElementById("mySidenav").style.width = "100%";
}

function closeNav() {
  document.getElementById("mySidenav").style.width = "0"; !important
}

// Verification Page
function moveToNext(input) {
  var nextInput = input.nextElementSibling;

  // Move focus to the next input box if available
  if (nextInput !== null) {
    nextInput.focus();
  }
  else {
    window.location.href = 'index.php';
  }
}


/* Date Selection */
var dropOff = document.getElementById('drop-off');
dropOff.style.display = "none";


var pickupDate;
function displayDropOff(input) {
  value = encodeURIComponent(input.innerHTML);
  if (value < 10) {
    pickupDate = '0' + value + '.' + '12' + '.' + '2023';
  }
  else {
    pickupDate = value + '.' + '12' + '.' + '2023';
  }

  var dropOff = document.getElementById('drop-off');
  dropOff.style.display = "block";

  var pickUp = document.getElementById('pick-up');
  pickUp.style.display = "none";

  window.scrollTo({
    top: 0,
    left: 0,
    behavior: 'smooth' // 'auto', 'instant', or 'smooth'
  });

}

function moveToLocation(input) {
  var value = encodeURIComponent(input.innerHTML);
  if (value < 10) {
    window.location.href = 'select-location.php?pick-up=' + pickupDate + '&drop-off=0' + value + '.' + '12' + '.' + '2023';
  }
  else {
    window.location.href = 'select-location.php?pick-up=' + pickupDate + '&drop-off=' + value + '.' + '12' + '.' + '2023';
  }
}

function toSelectAirport(){
  window.location.href = 'select-airport.php'
}

function toPayment(){
  window.location.href = 'payment.php'
}