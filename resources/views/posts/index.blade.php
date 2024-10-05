@extends('app')

@section('title', 'Straipsnių sąrašas')

@section('content')
    <h1>Straipsniu sarasas</h1>
    <ul>
        @foreach($posts as $post)
            <li>{{ $post['title'] }}</li>
        @endforeach
    </ul>
@endsection
