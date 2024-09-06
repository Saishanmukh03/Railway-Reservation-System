document.addEventListener("DOMContentLoaded", function() {
    // Check if the loginAlert variable is set
    if (typeof loginAlert !== 'undefined') {
        alert(loginAlert); // Display the alert message
    }
    const form = document.getElementById("loginForm");
    const submitButton = document.getElementById("submitButton");
    
    submitButton.addEventListener("click", function(event) {
        event.preventDefault(); // Prevent the default form submission
        
        const username = document.getElementById("user").value;
        const password = document.getElementById("pass").value;
        
        // Basic validation: Check if username and password are not empty
        if (username.trim() === ""){ 
            alert("Username is required.");
        } 
        else if(password.trim() === "") {
            alert("Password is required.");
        }
        else {
            // If validation is successful, you can submit the form or perform further actions
            form.submit(); // This submits the form
        }
    });
});