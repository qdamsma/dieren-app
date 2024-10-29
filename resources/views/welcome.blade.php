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
                <a href='{{ route('contacts.index') }}' class="navlink">
                    <b class="linktext">Login voorlopig</b>
                </a>
            </li>
        </ul>
    </nav>
    <header class="intro">
        <h1>Welkom bij passenopjedier.nl</h1>
        <p class="kopje">
            <strong>DE</strong> website als het gaat om oppassen op dieren. Zoekt u een oppasser voor uw dier 
            of wilt u oppassen op iemand anders zijn/haar dier? 
            Dan kunt u dat regelen via deze site!
        </p>
    </header>
</body>
</html>