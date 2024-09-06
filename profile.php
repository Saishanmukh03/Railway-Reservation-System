<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="profile.css">
</head>

<body>
    <header>
        <div class="logo">
            <ul>
                <li><img src="irctclogo.png"></li>
        </div>
        </ul>
        <div class="links">
            <ul>
                <a href="home.php">
                    <li>Home</li>
                </a>
                <a href="events.php">
                    <li>Events</li>
                </a>
                <a href="profile.php">
                    <li id="activepage">My profile</li>
                </a>
                <a href="Userlogin.php">
                    <li>Logout</li>
                </a>
        </div>
        </ul>
    </header>
    <div class="profile-container">
        <div class="left-section">
            <img src="pp.jpg" alt="Profile Picture">
        </div>
        <div class="right-section">
            <div class="profile-content" id="basic-info">
                <h2>Basic Info</h2>
                <p>Username: John Doe</p>
                <p>Email: johndoe@example.com</p>
                <p>Phone: 123-456-7890</p>
            </div>
        </div>
    </div>

    <div class="bookings-container">
        <h2>Bookings</h2>
        <div class="booking">
            <p>Hyd -> Del</p>
            <p>Date: August 8, 2023</p>
        </div>
        <div class="booking">
            <p>Vij -> Hyd</p>
            <p>Date: August 25, 2023</p>
        </div>
    </div>

    <div class="additional-info-container">
        <h2>Additional Information</h2>
        <div class="additional-info-section">
            <h3>Address</h3>
            <p>Your address details go here.</p>
        </div>
        <div class="additional-info-section">
            <h3>Payment Options</h3>
            <p>Your payment options details go here.</p>
        </div>
    </div>
    
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