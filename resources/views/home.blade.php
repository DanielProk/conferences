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

