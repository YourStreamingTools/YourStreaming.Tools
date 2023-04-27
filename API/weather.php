<?php
// Check if the API key is specified in the URL
if (isset($_GET['api'])) {
    // Retrieve the API key from the URL
    $api_key = $_GET['api'];
} else {
    // Return an error message if the API key is not specified in the URL
    echo "API key is required.";
    exit();
}

// Require database connection
require_once "db_connect.php";

// Check if the connection is successful
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Prepare the SQL statement to retrieve the channel name and username for the given API key
$stmt = $conn->prepare("SELECT channelname FROM allowed_users WHERE api_key = ?");
$stmt->bind_param("s", $api_key);

// Execute the SQL statement
$stmt->execute();

// Bind the result to variables
$stmt->bind_result($channelname);

// Fetch the result
$stmt->fetch();

// Close the statement
$stmt->close();

// Close the database connection
$conn->close();

// Check if the provided API key is valid and retrieve the channel name from the database
if (empty($channelname)) {
    // Return an error message if the API key is not valid
    echo "Invalid API key.";
    exit();
}

// Check if the units and city are specified in the URL
$units = $_GET['units'] ?? 'metric';
$city = $_GET['city'] ?? 'Sydney';

// API URL for the specified units and city
$url = "https://api.openweathermap.org/data/2.5/weather?q=" . urlencode($city) . "&units=$units&appid=(REDACTED)";

// Initialize CURL
$ch = curl_init();

// Set CURL options
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HEADER, false);

// Execute the CURL request
$jsonData = curl_exec($ch);

// Close the CURL session
curl_close($ch);

if (!$jsonData) {
    die("Unable to retrieve weather data.");
}

// Convert the JSON data into a PHP array
$data = json_decode($jsonData, true);

// Check if the API returned an error
if ($data['cod'] !== 200) {
    die("Unable to retrieve weather data.");
}

// Convert wind direction from degrees to textual representation
function getWindDirection($deg) {
    $cardinalDirections = array(
        'N' => array(337.5, 22.5),
        'NE' => array(22.5, 67.5),
        'E' => array(67.5, 112.5),
        'SE' => array(112.5, 157.5),
        'S' => array(157.5, 202.5),
        'SW' => array(202.5, 247.5),
        'W' => array(247.5, 292.5),
        'NW' => array(292.5, 337.5)
    );
    foreach ($cardinalDirections as $dir => $angles) {
        if ($deg >= $angles[0] && $deg < $angles[1]) {
            return $dir;
        }
    }
    return 'N/A';
}

// Extract the weather information from the API data
$description = $data['weather'][0]['description'];
$temperatureC = round($data['main']['temp'], 1) . '&deg;C';
$temperatureF = round($temperatureC * 9 / 5 + 32, 1) . '&deg;F';
$windSpeed = round($data['wind']['speed'] * 3.6, 1);
$windSpeedMPH = round($windSpeed / 1.609344, 2);
$windDirection = getWindDirection($data['wind']['deg']);
?>
The weather in <?php echo "{$data['name']}, {$data['sys']['country']}"; ?>: <?php echo $description; ?> with a temperature of <?php echo html_entity_decode($temperatureC); ?> (<?php echo html_entity_decode($temperatureF); ?>). Wind is blowing from the <?php echo $windDirection; ?> at <?php echo $windSpeed; ?>kph (<?php echo $windSpeedMPH; ?>mph) and the humidity is <?php echo $data['main']['humidity']; ?>%.