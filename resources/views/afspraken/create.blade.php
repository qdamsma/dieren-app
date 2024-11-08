<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/welcomepage.css') }}">
    <title>Nieuwe Afspraak</title>
</head>
<body>
    <nav class="navigatie">
        <ul class="navigatienav">
            <li class="navlogo">
                <img src="{{ asset('images/Logo.png') }}" alt="Logo" class="logo-image">
            </li>
            <li class="navitem">
                <a href="{{ route('dashboard') }}" class="button">Terug</a>
            </li>
        </ul>
    </nav>

    <h2>Nieuwe Afspraak Maken</h2>

    <form method="POST" action="{{ route('afspraak.store') }}">
        @csrf

        <div>
            <label for="huisdier_id">Selecteer Huisdier</label>
            <select name="huisdier_id" id="huisdier_id" required>
                @foreach ($huisdieren as $huisdier)
                    <option value="{{ $huisdier->id }}">{{ $huisdier->name }}</option>
                @endforeach
            </select>
        </div>

        <div>
            <label for="huis_id">Selecteer Huis</label>
            <select name="huis_id" id="huis_id" required>
                @foreach ($huizen as $huis)
                    <option value="{{ $huis->id }}">{{ $huis->address }}</option>
                @endforeach
            </select>
        </div>

        <div>
            <label for="start_datum">Startdatum</label>
            <input type="date" id="start_datum" name="start_datum" required>
        </div>

        <div>
            <label for="eind_datum">Einddatum</label>
            <input type="date" id="eind_datum" name="eind_datum" required>
        </div>

        <div>
            <label for="tijd_start">Starttijd</label>
            <input type="time" id="tijd_start" name="tijd_start" required>
        </div>

        <div>
            <label for="tijd_eind">Eindtijd</label>
            <input type="time" id="tijd_eind" name="tijd_eind" required>
        </div>

        <div>
            <label for="uurtarief">Uurtarief</label>
            <input type="number" id="uurtarief" name="uurtarief" step="0.01" required>
        </div>

        <div>
            <label for="opmerkingen">Opmerkingen</label>
            <textarea id="opmerkingen" name="opmerkingen"></textarea>
        </div>

        <button type="submit">Afspraak Aanmaken</button>
    </form>

    @if(session('error'))
        <p class="error">{{ session('error') }}</p>
    @endif
</body>
</html>