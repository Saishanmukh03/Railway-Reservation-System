<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Train</title>
    <link rel="stylesheet" href="book.css">
</head>
<body>
    <header>
        <div class="logo">
            <ul>
                <li><img src="irctclogo.png"></li>
            </ul>
        </div>
        <div class="links">
            <ul>
                <a href="home.php"><li>Home</li></a>
                <a href="events.php"><li>Events</li></a>
                <a href="profile.php"><li>My profile</li></a>
                <a href="Userlogin.php"><li>Logout</li></a>
            </ul>
        </div>
    </header>

    <main>
        <div class="train-details">
            <?php
            // Establish a database connection (update with your database credentials)
            $conn = mysqli_connect("localhost", "root", "", "railway");

            // Check if the connection was successful
            if (!$conn) {
                die("Connection failed: " . mysqli_connect_error());
            }

            // Check if the source and destination stations are provided in the URL
            if (isset($_GET["from"]) && isset($_GET["to"])) {
                $from = mysqli_real_escape_string($conn, $_GET["from"]);
                $to = mysqli_real_escape_string($conn, $_GET["to"]);

                // Check if the date is provided in the URL
                if (isset($_GET["travelDate"])) {
                    $date = $_GET["travelDate"];

                    // Query the database to get the details of the selected train based on source, destination, and date
                    $query = "SELECT * FROM TrainDetails WHERE SourceStation = '$from' AND DestinationStation = '$to'";
                    $result = mysqli_query($conn, $query);

                    if (mysqli_num_rows($result) > 0) {
                        echo "<table>";
                        echo "<tr><th>Train Number</th><th>Train Name</th><th>Source</th><th>Destination</th><th>Source Time</th><th>Destination Time</th><th>Date</th><th></th></tr>";
                        while ($row = mysqli_fetch_assoc($result)) {
                            $trainNo = $row["TrainNumber"];
                            echo "<tr>";
                            echo "<td>" . $trainNo . "</td>";
                            echo "<td>" . $row["TrainName"] . "</td>";
                            echo "<td>" . $row["SourceStation"] . "</td>";
                            echo "<td>" . $row["DestinationStation"] . "</td>";
                            echo "<td>" . $row["SourceTime"] . "</td>";
                            echo "<td>" . $row["DestinationTime"] . "</td>";
                            echo "<td>" . $date . "</td>";
                            echo "<td class='book-button'><a href='bookings.php?trainNo=$trainNo&date=$date'>Book</a></td>";
                            echo "</tr>";
                        }
                        echo "</table>";
                    } else {
                        echo "<h2>No Trains Found</h2>";
                    }
                } else {
                    echo "<h2>Date not provided</h2>";
                }
            } else {
                echo "Invalid request";
            }

            // Close the database connection
            mysqli_close($conn);
            ?>
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
