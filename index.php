<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>YourStreamingTools</title>
    <link rel="icon" href="https://cdn.yourstreamingtools.com/img/logo.ico" type="image/png" />
    <link rel="apple-touch-icon" href="https://cdn.yourstreamingtools.com/img/logo.ico">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@1.0.0/css/bulma.min.css">
    <style>
        .container {
            margin-top: 50px;
            text-align: center;
        }
        .button-register {
            margin-left: 10px;
        }
        .api-info {
            margin-top: 30px;
            text-align: left;
        }
        .api-link {
            margin-right: 10px;
        }
    </style>
</head>
<body>
    <section class="section">
        <div class="container">
            <h1 class="title">YourStreamingTools API</h1>
            <p class="subtitle"><em>We kindly remind you that access to our server requires a pre-generated key.<br>If you don't have one, please signup/login below.</em></p>
            <div class="buttons is-centered">
                <a href="login.php" class="button is-link">Login</a>
                <a href="register.php" class="button is-primary button-register">Register</a>
            </div>
            <br>
            <p>We're currently supporting the following APIs:</p>
            <ul>
                <li><a href="?api=Time" class="api-link">Time</a></li>
                <li><a href="?api=Weather" class="api-link">Weather</a></li>
                <li><a href="?api=PublicQuotes" class="api-link">Public Quotes</a></li>
                <li><a href="?api=Music" class="api-link">DMCA Music</a></li>
                <li><a href="?api=Todo-list" class="api-link">Todo list</a></li>
            </ul>
            <div class="api-info">
                <?php
                    if (isset($_GET['api'])) {
                        $api = $_GET['api'];
                        switch ($api) {
                            case 'Time':
                                echo "<br>";
                                echo "<p>This API provides the current time in various timezones.<br>";
                                echo "Usage is https://api.yourstreamingtools.com/time.php?timezone=Australia/Sydney&api=API_KEY<br><br>";
                                echo "The API employs identical functions to those found in PHP Timezone.<br>For a list of supported timezones, <a href='https://www.php.net/manual/en/timezones.php' target='_blank'>click here</a>";
                                echo "</p>";
                                break;
                            case 'Weather':
                                echo "<br>";
                                echo "<p>This API provides the current weather conditions for a given location.<br>";
                                echo "Usage is https://api.yourstreamingtools.com/weather.php?city=Sydney&api=API_KEY";
                                echo "</p>";
                                break;
                            case 'PublicQuotes':
                                echo "<br>";
                                echo "<p>This API provides you with a random quote from one of the following people:<br><br>";
                                echo "Dorothy Parker, Noel Coward, Winston Churchill, Eleanor Roosevelt, Harpo Marx, Dale Carnegie, Terry Pratchett & Blackadder<br><br>";
                                echo "Usage is <a href='https://api.yourstreamingtools.com/quotes.php' target='_blank'>https://api.yourstreamingtools.com/quotes.php</a>";
                                echo "</p>";
                                break;
                            case 'Music':
                                echo "<br>";
                                echo "While not strictly an API, we've developed a handy tool to enhance your streaming experience.<br><br>";
                                echo "It functions as a browser source that can be integrated into your streaming software. For instance, within OBS, you can add this as a source, and there's an option under settings for the VoD Audio Track.<br><br>";
                                echo "Essentially, when you visit this page, you'll find approximately 5 hours of music that automatically loops once the playlist concludes.<br><br>";
                                echo "For detailed instructions on how to utilize this feature, please visit <a href='https://music.yourstreamingtools.com/' target='_blank'>music.yourstreamingtools.com</a>.";
                                break;
                            case 'Todo-list':
                                echo "<br>";
                                echo "<p>This API allows users to create and manage todo lists.<br>";
                                echo "Check it out here: <a href='https://yourlist.online/' target='_blank'>YourList.Online</a>";
                                echo "</p>";
                                break;
                            default:
                                echo "<br>";
                                echo "<p>Please select an API above to view its information.</p>";
                        }
                    } else {
                        echo "<p>Please select an API above to view its information.</p>";
                    }
                ?>
            </div>
        </div>
    </section>
</body>
</html>