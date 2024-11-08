<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/welcomepage.css') }}">
    <link rel="stylesheet" href="{{ asset('css/editprofiel.css') }}">
    <title>Document</title>
</head>
<body>
    <div class="navigatie">
        <ul class="navigatienav">
            <li class="navlogo">
                <img src="{{ asset('images/Logo.png') }}" alt="Logo" class="logo-image">
            </li>
            <li class="navitem">
                @auth
                    <a href="{{ route('profile.edit') }}" class="button">Bekijk profiel</a>
                    <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                        @csrf
                        <button type="submit" class="button">Logout</button>
                    </form>
                @else
                    <a href="{{ route('login') }}" class="font-semibold text-gray-600 hover:text-gray-900">Log in</a>
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="ml-4 font-semibold text-gray-600 hover:text-gray-900">Register</a>
                    @endif
                @endauth
            </li>
        </ul>
    </div>
    <div class="editbutton-container">
        <a href="{{ route('profile.show') }}">
            <button type="button" class="button">Terug</button>
        </a>
    </div>

    <div class="intro">
        <div class="container">
            <div>
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
                    <div class="box1">
                        <div class="binnen-box">
                            @include('profile.partials.update-profile-information-form')
                        </div>
                    </div>

                    <div class="box2">
                        <div class="binnen-box">
                            @include('profile.partials.update-password-form')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
