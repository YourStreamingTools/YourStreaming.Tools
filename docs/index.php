<html>
    <head>
        <title>YourBotsOnline - Bot Docs</title>
  	    <link rel="icon" href="logo.png" type="image/png" />
  	    <link rel="apple-touch-icon" href="logo.png">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/css/all.min.css" integrity="sha256-2XFplPlrFClt0bIdPgpz8H7ojnk10H69xRqd9+uTShA=" crossorigin="anonymous" />
        <link rel="stylesheet" href="css/AdminLTE.dark.min.css" />
        <link rel="stylesheet" href="css/skin-purple.dark.min.css" />
        <link rel="stylesheet" href="css/pace.min.css" />
        <link rel="stylesheet" href="css/tables-alternating.dark.css" />
        <link rel="stylesheet" href="css/bootstrap.min.css" />
    </head>
<body>
<?php
require_once 'Parsedown.php'; // Include the Parsedown standalone file

// Function to read and display the Markdown file
function displayMarkdownFile($filename) {
    $parsedown = new Parsedown();

    // Read the content of the Markdown file
    $content = file_get_contents($filename);

    // Parse the Markdown content
    $html = $parsedown->text($content);

    // Display the parsed HTML content
    echo $html;
}

// Usage example
$filename = 'command_variables.md';
displayMarkdownFile($filename);
?>

</body>
</html>