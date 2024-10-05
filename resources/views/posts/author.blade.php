@extends('app')

@section('title', 'Straipsnio Autorius')

@section('content')
    <h1>{{ $post['title'] }}</h1>
    <p>Autorius: {{ $post['author']['first_name'] }} {{ $post['author']['last_name'] }}</p>
@endsection
