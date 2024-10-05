@extends('layouts.app')

@section('title', 'Konferencijų sąrašas')

@section('content')
    <h1>Konferencijų sąrašas</h1>
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <a href="{{ route('conferences.create') }}" class="btn btn-primary">Sukurti naują konferenciją</a>
    <table class="table">
        <thead>
        <tr>
            <th>Pavadinimas</th>
            <th>Aprašymas</th>
            <th>Data ir laikas</th>
            <th>Vieta</th>
            <th>Veiksmai</th> <!-- Pridėkite šią eilutę, kad būtų vietos veiksmo mygtukams -->
        </tr>
        </thead>
        <tbody>
        @foreach ($conferences as $index => $conference)
            <tr>
                <td><a href="{{ route('conferences.show', $index) }}">{{ $conference['title'] }}</a></td>
                <td>{{ $conference['description'] }}</td>
                <td>{{ \Carbon\Carbon::parse($conference['date_time'])->format('Y-m-d H:i') }}</td>
                <td>{{ $conference['location'] }}</td>
                <td>
                    <a href="{{ route('conferences.edit', $index) }}" class="btn btn-warning">Redaguoti</a>
                    <a href="{{ route('conferences.show', $index) }}" class="btn btn-info">Peržiūrėti</a>
                    <form action="{{ route('conferences.destroy', $index) }}" method="POST" onsubmit="return confirm('Ar tikrai norite ištrinti šią konferenciją?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Ištrinti</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
