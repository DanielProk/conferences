<?php
@extends('layouts.app')

@section('content')
    <div class="container my-5">
        <h1 class="mb-4 text-center">Vartotojų valdymas</h1>
        <div class="table-responsive">
            <table class="table table-bordered table-striped">
                <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Vardas</th>
                    <th>El. paštas</th>
                    <th>Rolė</th>
                    <th>Veiksmai</th>
                </tr>
                </thead>
                <tbody>
                @forelse($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->role }}</td>
                        <td>
                            <div class="btn-group">
                                <a href="{{ route('users.edit', $user->id) }}" class="btn btn-warning">Redaguoti</a>
                                <form action="{{ route('users.destroy', $user->id) }}" method="POST" style="display: inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Ištrinti</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center">Nėra vartotojų.</td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
