document.addEventListener("DOMContentLoaded", function() {
    const form = document.getElementById("signupForm");
    const submitButton = document.getElementById("submitButton");
    
    submitButton.addEventListener("click", function(event) {
        event.preventDefault(); // Prevent the default form submission
        
        const name = document.getElementById("name").value;
        const mobile = document.getElementById("mobile").value;
        const email = document.getElementById("email").value;
        const username = document.getElementById("username").value;
        const password = document.getElementById("password").value;
        const confirmPassword = document.getElementById("confirmPassword").value;
        
        // Validation rules
        const usernamePattern = /^[a-zA-Z][a-zA-Z0-9]*$/;
        const passwordPattern = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{6,10}$/;
        const mobilePattern = /^\d{10}$/; // Mobile should be exactly 10 digits
        const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        
        const emptyFields = [];
        const alertMessages = [];

        if (!mobile) {
            emptyFields.push("Mobile Number");
        } else if (!mobile.match(mobilePattern)) {
            alertMessages.push("Mobile number should be exactly 10 digits.");
        }
        if (!email) {
            emptyFields.push("Email");
        } else if (!email.match(emailPattern)) {
            alertMessages.push("Invalid email format. Make sure it contains '@' and '.com'.");
        }
        if (!username) {
            emptyFields.push("Username");
        } else if (!username.match(usernamePattern)) {
            alertMessages.push("Username should not start with a number and can only contain letters and numbers.");
        }
        if (!password) {
            emptyFields.push("Password");
        } else if (!password.match(passwordPattern)) {
            alertMessages.push("Password should contain at least one lowercase letter, one uppercase letter, one number, one special symbol (@ $ ! % * ? &), and be 6 to 10 characters long.");
        }
        if (!confirmPassword) {
            emptyFields.push("Confirm Password");
        } else if (password !== confirmPassword) {
            alertMessages.push("Passwords do not match.");
        }

        if (emptyFields.length > 0) {
            alert(`The following fields are required: ${emptyFields.join(", ")}`);
        } else if (alertMessages.length > 0) {
            alert(alertMessages.join("\n")); // Display alerts in order
        } else {
            // If validation is successful, you can submit the form or perform further actions
            form.submit(); // This submits the form
        }
    });
});