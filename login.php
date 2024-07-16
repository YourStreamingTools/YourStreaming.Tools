<?php
session_start();

// Check if the user is already logged in, if yes then redirect them to the profile page
if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
    header("location: profile.php");
    exit;
}

// Twitch credentials
$client_id = '';
$client_secret = '';
$redirect_uri = '';
$scopes = 'user:read:email';

// If the user is redirected back with a code
if (isset($_GET['code'])) {
    $code = $_GET['code'];
    $token_url = "https://id.twitch.tv/oauth2/token?client_id=$client_id&client_secret=$client_secret&code=$code&grant_type=authorization_code&redirect_uri=$redirect_uri";
    
    // Get OAuth token
    $token_response = file_get_contents($token_url);
    $token_data = json_decode($token_response, true);
    $access_token = $token_data['access_token'];

    // Get user info
    $user_url = "https://api.twitch.tv/helix/users";
    $opts = [
        "http" => [
            "method" => "GET",
            "header" => "Authorization: Bearer $access_token\r\nClient-Id: $client_id"
        ]
    ];
    $context = stream_context_create($opts);
    $user_response = file_get_contents($user_url, false, $context);
    $user_data = json_decode($user_response, true);

    if (isset($user_data['data'][0])) {
        $twitch_user = $user_data['data'][0];

        // Store user info in session
        $_SESSION["loggedin"] = true;
        $_SESSION["user_id"] = $twitch_user['id'];
        $_SESSION["username"] = $twitch_user['display_name'];
        $_SESSION["email"] = $twitch_user['email'];

        // Redirect user to profile page
        header("location: profile.php");
        exit;
    }
}

// Generate Twitch login URL
$twitch_login_url = "https://id.twitch.tv/oauth2/authorize?response_type=code&client_id=$client_id&redirect_uri=$redirect_uri&scope=$scopes";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>YourStreamingTools - Login</title>
    <link rel="icon" href="https://cdn.yourstreamingtools.com/img/logo.ico" type="image/png" />
    <link rel="apple-touch-icon" href="https://cdn.yourstreamingtools.com/img/logo.ico">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="css/style.css">
    <script src="js/about.js"></script>
    <style type="text/css">
        body {
            font: 14px sans-serif;
        }
        .wrapper {
            width: 350px; padding: 20px;
        }
        a.popup-link {
            text-decoration: none;
            color: black;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="../index.php">YourStreamingTools</a>
            </div>
            <ul class="nav navbar-nav">
                <li><a href="../index.php">Home</a></li>
                <li class="active"><a href="login.php">Login</a></li>
                <li><a href="register.php">Sign Up</a></li>
            </ul>
            <p class="navbar-text navbar-right"><a class="popup-link" onclick="showPopup()">&copy; <?php echo date("Y"); ?> YourStreamingTools. All rights reserved.</a></p>
        </div>
    </nav>
    <div class="col-md-6">
        <h2>Login</h2>
        <p>Please use Twitch to log in.</p>
        <a href="<?php echo htmlspecialchars($twitch_login_url); ?>"><button class="btn btn-primary">Login with Twitch</button></a>
    </div>    
</body>
</html>