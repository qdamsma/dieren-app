<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/welcomepage.css') }}">
    <title>Profiel Pagina</title>
</head>
<body>
    <nav class="navigatie">
        <ul class="navigatienav">
            <li class="navlogo">
                <img src="{{ asset('images/Logo.png') }}" alt="Logo" class="logo-image">
            </li>
            <li class="navitem">
                @if (Route::has('login'))
                    <div>
                        @auth
                            <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                                @csrf
                                <button type="submit" class="button">Logout</button>
                            </form>
                        @else
                            <a href="{{ route('login') }}">Log in</a>

                            @if (Route::has('register'))
                                <a href="{{ route('register') }}">Register</a>
                            @endif
                        @endauth
                    </div>
                @endif
            </li>
        </ul>
    </nav>

    <header class="intro">
        <h1>Profiel Informatie</h1>
        <p class="kopje">
            <strong>Hier kun je de gegevens van je profiel zien en bewerken!</strong>
        </p>
    </header>

    <div class="container">
        <div class="box1">
            <div>
                <h2>Naam</h2>
                <p>{{ $user->firstname }} {{ $user->lastname }}</p>
            </div>

            <div>
                <h2>Gebruikersnaam</h2>
                <p>{{ $user->username }}</p>
            </div>

            <div>
                <h2>E-mail</h2>
                <p>{{ $user->email }}</p>
            </div>
            <a href="{{ route('profile.edit') }}">
                <button type="button" class="button">Bewerk</button>
            </a>
        </div>
        <div class="pet-container">
            @foreach ($huisdieren as $huisdier)
                <div class="pet-card">
                    <h3>{{ $huisdier->name }}</h3>
                    <p>{{ $huisdier->age }}</p>
                </div>
            @endforeach
        </div>
        <div class="pet-container">
            @foreach ($huizen as $huis)
                <div class="pet-card">
                    <p><strong>Adres:</strong> {{ $huis->address }}</p>
                    <p><strong>Stad:</strong> {{ $huis->city }}</p>
                    <img src="{{ Storage::url($huis->picture_house) }}" alt="Foto van het huis" class="house-image">
                </div>
            @endforeach
        </div>
        

        <div class="button-container">
            <a href="{{ route('dashboard') }}" class="button">Terug naar Dashboard</a>
        </div>
    </div>
</body>
</html>