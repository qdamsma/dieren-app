<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/huisdierenprofiel.css') }}">
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
    <div class="button-container">
        <button type="button" onclick="window.history.back()" class="button">Terug</button>
    </div>
    <form method="POST" action="{{ route('huisdieren.store') }}" class="form-container">
        @csrf

        <div>
            <label for="name">Naam</label>
            <input id="name" type="text" name="name" value="{{ old('name') }}" required>
            @error('name') <span class="error">{{ $message }}</span> @enderror
        </div>

        <div>
            <label for="age">Leeftijd</label>
            <input id="age" type="text" name="age" value="{{ old('age') }}" required>
            @error('age') <span class="error">{{ $message }}</span> @enderror
        </div>

        <div>
            <label for="animaltype">Soort dier</label>
            <input id="animaltype" type="text" name="animaltype" value="{{ old('animaltype') }}" required>
            @error('animaltype') <span class="error">{{ $message }}</span> @enderror
        </div>

        <div>
            <label for="note">Beschrijving</label>
            <textarea id="note" name="note">{{ old('note') }}</textarea>
            @error('note') <span class="error">{{ $message }}</span> @enderror
        </div>

        <button type="submit" class="button">Maak Huisdier aan</button>
    </form>

    @if (session('success'))
    <div class="succes-container">
        <div class="success">
            {{ session('success') }}
        </div>
    </div>
    @endif
</body>

</html>