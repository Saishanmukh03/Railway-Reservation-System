<html>
    <head>
        <title>Railway Reservation</title>
        <link rel="stylesheet" href="Userlogin.css">
        <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
    </head>
    <body>
        <header>
            <div class="logo1">
            <img src="irlogo.png">
            </div>
            <div class="text">
            <h1 style="color: navy; font-size: 50px;">INDIAN RAILWAYS</h1>
            </div>
            <div class="logo2">
            <img src="irctclogo.png">
            </div>
        </header>
        <form id="loginForm" method="post" action="index.php">
        <fieldset>
            <h3>Login</h3>
            <input type="text" placeholder="Username" id="user" name="username"><br><br>
            <input type="password" placeholder="password" id="pass" name="password"><br><br>
            <button id="submitButton">Submit</button><br><br>
            <label style="color: white;">Don't have account?</label>
            <a href="usersignup.php">signup</a>
        </fieldset>
        </form>
        <?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Create a database connection
    $conn = new mysqli("localhost", "root", "", "railway");

    // Check if the connection is successful
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Get user input from the form
    $username = $_POST["username"];
    $password = $_POST["password"];

    // SQL query to retrieve user information based on the username and plain password
    $sql = "SELECT Username, Password FROM Users WHERE Username = '$username' AND Password = '$password'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        // Password is correct, set session variables and redirect to home.php
        session_start();
        $_SESSION["Username"] = $username;
        header("Location: home.php");
        exit; // Terminate the script to prevent further execution
    } else {
        // Username or password is incorrect
        echo '<script>var loginAlert = "Invalid username or password.";</script>';
    }

    // Close the database connection
    $conn->close();
}
?>


        <footer>
            <p class="left">&copy; 2023 Indian Railways. All rights reserved.</p>
            <div class="right">
                <a href="#">Terms and Conditions</a>
                <a href="#">Contact Us</a>
                <a href="#">About Us</a>
            </div>
        </footer>
        <script src="userlogin.js"></script>
    </body>
</html>