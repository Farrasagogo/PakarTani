@extends('layouts.app')

@section('background-styles')
style="background-image: url('{{ asset('image/elaine-casap-qgHGDbbSNm8-unsplash.jpg') }}'); background-size: cover; background-position: top;"
@endsection

@section('content')
<div class="container-fluid my-5 p-4">
    <div class="row justify-content-center m-4">
        <div class="search-container">
            <span class="search-icon"><i class="fas fa-search"></i></span>
            <input type="text" id="locationInput" placeholder="Search..." />
            <span class="arrow-icon" id="searchButton"><i class="fas fa-arrow-right"></i></span>
        </div>
    </div>
    <div class="row justify-content-center m-4">
        <div class="weather-card" id="weatherCard" style="display: none;">
            <img id="weatherIcon" src="" alt="Weather Icon" class="weather-icon" />
            <div class="weather-info">
                <div class="temperature" id="temperature"></div>
                <div class="description" id="description"></div>
                <div class="location" id="location"></div>
            </div>
        </div>
    </div>
</div>
<br>
<br>
<br>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        fetchWeather('Jakarta');  
    });

    document.getElementById('searchButton').addEventListener('click', function() {
        let location = document.getElementById('locationInput').value.trim();
        if (location) {
            fetchWeather(location);
        } else {
            fetchWeather('Jakarta'); // Default location
        }
    });

    function fetchWeather(location) {
        const url = `api/weather/${encodeURIComponent(location)}`;

        $.ajax({
            url: url,
            type: 'GET',
            headers: {
                    'Authorization': 'Bearer ' + token,
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                },
            success: function(data) {
                if (data.error) {
                    alert(data.error);
                } else {
                    $('#weatherCard').show();
                    $('#weatherIcon').attr('src', `http://openweathermap.org/img/wn/${data.weather[0].icon}.png`);
                    $('#temperature').text(`${data.main.temp}°C`);
                    $('#description').text(data.weather[0].description);
                    $('#location').text(`${data.name}, ${data.sys.country}`);
                }
            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.error('Error fetching weather data:', errorThrown);
                alert('Could not fetch weather data');
            }
        });
    }
</script>
@endsection
