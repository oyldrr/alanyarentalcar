
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



