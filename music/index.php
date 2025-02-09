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
$is_admin = ($user['is_admin'] == 1);
$stmt->close();

$musicDir = '/api_music/';
$musicPath = $_SERVER['DOCUMENT_ROOT'] . $musicDir;
$musicURL = 'https://' . $_SERVER['HTTP_HOST'] . $musicDir;
$mp3Files = array_diff(scandir($musicPath), array('..', '.'));
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>YourStreamingTools - Dashboard</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/1.0.0/css/bulma.min.css">
    <script src="https://cdn.yourstreamingtools.com/js/about.js"></script>
    <script src="/addBrowserSourceInstructions.js"></script>
    <link rel="icon" href="https://cdn.yourstreamingtools.com/img/logo.jpeg">
    <link rel="apple-touch-icon" href="https://cdn.yourstreamingtools.com/img/logo.jpeg">
    <style>
        /* Dark mode styling */
        body, .navbar, .section, .box, .button, .navbar-item, .navbar-link, a, p {
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
        #profile-image {
            border-radius: 50%;
            margin-top: 15px;
        }
        .audio-player {
            width: 100%;
            background-color: #1f1f1f;
            border: 1px solid #333;
        }
        #playlist li a {
            color: #ffffff !important;
            text-decoration: none;
            padding: 10px;
            display: block;
            border-bottom: 1px solid #444;
            transition: background-color 0.3s ease;
        }
        #playlist li a:hover, #playlist li a.active {
            background-color: #333333;
        }
        #currentTrack {
            font-size: 20px;
            font-weight: bold;
            margin-bottom: 20px;
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
            <a class="navbar-item" href="profile.php">Profile</a>
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
            <p>How? <strong><button class="button is-small is-info" onclick="addBrowserSource()">Show Instructions</button></strong></p>
            <div id="currentTrack">Select a song...</div>
            <audio id="audioPlayer" class="audio-player" controls autoplay>
                <?php if(count($mp3Files) > 0): ?>
                    <?php $firstMp3 = current($mp3Files); ?>
                    <source src="<?= $musicURL . $firstMp3 ?>" type="audio/mp3">
                <?php endif; ?>
                Your browser does not support the audio element.
            </audio>
            <ul id="playlist">
                <?php foreach($mp3Files as $mp3File): ?>
                    <li><a href="<?= $musicURL . $mp3File ?>"><?= basename($mp3File, '.mp3') ?></a></li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>
</section>

<script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
<script>
window.onload = function() {
    var audioPlayer = document.getElementById('audioPlayer');
    var playlist = document.getElementById('playlist');
    var tracks = playlist.getElementsByTagName('a');
    var currentTrack = Math.floor(Math.random() * tracks.length); // Start at a random track
    var currentTrackDisplay = document.getElementById('currentTrack');

    function updateCurrentTrackDisplay(trackName) {
        currentTrackDisplay.textContent = "Now Playing: " + trackName;
    }

    if(tracks.length > 0) {
        updateCurrentTrackDisplay(tracks[currentTrack].text);
        audioPlayer.src = tracks[currentTrack].href; // Set the source to the random track
        audioPlayer.play(); // Start playing the track immediately
    }

    // Set the initial volume to 0.1
    audioPlayer.volume = 0.1;

    audioPlayer.addEventListener('ended', function() {
        currentTrack++;
        if(currentTrack >= tracks.length) {
            currentTrack = 0; // Loop back to the first track
        }
        audioPlayer.src = tracks[currentTrack].href;
        audioPlayer.play();
        updateCurrentTrackDisplay(tracks[currentTrack].text);
    }, false);

    for(var i = 0; i < tracks.length; i++) {
        tracks[i].addEventListener('click', function(e) {
            e.preventDefault();
            var selectedTrack = this.href;
            currentTrack = Array.from(tracks).indexOf(this);
            audioPlayer.src = selectedTrack;
            audioPlayer.play();
            updateCurrentTrackDisplay(this.text);
        }, false);
    }
};
</script>
</body>
</html>