@extends('layouts.app')

@section('title', $conference['title'])

@section('content')
    <h1>{{ $conference['title'] }}</h1>
    <p><strong>Aprašymas:</strong> {{ $conference['description'] }}</p>
    <p><strong>Data ir laikas:</strong> {{ $conference['date_time'] }}</p>
    <p><strong>Vieta:</strong> {{ $conference['location'] }}</p>
@endsection
