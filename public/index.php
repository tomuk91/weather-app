<?php require_once '../private/init.php' ?>
<?php require_once '../private/api.php' ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="index.css">
    <link rel="stylesheet" href="../node_modules/bootstrap/dist/css/bootstrap.min.css">
    <title>Weather App</title>
</head>
<body>

<?php
$city = 'london';
$celsius = " °C";

if (isset($_GET['searchCity']))
{
	$city = $_GET['searchCity'];
}

include SHARED_PATH . '/background.php';
include SHARED_PATH . '/nav.php';

?>

<?php $weather = getWeatherData($city); ?>
<?php $dailyWeather = dailyWeatherData($city); ?>


<div class="container banner">
    <div class="row">
        <div class="col-md-4">
            <div class="weather-image">
                <img src="http://openweathermap.org/img/wn/<?php echo $weather["weather"]["0"]["icon"] ?>@2x.png">
            </div>
        </div>
        <div class="col-md-8">
            <div class="title">
                <h1><?php echo $weather["sys"]["country"] . " " . $weather["name"] ?></h1>
                &nbsp
                <h1 class="temp"><?php echo $weather["main"]["temp"] . $celsius ?></h1>
            </div>
            <div class="description">
                <h2><?php echo ucfirst($weather["weather"]['0']["description"]) . " with a real feel of" . " " . "<span class='temp'>" . $weather["main"]["feels_like"] . $celsius . "</span>" ?>
                </h2>
            </div>
            <div class="stats">
                <h6><span class="stats-title">Humidity:</span> <?php echo $weather["main"]["humidity"] . "%" ?>
                </h6>
                <h6><span class="stats-title mx-1">Wind:</span><?php echo $weather["wind"]["speed"] . "MPH" ?></h6>
                <h6><span class="stats-title mx-1">Pressure:</span><?php echo $weather["main"]["pressure"] . "hPa" ?>
                </h6>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="col-md-12 d-flex justify-content-evenly mx-1">
		<?php foreach ($dailyWeather["list"] as $weatherKey => $weatherValue) { ?>
            <div class="card mx-1" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title"><?php echo date('l', $weatherValue["dt"]) ?></h5>
                    <h6 class="card-subtitle mb-2 text-muted"><?php echo $weatherValue["weather"]["0"]["description"] ?></h6>
                    <div class="daily-image">
                        <img src="http://openweathermap.org/img/wn/<?php echo $weatherValue["weather"]["0"]["icon"] ?>@2x.png">
                    </div>
                    <h6>Max: <?php echo $weatherValue["temp"]["max"] . $celsius ?></h6>
                    <h6>Min: <?php echo $weatherValue["temp"]["min"] . $celsius ?></h6>
                </div>
            </div>
		<?php } ?>
    </div>
</div>

</body>
</html>