@extends('layouts.app')

@section('content')
    <div class="container my-5">
        <h1 class="mb-4 text-center">Conference List</h1>

        <div class="table-responsive">
            <table class="table table-bordered table-striped">
                <thead class="table-dark">
                <tr>
                    <th>Pavadinimas</th>
                    <th>Aprašymas</th>
                    <th>Data ir laikas</th>
                    <th>Vieta</th>
                    <th>Veiksmai</th>
                </tr>
                </thead>
                <tbody>
                @foreach($conferences as $conference)
                    <tr>
                        <td>{{ $conference->title }}</td>
                        <td>{{ $conference->description }}</td>
                        <td>{{ \Carbon\Carbon::parse($conference->date_time)->format('Y-m-d H:i') }}</td>
                        <td>{{ $conference->location }}</td>
                        <td>
                            <div class="btn-group">
                                <a href="{{ route('conferences.edit', $conference->id) }}" class="btn btn-warning">Redaguoti</a>
                                <a href="{{ route('conferences.show', $conference->id) }}" class="btn btn-info">Peržiūrėti</a>

                                <form action="{{ route('conferences.destroy', $conference->id) }}" method="POST" style="display: inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Ištrinti</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        <a href="{{ route('conferences.create') }}" class="btn btn-success my-3">Sukurti naują konferenciją</a>
    </div>
@endsection
