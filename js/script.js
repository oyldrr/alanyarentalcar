
// Navbar turn on and turn off funcionality
function openNav() {
  document.getElementById("mySidenav").style.width = "100%";
}

function closeNav() {
  document.getElementById("mySidenav").style.width = "0"; !important
}


// Show/hide password functionality
function togglePasswordVisibility() {
  var passwordField = document.getElementById('password');
  var eyeIcon = document.getElementById('togglePassword');

  if (passwordField.type === 'password') {
      passwordField.type = 'text';
      eyeIcon.classList.remove('fa-eye-slash');
      eyeIcon.classList.add('fa-eye');
  } else {
      passwordField.type = 'password';
      eyeIcon.classList.remove('fa-eye');
      eyeIcon.classList.add('fa-eye-slash');
  }
}




