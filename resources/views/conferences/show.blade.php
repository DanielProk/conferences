@extends('layouts.app')

@section('title', 'Konferencijos peržiūra')

@section('content')
    <h1>{{ $conference['title'] }}</h1>
    <p>{{ $conference['description'] }}</p>
    <p>{{ $conference['date_time'] }}</p>
    <p>{{ $conference['location'] }}</p>
    <a href="{{ route('conferences.index') }}" class="btn btn-primary">Atgal į sąrašą</a>
@endsection
