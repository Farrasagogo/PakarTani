<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class WeatherController extends Controller
{
    public function fetchWeather($location)
    {
        $apiKey = '3ba66a0becc007620c72f67d2c5c8bc1';
        $url = "https://api.openweathermap.org/data/2.5/weather?q={$location}&appid={$apiKey}&units=metric";

        $response = Http::get($url);

        if ($response->successful()) {
            return $response->json();
        } else {
            return response()->json(['error' => 'Could not fetch weather data'], 500);
        }
    }
}