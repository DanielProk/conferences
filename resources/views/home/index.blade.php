@extends('layouts.app')

@section('content')
    <div class="container my-5">
        <h1 class="mb-4 text-center">Conference List</h1>

        <!-- Table for displaying conferences -->
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
                        <td>{{ $conference->date_time }}</td>
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

        <!-- Button to create new conference -->
        <a href="{{ route('conferences.create') }}" class="btn btn-success my-3">Sukurti naują konferenciją</a>
    </div>
@endsection
