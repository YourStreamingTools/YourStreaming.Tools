<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>YourStreamingTools</title>
    <link rel="icon" href="https://cdn.yourstreamingtools.com/img/logo.ico" type="image/png" />
    <link rel="apple-touch-icon" href="https://cdn.yourstreamingtools.com/img/logo.ico">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@1.0.0/css/bulma.min.css">
    <style>
        body {
            color: #FFFFFF;
        }
        .content {
            margin-top: 20px;
        }
        .api-info {
            margin-top: 20px;
        }
        .api-link {
            display: block;
            margin-bottom: 5px;
        }
    </style>
</head>
<body>
    <nav class="navbar is-dark">
        <div class="navbar-brand">
            <a class="navbar-item" href="#">
                <img src="https://cdn.yourstreamingtools.com/img/logo.ico" alt="Logo">
            </a>
            <div class="navbar-burger burger" data-target="navbarMenu">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </div>
        <div id="navbarMenu" class="navbar-menu">
            <div class="navbar-start">
                <a class="navbar-item" href="login.php">Twitch Login</a>
            </div>
        </div>
    </nav>
    <section class="section">
        <div class="container content">
            <h1 class="title has-text-white">YourStreamingTools API</h1>
            <p class="subtitle has-text-grey-light"><em>We kindly remind you that access to our server requires a pre-generated key.<br>If you don't have one, please login with Twitch below.</em></p>
            <p class="has-text-white">We're currently supporting the following APIs:</p>
            <ul>
                <li><a href="?api=Time" class="api-link has-text-link">Time</a></li>
                <li><a href="?api=Weather" class="api-link has-text-link">Weather</a></li>
                <li><a href="?api=PublicQuotes" class="api-link has-text-link">Public Quotes</a></li>
                <li><a href="?api=Music" class="api-link has-text-link">DMCA Music</a></li>
                <li><a href="?api=Todo-list" class="api-link has-text-link">Todo list</a></li>
            </ul>
            <div class="api-info">
                <?php
                    if (isset($_GET['api'])) {
                        $api = $_GET['api'];
                        switch ($api) {
                            case 'Time':
                                echo "<p>This API provides the current time in various timezones.<br>";
                                echo "Usage is https://api.yourstreamingtools.com/time.php?timezone=Australia/Sydney&api=API_KEY<br><br>";
                                echo "The API employs identical functions to those found in PHP Timezone.<br>For a list of supported timezones, <a href='https://www.php.net/manual/en/timezones.php' target='_blank'>click here</a>";
                                echo "</p>";
                                break;
                            case 'Weather':
                                echo "<p>This API provides the current weather conditions for a given location.<br>";
                                echo "Usage is https://api.yourstreamingtools.com/weather.php?city=Sydney&api=API_KEY";
                                echo "</p>";
                                break;
                            case 'PublicQuotes':
                                echo "<p>This API provides you with a random quote from one of the following people:<br>";
                                echo "Dorothy Parker, Noel Coward, Winston Churchill, Eleanor Roosevelt, Harpo Marx, Dale Carnegie, Terry Pratchett & Blackadder<br><br>";
                                echo "Usage is <a href='https://api.yourstreamingtools.com/quotes.php' target='_blank'>https://api.yourstreamingtools.com/quotes.php</a>";
                                echo "</p>";
                                break;
                            case 'Music':
                                echo "While not strictly an API, we've developed a handy tool to enhance your streaming experience.<br><br>";
                                echo "It functions as a browser source that can be integrated into your streaming software. For instance, within OBS, you can add this as a source, and there's an option under settings for the VoD Audio Track.<br><br>";
                                echo "Essentially, when you visit this page, you'll find approximately 5 hours of music that automatically loops once the playlist concludes.<br><br>";
                                echo "For detailed instructions on how to utilize this feature, please visit <a href='https://music.yourstreamingtools.com/' target='_blank'>music.yourstreamingtools.com</a>.";
                                break;
                            case 'Todo-list':
                                echo "<p>This API allows users to create and manage todo lists.<br>";
                                echo "Check it out here: <a href='https://yourlist.online/' target='_blank'>YourList.Online</a>";
                                echo "</p>";
                                break;
                            default:
                                echo "<p>Please select an API above to view its information.</p>";
                        }
                    } else {
                        echo "<p>Please select an API above to view its information.</p>";
                    }
                ?>
            </div>
        </div>
    </section>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const $navbarBurgers = Array.prototype.slice.call(document.querySelectorAll('.navbar-burger'), 0);
            if ($navbarBurgers.length > 0) {
                $navbarBurgers.forEach(el => {
                    el.addEventListener('click', () => {
                        const target = el.dataset.target;
                        const $target = document.getElementById(target);
                        el.classList.toggle('is-active');
                        $target.classList.toggle('is-active');
                    });
                });
            }
        });
    </script>
</body>
</html>