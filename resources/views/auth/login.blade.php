@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Prisijungimas</h1>
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="form-group">
                <label for="email">El. paštas</label>
                <input type="email" name="email" id="email" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="password">Slaptažodis</label>
                <input type="password" name="password" id="password" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Prisijungti</button>
        </form>
    </div>
@endsection
