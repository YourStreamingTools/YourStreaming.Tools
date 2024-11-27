<?php
// Initialize the session
session_start();

// Check if user is logged in
if (!isset($_SESSION['access_token'])) {
    header('Location: login.php');
    exit();
}

// Connect to database
require_once "db_connect.php";

// Get the current hour in 24-hour format (0-23)
$currentHour = date('G');
$greeting = ($currentHour < 12) ? "Good morning" : "Good afternoon";

// Fetch the user's data from the database based on the access_token
$access_token = $_SESSION['access_token'];
$stmt = $conn->prepare("SELECT * FROM users WHERE access_token = ?");
$stmt->bind_param("s", $access_token);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();
$user_id = $user['id'];
$username = $user['username'];
$twitchDisplayName = $user['twitch_display_name'];
$twitch_profile_image_url = $user['profile_image'];
$signup_date = $user['signup_date'];
$last_login = $user['last_login'];

// Convert the stored date and time to UTC using Sydney time zone (AEST/AEDT)
date_default_timezone_set('Australia/Sydney');
$signup_date_utc = date_create_from_format('Y-m-d H:i:s', $signup_date)->setTimezone(new DateTimeZone('UTC'))->format('F j, Y g:i A');
$last_login_utc = date_create_from_format('Y-m-d H:i:s', $last_login)->setTimezone(new DateTimeZone('UTC'))->format('F j, Y g:i A');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>YourStreamingTools - Profile</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/1.0.0/css/bulma.min.css">
    <link rel="icon" href="https://cdn.yourstreamingtools.com/img/logo.jpeg" type="image/png" />
    <link rel="apple-touch-icon" href="https://cdn.yourstreamingtools.com/img/logo.jpeg">
    <style>
        /* Dark mode styling */
        body, .navbar, .section, .box, .button, a, p {
            background-color: #121212 !important;
            color: #ffffff !important;
        }
        .navbar-item, .navbar-link {
            color: #ffffff !important;
        }
        .box {
            background-color: #1f1f1f;
            border: 1px solid #333;
        }
        .profile-info p {
            font-size: 1.2em;
        }
        #profile-image {
            border-radius: 50%;
            margin-top: 15px;
        }
        .logout-button {
            background-color: #333;
            color: #ffffff;
            border: 1px solid #555;
            transition: background-color 0.3s;
        }
        .logout-button:hover {
            background-color: #555;
        }
    </style>
</head>
<body>
<!-- Navbar -->
<nav class="navbar is-dark" role="navigation" aria-label="main navigation">
    <div class="navbar-brand">
        <a class="navbar-item" href="index.php">YourStreamingTools</a>
        <a role="button" class="navbar-burger" aria-label="menu" aria-expanded="false" data-target="navbarBasic">
            <span aria-hidden="true"></span>
            <span aria-hidden="true"></span>
            <span aria-hidden="true"></span>
        </a>
    </div>
    <div id="navbarBasic" class="navbar-menu">
        <div class="navbar-start">
            <a class="navbar-item" href="index.php">Dashboard</a>
            <a class="navbar-item is-active" href="profile.php">Profile</a>
        </div>
        <div class="navbar-end">
            <div class="navbar-item">
                <div class="buttons">
                    <a class="button is-light" href="logout.php">Logout</a>
                </div>
            </div>
        </div>
    </div>
</nav>
<!-- /Navbar -->

<section class="section">
    <div class="container">
        <div class="box">
            <h1 class="title"><?php echo "$greeting, <img id='profile-image' src='$twitch_profile_image_url' width='70px' height='70px' alt='$twitchDisplayName Profile Image'> $twitchDisplayName!"; ?></h1>
            <h2 class="subtitle">Your Profile</h2>
            <div class="profile-info">
                <p><strong>Your Username:</strong> <?php echo $username; ?></p>
                <p><strong>Display Name:</strong> <?php echo $twitchDisplayName; ?></p>
                <p><strong>You Joined:</strong> <span id="localSignupDate"></span></p>
                <p><strong>Your Last Login:</strong> <span id="localLastLogin"></span></p> 
            </div>
            <a href="logout.php" class="button is-danger logout-button">Logout</a>
        </div>
    </div>
</section>

<script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
<script>
// Function to convert UTC date to local date in the desired format
function convertUTCToLocalFormatted(utcDateStr) {
    const options = {
        year: 'numeric',
        month: 'long',
        day: 'numeric',
        hour: 'numeric',
        minute: 'numeric',
        hour12: true,
        timeZoneName: 'short'
    };
    const utcDate = new Date(utcDateStr + ' UTC');
    const localDate = new Date(utcDate.toLocaleString('en-US', { timeZone: 'Australia/Sydney' }));
    const dateTimeFormatter = new Intl.DateTimeFormat('en-US', options);
    return dateTimeFormatter.format(localDate);
}

// PHP variables holding the UTC date and time
const signupDateUTC = "<?php echo $signup_date_utc; ?>";
const lastLoginUTC = "<?php echo $last_login_utc; ?>";

// Display the dates in the user's local time zone
document.getElementById('localSignupDate').innerText = convertUTCToLocalFormatted(signupDateUTC);
document.getElementById('localLastLogin').innerText = convertUTCToLocalFormatted(lastLoginUTC);
</script>
</body>
</html>