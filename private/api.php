<?php

require_once 'init.php';

function getWeatherData(string $city) {
    $url = "https://api.openweathermap.org/data/2.5/weather?q=" . $city  . "&appid=" . APIKey . "&units=metric";
    $curl = curl_init();

    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_HEADER, false);

    $weather = curl_exec($curl);

    curl_close($curl);

    return json_decode($weather, true);
}

