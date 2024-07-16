<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>YourStreamingTools</title>
    <link rel="icon" href="https://cdn.yourstreamingtools.com/img/logo.ico" type="image/png" />
    <link rel="apple-touch-icon" href="https://cdn.yourstreamingtools.com/img/logo.ico">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@1.0.0/css/bulma.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
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
            cursor: pointer;
        }
    </style>
</head>
<body>
    <nav class="navbar is-dark">
        <div class="navbar-brand">
            <a class="navbar-item" href="../"><img src="https://cdn.yourstreamingtools.com/img/logo.ico" alt="Logo"> YourStreamingTools</a>
            <div class="navbar-burger burger" data-target="navbarMenu">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </div>
        <div id="navbarMenu" class="navbar-menu">
            <div class="navbar-start"></div>
        </div>
    </nav>
    <section class="section">
        <div class="container content">
            <div class="notification is-warning">
                We kindly remind you that access to our server requires a pre-generated API key.<br>
                <strong>Note:</strong><br>Registration is closed for new API Keys because we are currently working on a new website.<br>Any keys that have been generated will continue to work until the new system is in place.
            </div>
            <p class="has-text-white">We're currently supporting the following APIs:</p>
            <p><span class="api-link has-text-link" data-target="#timeModal">Time</span></p>
            <p><span class="api-link has-text-link" data-target="#weatherModal">Weather</span></p>
            <p><span class="api-link has-text-link" data-target="#quotesModal">Public Quotes</span></p>
            <p><span class="api-link has-text-link" data-target="#musicModal">DMCA Music</span></p>
            <p><span class="api-link has-text-link" data-target="#todoModal">Todo list</span></p>
        </div>
    </section>

    <!-- Time Modal -->
    <div class="modal" id="timeModal">
        <div class="modal-background"></div>
        <div class="modal-card">
            <header class="modal-card-head">
                <p class="modal-card-title">Time API</p>
                <button class="delete" aria-label="close"></button>
            </header>
            <section class="modal-card-body">
                <p>This API provides the current time in various timezones.<br>
                Usage is https://api.yourstreamingtools.com/time.php?timezone=Australia/Sydney&api=API_KEY<br><br>
                The API employs identical functions to those found in PHP Timezone.<br>For a list of supported timezones, <a href='https://www.php.net/manual/en/timezones.php' target='_blank'>click here</a></p>
            </section>
            <footer class="modal-card-foot">
                <button class="button is-primary">Close</button>
            </footer>
        </div>
    </div>

    <!-- Weather Modal -->
    <div class="modal" id="weatherModal">
        <div class="modal-background"></div>
        <div class="modal-card">
            <header class="modal-card-head">
                <p class="modal-card-title">Weather API</p>
                <button class="delete" aria-label="close"></button>
            </header>
            <section class="modal-card-body">
                <p>This API provides the current weather conditions for a given location.<br>
                Usage is https://api.yourstreamingtools.com/weather.php?city=Sydney&api=API_KEY</p>
            </section>
            <footer class="modal-card-foot">
                <button class="button is-primary">Close</button>
            </footer>
        </div>
    </div>

    <!-- Public Quotes Modal -->
    <div class="modal" id="quotesModal">
        <div class="modal-background"></div>
        <div class="modal-card">
            <header class="modal-card-head">
                <p class="modal-card-title">Public Quotes API</p>
                <button class="delete" aria-label="close"></button>
            </header>
            <section class="modal-card-body">
                <p>This API provides you with a random quote from one of the following people:<br>
                Dorothy Parker, Noel Coward, Winston Churchill, Eleanor Roosevelt, Harpo Marx, Dale Carnegie, Terry Pratchett & Blackadder<br><br>
                Usage is <a href='https://api.yourstreamingtools.com/quotes.php' target='_blank'>https://api.yourstreamingtools.com/quotes.php</a></p>
            </section>
            <footer class="modal-card-foot">
                <button class="button is-primary">Close</button>
            </footer>
        </div>
    </div>

    <!-- Music Modal -->
    <div class="modal" id="musicModal">
        <div class="modal-background"></div>
        <div class="modal-card">
            <header class="modal-card-head">
                <p class="modal-card-title">DMCA Music Tool</p>
                <button class="delete" aria-label="close"></button>
            </header>
            <section class="modal-card-body">
                <p>While not strictly an API, we've developed a handy tool to enhance your streaming experience.<br><br>
                It functions as a browser source that can be integrated into your streaming software. For instance, within OBS, you can add this as a source, and there's an option under settings for the VoD Audio Track.<br><br>
                Essentially, when you visit this page, you'll find approximately 5 hours of music that automatically loops once the playlist concludes.<br><br>
                For detailed instructions on how to utilize this feature, please visit <a href='https://music.yourstreamingtools.com/' target='_blank'>music.yourstreamingtools.com</a>.</p>
            </section>
            <footer class="modal-card-foot">
                <button class="button is-primary">Close</button>
            </footer>
        </div>
    </div>

    <!-- Todo List Modal -->
    <div class="modal" id="todoModal">
        <div class="modal-background"></div>
        <div class="modal-card">
            <header class="modal-card-head">
                <p class="modal-card-title">Todo List API</p>
                <button class="delete" aria-label="close"></button>
            </header>
            <section class="modal-card-body">
                <p>This API allows users to create and manage todo lists.<br>
                Check it out here: <a href='https://yourlistonline.com.au/' target='_blank'>YourListOnline</a></p>
                <p class="has-text-grey-light"><em>Note: The Todo List functionality will be moved over to our new Twitch Chat Bot and System at <a href="https://botofthespecter.com/" target="_blank">https://botofthespecter.com/</a>.</em></p>
            </section>
            <footer class="modal-card-foot">
                <button class="button is-primary">Close</button>
            </footer>
        </div>
    </div>

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

            const $modals = Array.prototype.slice.call(document.querySelectorAll('.modal'), 0);
            const $modalButtons = Array.prototype.slice.call(document.querySelectorAll('.api-link'), 0);
            const $modalCloses = Array.prototype.slice.call(document.querySelectorAll('.delete, .modal-background, .modal-card-foot .button'), 0);

            if ($modalButtons.length > 0) {
                $modalButtons.forEach(el => {
                    el.addEventListener('click', () => {
                        const target = el.dataset.target;
                        const $target = document.querySelector(target);
                        $target.classList.add('is-active');
                    });
                });
            }

            if ($modalCloses.length > 0) {
                $modalCloses.forEach(el => {
                    el.addEventListener('click', () => {
                        $modals.forEach(modal => {
                            modal.classList.remove('is-active');
                        });
                    });
                });
            }
        });
    </script>
</body>
</html>