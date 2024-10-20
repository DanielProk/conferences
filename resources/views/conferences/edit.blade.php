@extends('layouts.app')

@section('title', 'Redaguoti konferenciją')

@section('content')
    <h1>Redaguoti konferenciją</h1>

    <form action="{{ route('conferences.update', $conference->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="title">Pavadinimas</label>
            <input type="text" name="title" id="title" class="form-control" value="{{ $conference->title }}" required>
        </div>

        <div class="form-group">
            <label for="description">Aprašymas</label>
            <textarea name="description" id="description" class="form-control" required>{{ $conference->description }}</textarea>
        </div>

        <div class="form-group">
            <label for="date_time">Data ir laikas</label>
            <input type="datetime-local" name="date_time" id="date_time" class="form-control" value="{{ \Carbon\Carbon::parse($conference->date_time)->format('Y-m-d\TH:i') }}" required>
        </div>

        <div class="form-group">
            <label for="location">Vieta</label>
            <input type="text" name="location" id="location" class="form-control" value="{{ $conference->location }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Atnaujinti konferenciją</button>
    </form>
@endsection
