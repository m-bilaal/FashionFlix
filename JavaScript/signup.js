// Function to validate the form inputs
function validateForm() {
    // Get values from form inputs
    const name = document.getElementById('signup-name').value.trim();
    const email = document.getElementById('signup-email').value.trim();
    const password = document.getElementById('signup-password').value.trim();

    // Regular expressions for validation patterns
    const namePattern = /^[a-zA-Z\s]+$/;
    const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    const passwordPattern = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).{11,}$/;

    // Elements to display error messages
    const nameError = document.getElementById('name-error');
    const emailError = document.getElementById('email-error');
    const passwordError = document.getElementById('password-error');

    // Clear previous error messages
    nameError.innerText = '';
    emailError.innerText = '';
    passwordError.innerText = '';

    // Initialize validation flags
    let isNameValid = true;
    let isEmailValid = true;
    let isPasswordValid = true;

    // HTML icon for error messages
    const exclamationIcon = '<i class="fa-solid fa-exclamation-circle"></i>';

    // Validate name using the pattern
    if (!namePattern.test(name)) {
        nameError.innerHTML = `${exclamationIcon} Your name can only consist of letters and spaces`;
        isNameValid = false;
    }

    // Validate email using the pattern
    if (!emailPattern.test(email)) {
        emailError.innerHTML = `${exclamationIcon} Please enter a valid email address`;
        isEmailValid = false;
    }

    // Validate password using the pattern
    if (!passwordPattern.test(password)) {
        passwordError.innerHTML = `${exclamationIcon} Your password must be at least 11 characters long and include at least one lowercase letter, one uppercase letter, and one number`;
        isPasswordValid = false;
    }

    // Return overall validation result
    return isNameValid && isEmailValid && isPasswordValid;
}