<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        {{-- <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet"> --}}
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">

        <!-- Styles W3 with Metro colors scheme-->
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
        <link rel="stylesheet" href="https://www.w3schools.com/lib/w3-colors-metro.css">
        <link rel="stylesheet" href={{ asset('../css/app.css') }}>
    </head>
    <body class="antialiased">
        <div class="w3-bar w3-light-grey">
            @if (Route::has('login'))
                <div class="w3-right">
                    @auth
                        <a href="{{ url('/home') }}" class="w3-bar-item w3-button">Home</a>
                    @else
                        <a href="{{ route('login') }}" class="w3-bar-item w3-button">Log in</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="w3-bar-item w3-button">Register</a>
                        @endif
                    @endauth
                </div>
            @endif
        </div>
        <div class="w3-clear"></div>
        <div class="w3-panel w3-metro-dark-green w3-card-4 w3-center">
            <h1>Baza próbek zwilżalności</h1>
            <p>Prototyp</p>
        </div>
    </body>
</html>
