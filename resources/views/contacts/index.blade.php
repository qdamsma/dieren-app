<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <h1>Contact App</h1>
    <div>
        @forelse ($contacts as $id => $contact)
             <p>{{ $contact['name'] }} | {{ $contact['phone'] }} | <a href='{{ route('contacts.show', $id) }}'>Show contact</a></p>
             @empty
             <p>Geen contacten</p>
        @endforelse
    </div>
</body>

</html>
