<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/welcomepage.css') }}">
    <title>Afspraak Details</title>
</head>
<body>
    <nav class="navigatie">
        <ul class="navigatienav">
            <li class="navlogo">
                <img src="{{ asset('images/Logo.png') }}" alt="Logo" class="logo-image">
            </li>
            <li class="navitem">
                @auth
                    <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                        @csrf
                        <button type="submit" class="button">Logout</button>
                    </form>
                    <a href="{{ route('profile.show') }}" class="button">Bekijk profiel</a>
                @else
                    <a href="{{ route('login') }}" class="button">Log in</a>
                @endauth
            </li>
        </ul>
    </nav>

    <header class="intro">
        <h1>Afspraak Details</h1>
    </header>

    <div class="container">
        <div class="card">
            <h3>{{ $afspraak->huisdier->name }}</h3>
            <p><strong>Huisdier Type:</strong> {{ $afspraak->huisdier->animaltype }}</p>
            <p><strong>Startdatum:</strong> {{ $afspraak->start_datum }}</p>
            <p><strong>Einddatum:</strong> {{ $afspraak->eind_datum }}</p>
            <p><strong>Uurtarief:</strong> €{{ $afspraak->uurtarief }}</p>
            <p><strong>Opmerkingen:</strong> {{ $afspraak->opmerkingen }}</p>
        </div>

        <div>
            <form action="{{ route('afspraak.accept', $afspraak->id) }}" method="POST">
                @csrf
                <button type="submit" class="button">Accepteer Afspraak</button>
            </form>
        </div>
        @if($afspraak->status === 'geaccepteerd')
    <div>
        <h3>Laat een review achter:</h3>
        <form action="{{ route('afspraak.storeReview', $afspraak->id) }}" method="POST">
            @csrf
            <div>
                <label for="review">Review:</label>
                <textarea id="review" name="review" rows="4" required></textarea>
            </div>

            <div>
                <label for="rating">Beoordeling:</label>
                <input type="number" name="rating" id="rating" min="1" max="5" value="5">
            </div>

            <button type="submit" class="button">Verstuur Review</button>
        </form>
    </div>
@endif
    </div>
</body>
</html>