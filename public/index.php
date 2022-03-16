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

<?php include(SHARED_PATH . '/background.php')?>

<?php
$weather = getWeatherData('london');
?>

<div class="weather-container">
    <div class="title">
        <h1><?php echo $weather["sys"]["country"] . " " . $weather["name"]?></h1>
    </div>
</div>
</body>
</html>