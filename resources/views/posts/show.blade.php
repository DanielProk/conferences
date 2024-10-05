@extends('app')

@section('title', $post['title'])

@section('content')
    <h1>{{ $post['title'] }}</h1>
    <p>{{ $post['content'] }}</p>
    <p><small>Paskelbta: {{ $post['created_at'] }}</small></p>
@endsection
