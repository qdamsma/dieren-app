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
    <a href="{{ route('dashboard') }}">
        <button type="button" class="button">Terug</button>
    </a>
    <form method="POST" action="{{ route('huis.store') }}" enctype="multipart/form-data" class="form-container">
        @csrf
    
        <!-- Huis Gegevens -->
        <div>
            <label for="address">Adres van je huis</label>
            <input id="address" type="text" name="address" value="{{ old('address') }}" required>
            @error('address') <span class="error">{{ $message }}</span> @enderror
        </div>
    
        <div>
            <label for="city">Stad</label>
            <input id="city" type="text" name="city" value="{{ old('city') }}" required>
            @error('city') <span class="error">{{ $message }}</span> @enderror
        </div>
    
        <div>
            <label for="picture_house">Foto huis</label>
            <input id="picture_house" type="file" name="picture_house" required>
            @error('picture_house') <span class="error">{{ $message }}</span> @enderror
        </div>
    
        <button type="submit" class="button">Maak Huis aan</button>
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