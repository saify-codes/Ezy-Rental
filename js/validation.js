document.addEventListener('DOMContentLoaded', function() {
    // Get form element
    var form = document.getElementById('myForm');

    // Add event listener for form submission
    form.addEventListener('submit', function(event) {
        // Prevent the form from submitting
        event.preventDefault();

        // Validate name
        var nameInput = document.getElementById('name');
        var name = nameInput.value.trim();
        if (name === '') {
            alert('Please enter your name.');
            nameInput.focus();
            return;
        }

        // Validate email
        var emailInput = document.getElementById('email');
        var email = emailInput.value.trim();
        if (email === '') {
            alert('Please enter your email.');
            emailInput.focus();
            return;
        }
        // Email validation regex pattern
        var emailRegex = /^\w+([.-]?\w+)*@\w+([.-]?\w+)*(.\w{2,3})+$/;
        if (!emailRegex.test(email)) {
            alert('Please enter a valid email address.');
            emailInput.focus();
            return;
        }

        // Validate password
        var passwordInput = document.getElementById('password');
        var password = passwordInput.value.trim();
        if (password === '') {
            alert('Please enter a password.');
            passwordInput.focus();
            return;
        }

        // If all validations pass, submit the form
        form.submit();
    });
});