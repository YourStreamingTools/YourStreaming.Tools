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
header("location: $twitch_login_url");
?>