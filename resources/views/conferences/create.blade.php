@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header bg-dark text-white">
                        <h4 class="mb-0">Sukurti naują konferenciją</h4>
                    </div>

                    <div class="card-body">
                        {{-- Klaidos pranešimų rodymas --}}
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form action="{{ route('conferences.store') }}" method="POST">
                            @csrf

                            <div class="form-group mb-3">
                                <label for="title">Pavadinimas</label>
                                <input type="text" name="title" id="title" class="form-control" placeholder="Įveskite pavadinimą" value="{{ old('title') }}" required>
                            </div>

                            <div class="form-group mb-3">
                                <label for="description">Aprašymas</label>
                                <textarea name="description" id="description" class="form-control" rows="3" placeholder="Įveskite aprašymą" required>{{ old('description') }}</textarea>
                            </div>

                            <div class="form-group mb-3">
                                <label for="date_time">Data ir laikas</label>
                                <input type="datetime-local" name="date_time" id="date_time" class="form-control" value="{{ old('date_time') }}" required>
                            </div>

                            <div class="form-group mb-3">
                                <label for="location">Vieta</label>
                                <input type="text" name="location" id="location" class="form-control" placeholder="Įveskite vietą" value="{{ old('location') }}" required>
                            </div>

                            <button type="submit" class="btn btn-dark">Išsaugoti konferenciją</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
