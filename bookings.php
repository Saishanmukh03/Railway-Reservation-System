<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Details</title>
    <link rel="stylesheet" href="bookings.css">
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

    <main>
        <div class="booking-details">
            <div class="train-details">
                <?php
                // Establish a database connection (update with your database credentials)
                $conn = mysqli_connect("localhost", "root", "", "railway");

                // Check if the connection was successful
                if (!$conn) {
                    die("Connection failed: " . mysqli_connect_error());
                }

                // Check if the train number and date are provided in the URL
                if (isset($_GET["trainNo"]) && isset($_GET["date"])) {
                    $trainNo = mysqli_real_escape_string($conn, $_GET["trainNo"]);
                    $date = $_GET["date"];

                    // Query the database to get details of the selected train
                    $query = "SELECT * FROM TrainDetails WHERE TrainNumber = '$trainNo'";
                    $result = mysqli_query($conn, $query);

                    if (mysqli_num_rows($result) === 1) {
                        $row = mysqli_fetch_assoc($result);

                        // Display train details
                        echo "<h2>Train Details</h2>";
                        echo "<p>Train Number: " . $row["TrainNumber"] . "</p>";
                        echo "<p>Train Name: " . $row["TrainName"] . "</p>";
                        echo "<p>Source: " . $row["SourceStation"] . "</p>";
                        echo "<p>Destination: " . $row["DestinationStation"] . "</p>";
                        echo "<p>Date: " . $date . "</p>";
                        echo "<p>Source Time: " . $row["SourceTime"] . "</p>";
                        echo "<p>Destination Time: " . $row["DestinationTime"] . "</p>";
                    } else {
                        echo "<h2>Train not found</h2>";
                    }
                } else {
                    echo "<h2>Train number or date not provided</h2>";
                }

                // Close the database connection
                mysqli_close($conn);
                ?>
            </div>
            <div class="passenger-details">
                <h2>Passenger Details</h2>
                <form method='POST' action='confirm_booking.php'>
                    <label for='username'>Username:</label>
                    <input type='text' id='username' name='username' required><br>
                    <label for='passenger_name'>Passenger Name:</label>
                    <input type='text' id='passenger_name' name='passenger_name' required><br>
                    <label for='age'>Age:</label>
                    <input type='text' id='age' name='age' required><br>
                    <input type='submit' value='Confirm Booking'>
                </form>
            </div>
        </div>
    </main>

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
