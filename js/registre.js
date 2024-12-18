document.getElementById("signUpForm").addEventListener("submit", function(event) {
    event.preventDefault();

    const firstName = document.getElementById("first-name").value;
    const lastName = document.getElementById("last-name").value;
    const email = document.getElementById("email").value;
    const password = document.getElementById("password").value;

    const nameRegex = /^[A-Za-z]{2,}$/; 
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/; 
    const passwordRegex = /^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{5,}$/; 
    let isValid = true;

    // Validate First Name
    if (!nameRegex.test(firstName)) {
        isValid = false;
        alert('First name must contain only letters and be at least 2 characters long.');
    } 
    // Validate Last Name
    if (!nameRegex.test(lastName)) {
        isValid = false;
        alert('Last name must contain only letters and be at least 2 characters long.');

    } 
    // Validate Email
    if (!emailRegex.test(email)) {
        isValid = false;
        alert('Invalid email format.');
    } 
    // Validate Password
    if (!passwordRegex.test(password)) {
        isValid = false;
        alert('Password must be at least 8 characters long and contain at least one letter and one number.');
    } 
    // If valid, submit the form
    if (isValid) {
        alert("Form submitted successfully!");
    }
});