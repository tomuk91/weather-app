<?php

require_once 'init.php';

function getWeatherData(string $city)
{
	$url = "https://api.openweathermap.org/data/2.5/weather?q=" . $city . "&appid=" . APIKey . "&units=metric";
	$curl = curl_init();

	curl_setopt($curl, CURLOPT_URL, $url);
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
	curl_setopt($curl, CURLOPT_HEADER, FALSE);

	$weather = curl_exec($curl);

	curl_close($curl);

	return json_decode($weather, TRUE);
}


function dailyWeatherData(string $city)
{

	$curl = curl_init();

	curl_setopt_array($curl, [
		CURLOPT_URL => "https://community-open-weather-map.p.rapidapi.com/forecast?q=" . $city . "&units=metric",
		CURLOPT_RETURNTRANSFER => TRUE,
		CURLOPT_FOLLOWLOCATION => TRUE,
		CURLOPT_ENCODING => "",
		CURLOPT_MAXREDIRS => 10,
		CURLOPT_TIMEOUT => 30,
		CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		CURLOPT_CUSTOMREQUEST => "GET",
		CURLOPT_HTTPHEADER => [
			"x-rapidapi-host: community-open-weather-map.p.rapidapi.com",
			"x-rapidapi-key: f3dbc9c5a2mshcc05cf4061f807bp1c12fajsn21f968aa0a9d"
		],
	]);

	$response = curl_exec($curl);
	$err = curl_error($curl);

	curl_close($curl);

}