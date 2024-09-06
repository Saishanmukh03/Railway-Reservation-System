<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Home</title>
        <link rel="stylesheet" href="home.css">
        <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
        <script>
            function validateForm() {
                // Get the values of the "From," "To," and "Date" fields
                var fromValue = document.getElementById("from").value;
                var toValue = document.getElementById("to").value;
                var dateValue = document.getElementById("traveldate").value;

                // Check if any of the fields are empty
                if (fromValue === "" || toValue === "" || dateValue === "") {
                    alert("Please fill in all fields (From, To, and Date) before submitting.");
                    return false; // Prevent form submission
                }

                return true; // Allow form submission
            }
        </script>
    </head>
    <body>
        <header>
            <div class="logo"><ul>
                    <li><img src="irctclogo.png"></li>
            </div></ul>
        <div class="links"><ul>
                <a href="home.php"><li id="activepage">Home</li></a>
                <a href="events.php"><li>Events</li></a>
                <a href="profile.php"><li>My profile</li></a>
                <a href="Userlogin.php"><li>Logout</li></a>
        </div></ul>
</header>

<div class="search-container">
    <h1 style="color: navy;">Search Between Two Stations</h1>
    <form action="book.php" method="GET" onsubmit="return validateForm();">
        <div class="input-group">
            <label >From:</label>
            <input type="text" id="from" name="from" placeholder="Enter station">
        </div>
        <div class="input-group" id="To">
            <label >To:</label>
            <input type="text" id="to" name="to" placeholder="Enter station">
        </div>
        <div class="input-group" id="Traveldate">
            <label>Date:</label>
            <input type="date" id="traveldate" name="travelDate">
        </div>

        <button type="submit">Search Trains</button>
    </form>
</div>
<?php
$conn = mysqli_connect("localhost", "root", "", "railway");

// Check if the connection was successful
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Check if the form has been submitted
if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["from"]) && isset($_GET["to"])) {
    // Get user input from the form
    $from = $_GET["from"];
    $to = $_GET["to"];

    // Sanitize input to prevent SQL injection
    $from = mysqli_real_escape_string($conn, $from);
    $to = mysqli_real_escape_string($conn, $to);

    // Construct and execute a SQL query to find available trains
    $query = "SELECT * FROM TrainDetails WHERE SourceStation='$from' AND DestinationStation='$to'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
        echo "<h2>Available Trains</h2>";
        echo "<ul>";
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<li><a href='book.php?trainNo=" . $row["TrainNo"] . "'>" . $row["TrainName"] . "</a></li>";
        }
        echo "</ul>";
    } else {
        echo "<h2>No Trains Found</h2>";
    }

    // Close the database connection
    mysqli_close($conn);
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
</body>
</html>