<html>
    <head>
        <title>Railway Reservation</title>
        <link rel="stylesheet" href="Usersignup.css">
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
        <form id="signupForm" method="post" action="Usersignup.php">
            <fieldset>
                <h3>Signup</h3>
                <input type="text" placeholder="Enter Name" id="name" name="name"><br><br>
                <input type="number" placeholder="Mobile No" id="mobile" name="mobile"><br><br>
                <input type="email" placeholder="mail-id" id="email" name="email"><br><br>
                <input type="text" placeholder="Create Username" id="username" name="username"><br><br>
                <input type="password" placeholder="Create password" id="password" name="password"><br><br>
                <input type="password" placeholder="Re-enter password" id="confirmPassword"><br><br>
                <button id="submitButton" name="submitButton">Submit</button><br><br>
                <label style="color: white;">Already a user?</label>
                <a href="index.php">login</a>
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
    $name = $_POST["name"];
    $mobile = $_POST["mobile"];
    $email = $_POST["email"];
    $username = $_POST["username"];
    $password = $_POST["password"];


    // SQL query to insert data into the Users table
    $sql = "INSERT INTO Users (Name, MobileNo, Email, Username, Password)
            VALUES ('$name', '$mobile', '$email', '$username', '$password')";

    if ($conn->query($sql) === TRUE) {
        // Registration successful
        header("Location: index.php");
        exit;
        echo "Registration successful. You can now <a href='index.php'>login</a>.";
    } else {
        // Registration failed
        echo "Error: " . $sql . "<br>" . $conn->error;
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
        <script src="usersignup.js"></script>
    </body>
</html>