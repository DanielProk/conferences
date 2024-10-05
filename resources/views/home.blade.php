@extends('layouts.app')


@section('content')
    <h1>Welcome to the Home Page!</h1>
    @if (auth()->check())
        @if (auth()->user()->role === 'client')
            <h2>Kliento informacija</h2>
            <p>Matote planuojamas konferencijas.</p>
        @elseif (auth()->user()->role === 'employee')
            <h2>Darbuotojo informacija</h2>
            <p>Matote visų konferencijų sąrašą.</p>
        @elseif (auth()->user()->role === 'admin')
            <h2>Administratorius</h2>
            <p>Turite galimybę redaguoti konferencijas.</p>
        @endif
    @endif
@endsection
{{--    <!DOCTYPE html>--}}
{{--<html lang="en">--}}
{{--<head>--}}
{{--    <meta charset="UTF-8">--}}
{{--    <meta name="viewport" content="width=device-width, initial-scale=1.0">--}}
{{--    <title>Pagrindinis Puslapis</title>--}}
{{--</head>--}}
{{--<body>--}}
{{--<h1>Pagrindinis Puslapis</h1>--}}
{{--<p>Čia galite matyti informaciją apie konferencijas ir prisijungti kaip klientas, darbuotojas ar administratorius.</p>--}}
{{--</body>--}}
{{--</html>--}}
