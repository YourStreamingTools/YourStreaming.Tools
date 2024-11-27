<?php
$musicDir = '/api_music/';
// Assuming the script is in the root, adjust the path as necessary
$musicPath = $_SERVER['DOCUMENT_ROOT'] . $musicDir;
$musicURL = 'https://' . $_SERVER['HTTP_HOST'] . $musicDir;

// Scan the music directory for MP3 files
$mp3Files = array_diff(scandir($musicPath), array('..', '.'));
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Playlist for OBS</title>
<style>
    body { font-family: Arial, sans-serif; margin: 0; padding: 10px; font-size: 12px; }
    #currentTrack { font-size: 14px; font-weight: bold; margin-bottom: 5px; }
    #audioPlayer { width: 100%; }
</style>
</head>
<body>

<div id="currentTrack"></div>
<audio id="audioPlayer" autoplay>
    <?php if(count($mp3Files) > 0): ?>
        <source src="<?= $musicURL . current($mp3Files) ?>" type="audio/mp3">
    <?php endif; ?>
</audio>

<script>
window.onload = function() {
    var audioPlayer = document.getElementById('audioPlayer');
    var currentTrackDisplay = document.getElementById('currentTrack');
    var musicURL = '<?= $musicURL ?>';
    var mp3Files = <?= json_encode(array_values($mp3Files)) ?>;
    var currentTrack = Math.floor(Math.random() * mp3Files.length);

    function updateCurrentTrack() {
        var trackName = mp3Files[currentTrack].replace('.mp3', '');
        currentTrackDisplay.textContent = "Now Playing: " + trackName;
        audioPlayer.src = musicURL + mp3Files[currentTrack];
        audioPlayer.play();
    }

    audioPlayer.addEventListener('ended', function() {
        currentTrack = (currentTrack + 1) % mp3Files.length;
        updateCurrentTrack();
    }, false);

    updateCurrentTrack(); // Initialize first track
};
</script>

</body>
</html>
