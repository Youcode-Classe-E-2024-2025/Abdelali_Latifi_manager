    function validateForm(event) {
        event.preventDefault();

        // Name validation
        const name = document.getElementById('name').value;
        const nameRegex = /^[A-Za-zÀ-ÿ-'\s]{2,100}$/;
        if (!nameRegex.test(name)) {
            alert('Please enter a valid name.');
            return false;
        }

        // Email validation
        const email = document.getElementById('email').value;
        const emailRegex = /^[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,}$/;
        if (!emailRegex.test(email)) {
            alert('Please enter a valid email address.');
            return false;
        }

        // Message validation
        const message = document.getElementById('message').value;
        const messageRegex = /^.{10,}$/;
        if (!messageRegex.test(message)) {
            alert('Message should be at least 10 characters long.');
            return false;
        }

        // submitted
        alert('Form submitted successfully!');
        return true;
    }

    const form = document.querySelector('form');
    form.addEventListener('submit', validateForm);
