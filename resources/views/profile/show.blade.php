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
                            <a href="{{ route('dashboard') }}" class="button">
                                Terug
                            </a>
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
        <p class="kopje">
            <strong>Huisdieren</strong>
        </p>
        <div class="pet-container">
            @foreach ($huisdieren as $huisdier)
                <div class="pet-card">
                    <h3>{{ $huisdier->name }}</h3>
                    <p>{{ $huisdier->age }}</p>
                </div>
            @endforeach
        </div>
        <p class="kopje">
            <strong>Huizen</strong>
        </p>
        <div class="pet-container">
            @foreach ($huizen as $huis)
                <div class="pet-card">
                    <img src="{{ asset('storage/' . $huis->picture_house) }}" alt="home image" class="img-card">
                    <p><strong>Adres:</strong> {{ $huis->address }}</p>
                    <p><strong>Stad:</strong> {{ $huis->city }}</p>
                </div>
            @endforeach
        </div>
        <p class="kopje">
            <strong>Afspraken</strong>
        </p>
        <div class="pet-container">
            @foreach ($afspraken as $afspraak)
                <div class="pet-card">
                    <p><strong>Huisdier:</strong> {{ $afspraak->huisdier->name }}</p>
                    <p><strong>Startdatum:</strong> {{ $afspraak->start_datum }}</p>
                    <p><strong>Einddatum:</strong> {{ $afspraak->eind_datum }}</p>
                    <p><strong>Status:</strong> {{ $afspraak->status }}</p>
                </div>
            @endforeach
        </div>
        
    </div>
</body>
</html>