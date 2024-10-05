@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Registracija</h1>

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div class="form-group">
                <label for="name">Vardas</label>
                <input type="text" class="form-control" id="name" name="name" required autofocus>
            </div>

            <div class="form-group">
                <label for="email">El. paštas</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>

            <div class="form-group">
                <label for="password">Slaptažodis</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>

            <div class="form-group">
                <label for="password_confirmation">Pakartokite slaptažodį</label>
                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required>
            </div>

            <div class="form-group">
                <label for="role">Vaidmuo:</label>
                <select name="role" required>
                    <option value="client">Klientas</option>
                    <option value="employee">Darbuotojas</option>
                    <option value="admin">Administratorius</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Registruotis</button>
        </form>
    </div>
@endsection
