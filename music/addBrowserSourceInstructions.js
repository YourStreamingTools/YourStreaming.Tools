
function addBrowserSource() {
    // Instructions for adding the music source to streaming software
    var instructions = document.createElement("div");
    instructions.innerHTML = "<h3>How to Add DMCA-free Music to Your Stream</h3>" +
                             "<ol>" +
                             "<li>Navigate to your streaming software and locate the option to add a new source. Select 'Browser' as the source type.</li>" +
                             "<li>In the URL field, enter <code>https://music.yourstreamingtools.com/obs.php</code>.</li>" +
                             "<li>Within the audio settings of the browser source, choose ONLY 'Track 2' for your audio output. This will ensure the music plays for VODs only, keeping your live stream free of background music.</li>" +
                             "<li>Adjust the volume and other settings as needed to integrate the music smoothly into your stream.</li>" +
                             "</ol>" +
                             "<p>This setup will allow you to play DMCA-free music during your VODs, enhancing the viewing experience without risking copyright infringement.</p>";

    // Apply some CSS styles to the instructions container
    instructions.style.position = "fixed";
    instructions.style.top = "50%";
    instructions.style.left = "50%";
    instructions.style.transform = "translate(-50%, -50%)";
    instructions.style.width = "auto";
    instructions.style.maxWidth = "600px";
    instructions.style.padding = "20px";
    instructions.style.backgroundColor = "#121212";
    instructions.style.borderRadius = "5px";
    instructions.style.boxShadow = "0 0 10px rgba(0, 0, 0, 0.5)";
    instructions.style.zIndex = "10000";
    instructions.style.fontSize = "16px";

    // Create a close button for the instructions container
    var closeButton = document.createElement("button");
    closeButton.innerHTML = "Close";
    closeButton.style.marginTop = "20px";
    closeButton.style.padding = "10px 15px";
    closeButton.style.backgroundColor = "#007bff";
    closeButton.style.color = "#121212";
    closeButton.style.borderRadius = "5px";
    closeButton.style.border = "none";
    closeButton.style.cursor = "pointer";

    // Add the close button to the instructions element
    instructions.appendChild(closeButton);

    // Add an event listener to the close button to remove the instructions when clicked
    closeButton.addEventListener("click", function() {
        instructions.parentNode.removeChild(instructions);
    });

    // Add the instructions element to the body of the HTML document
    document.body.appendChild(instructions);
}
