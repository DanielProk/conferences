@extends('layouts.app')

@section('title', 'Konferencijos peržiūra')

@section('content')
    <h1>{{ $conference->title }}</h1>
    <p>{{ $conference->description }}</p>
    <p>{{ $conference->date_time }}</p>
    <p>{{ $conference->location }}</p>

{{--    <form action="{{ route('conference.register', $conference->id) }}" method="POST">--}}
{{--        @csrf--}}
{{--        <button type="submit" class="btn btn-primary">Registruotis į konferenciją</button>--}}
{{--    </form>--}}

    <a href="{{ route('conferences.index') }}" class="btn btn-primary">Atgal į sąrašą</a>

    <h2>Užsiregistravę dalyviai</h2>
    <ul>
        @foreach($conference->users as $user)
            <li>{{ $user->name }}</li>
        @endforeach
    </ul>
@endsection
