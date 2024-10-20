@extends('layouts.app')

@section('content')
    <div class="container my-5">
        <h1 class="mb-4 text-center">Konferencijų sąrašas</h1>

        <h2 class="mb-4">Būsimų konferencijų sąrašas</h2>
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
                @forelse($upcomingConferences as $conference)
                    <tr>
                        <td>{{ $conference->title }}</td>
                        <td>{{ $conference->description }}</td>
                        <td>{{ \Carbon\Carbon::parse($conference->date_time)->format('Y-m-d H:i') }}</td>
                        <td>{{ $conference->location }}</td>
                        <td>
                            <div class="btn-group">
                                @if(auth()->user()->role === 'admin')
                                    <a href="{{ route('conferences.edit', $conference->id) }}" class="btn btn-warning">Redaguoti</a>
                                    <form action="{{ route('conferences.destroy', $conference->id) }}" method="POST" style="display: inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Ištrinti</button>
                                    </form>
                                @elseif(auth()->user()->role === 'employee')
                                    <a href="{{ route('conferences.show', $conference->id) }}" class="btn btn-info">Peržiūrėti</a>
                                @elseif(auth()->user()->role === 'client')
                                    <form action="{{ route('conference.register', $conference->id) }}" method="POST" style="display: inline-block;">
                                        @csrf
                                        <button type="submit" class="btn btn-primary">Registruotis</button>
                                    </form>
                                @endif
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center">Nėra būsimų konferencijų.</td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>

        <h2 class="mb-4">Praeities konferencijų sąrašas</h2>
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
                @forelse($pastConferences as $conference)
                    <tr>
                        <td>{{ $conference->title }}</td>
                        <td>{{ $conference->description }}</td>
                        <td>{{ \Carbon\Carbon::parse($conference->date_time)->format('Y-m-d H:i') }}</td>
                        <td>{{ $conference->location }}</td>
                        <td>
                            <div class="btn-group">
                                @if(auth()->user()->role === 'admin')
                                    <a href="{{ route('conferences.edit', $conference->id) }}" class="btn btn-warning">Redaguoti</a>
                                    <form action="{{ route('conferences.destroy', $conference->id) }}" method="POST" style="display: inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Ištrinti</button>
                                    </form>
                                @elseif(auth()->user()->role === 'employee')
                                    <a href="{{ route('conferences.show', $conference->id) }}" class="btn btn-info">Peržiūrėti</a>
                                @endif
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center">Nėra praeities konferencijų.</td>
                    </tr>
                @endforelse
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

        @if(auth()->user()->role === 'admin')
            <a href="{{ route('conferences.create') }}" class="btn btn-success my-3">Sukurti naują konferenciją</a>
        @endif
    </div>
@endsection
