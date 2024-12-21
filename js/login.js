document.getElementById("loginForm").addEventListener("submit", function(event) {
    event.preventDefault();

    const name = document.getElementById("first-name").value;
    const password = document.getElementById("password").value;

    const nameRegex = /^[A-Za-z]{2,}$/;
    const passwordRegex = /^(?=.*[A-Za-z\d])[A-Za-z\d]{6,}$/;

    let isValid = true;

    if (!nameRegex.test(name)) {
        isValid = false;
        alert('Name must only contain letters and be at least 2 characters long')
    } else {
        document.getElementById("nameError").classList.add("hidden");
    }

    if (!passwordRegex.test(password)) {
        isValid = false;
        alert('Password must be at least 8 characters long and contain at least one letter and one number.')
    } 

    if (isValid) {
        alert("Form submitted successfully!");
       
    }
});