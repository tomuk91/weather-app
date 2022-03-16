<?php require_once '../private/init.php' ?>
<?php require_once '../private/api.php' ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="index.css">
    <title>Weather App</title>
</head>
<body>

<?php
$city = 'london';
$celsius = " °C";

if (isset($_GET['searchCity'])) {
    $city = $_GET['searchCity'];
}

include(SHARED_PATH . '/background.php')

?>

<?php $weather = getWeatherData($city);
var_dump($weather); ?>

<div class="weather-container">
    <div class="title">
        <h1><?php echo $weather["sys"]["country"] . " " . $weather["name"] ?></h1>
        &nbsp
        <h1 class="temp"><?php echo $weather["main"]["temp"] . $celsius ?></h1>
    </div>
    <div class="description">
        <h2><?php echo ucfirst($weather["weather"]['0']["description"]) . " with a real feel of" . " " .
                "<span class='temp'>" . $weather["main"]["feels_like"] . $celsius . "</span>" ?>
        </h2>
    </div>
    <div class="stats">
        <div class="minmax">
            <h3>Min: <?php echo $weather["main"]["temp_min"] . $celsius ?></h3>
            <h3>Max: <?php echo $weather["main"]["temp_max"] . $celsius ?></h3>
            <h3>Wind: <?php echo $weather["wind"]["speed"] ?></h3>

        </div>
        <div class="extrastats">
        </div>

    </div>
</div>

<form id="form">
    <input type="search" id="query" name="searchCity" placeholder="Enter a city...">
    <button>
        <svg viewBox="0 0 1024 1024">
            <path class="path1"
                  d="M848.471 928l-263.059-263.059c-48.941 36.706-110.118 55.059-177.412 55.059-171.294 0-312-140.706-312-312s140.706-312 312-312c171.294 0 312 140.706 312 312 0 67.294-24.471 128.471-55.059 177.412l263.059 263.059-79.529 79.529zM189.623 408.078c0 121.364 97.091 218.455 218.455 218.455s218.455-97.091 218.455-218.455c0-121.364-103.159-218.455-218.455-218.455-121.364 0-218.455 97.091-218.455 218.455z"></path>
        </svg>
    </button>
</form>

</body>
</html>