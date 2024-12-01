// Login Form Validation
function validateLoginForm() {
    const email = document.getElementById("email").value;
    const password = document.getElementById("password").value;
  
    if (!email) {
      alert("Please enter your email.");
      return false;
    }
  
    if (!password) {
      alert("Please enter your password.");
      return false;
    }
  
    return true;
  }
  
  // Register Form Validation
  function validateRegisterForm() {
    const name = document.getElementById("name").value;
    const email = document.getElementById("email").value;
    const password = document.getElementById("password").value;
    const confirmPassword = document.getElementById("confirmPassword").value;
  
    if (!name) {
      alert("Please enter your full name.");
      return false;
    }
  
    if (!email) {
      alert("Please enter your email.");
      return false;
    }
  
    if (password.length < 6) {
      alert("Password must be at least 6 characters long.");
      return false;
    }
  
    if (password !== confirmPassword) {
      alert("Passwords do not match.");
      return false;
    }
  
    return true;
  }
  
  const slides = document.querySelectorAll('.slide');
let currentSlide = 0;

// Function to show the next slide
function showNextSlide() {
  slides[currentSlide].classList.remove('active');
  currentSlide = (currentSlide + 1) % slides.length; // Loop back to the first slide
  slides[currentSlide].classList.add('active');
}

// Auto-change slides every 3 seconds
setInterval(showNextSlide, 3000);
