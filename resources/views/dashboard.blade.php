<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/welcomepage.css') }}">
    <title>Document</title>
</head>
<body>
    <nav class="navigatie">
        <ul class="navigatienav">
            <li class="navlogo">
                <img src="{{ asset('images/Logo.png') }}" alt="Logo" class="logo-image">
            </li>
            <li class="navitem">
                @if (Route::has('login'))
                <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right">
                    @auth
                        <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                            @csrf
                            <button type="submit" class="button">Logout</button>
                        </form>
                        <a href="{{ route('profile.show') }}" class="button">
                            Bekijk profiel
                            <img src="{{ asset('images/profile icon.png') }}" alt="Logo" class="profile-image">
                        </a>
                    @else
                        <a href="{{ route('login') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Log in</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Register</a>
                        @endif
                    @endauth
                </div>
            @endif
            </li>
        </ul>
    </nav>
    <header class="intro">
        <div class="afspraak-container">
            <div class="cards-wrapper">
                <div class="card">
                    <h3>Stap 1: Maak een profiel voor je huisdier</h3>
                    <p>Maak eenvoudig een profiel aan voor je huisdier en beheer de afspraken.</p>
                    <a href="{{ route('huisdieren.create') }}" class="button">Nieuw profiel aanmaken</a>
                </div>
                <div class="card">
                    <h3>Stap 2: Maak een Huis aan</h3>
                    <p>Maak een huis aan waar er opgepast gaat worden op je huidier</p>
                    <a href="{{ route('huis.create') }}" class="button">Nieuwe huis maken</a>
                </div>
                <div class="card">
                    <h3>Stap 3: Maak een nieuwe afspraak</h3>
                    <p>Plan een nieuwe afspraak voor je huisdier en kies een datum en tijd.</p>
                    <a href="{{ route('afspraak.create') }}" class="button">Nieuwe afspraak maken</a>
                </div>
            </div>
            <h2>Afspraken</h2>
            @if($afspraken->isEmpty())
                <p>Er zijn momenteel geen afspraken.</p>
            @else
                <div class="cards-container">
                    @foreach($afspraken as $afspraak)
                        <div class="card">
                            <a href="{{ route('afspraak.show', $afspraak->id) }}" class="button"> details</a>
                            <h3>{{ $afspraak->huisdier->name }}</h3>
                            <p>{{ $afspraak->huisdier->animaltype }}</p>
                            <p><strong>Startdatum:</strong> {{ $afspraak->start_datum }}</p>
                            <p><strong>Einddatum:</strong> {{ $afspraak->eind_datum }}</p>
                            <p><strong>Uurtarief:</strong> €{{ $afspraak->uurtarief }}</p>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </header>
</body>
</html>