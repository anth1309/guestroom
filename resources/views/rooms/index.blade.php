@extends('base')

@section('content')
    <div class="container bg-div">
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        @auth
            <p>Bienvenue, {{ Auth::user()->name }}!</p>
        @endauth
        <h1>Toutes les chambres</h1>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">id</th>
                    <th scope="col">Nom de la chambre</th>
                    <th scope="col"></th>

                </tr>
            </thead>
            <tbody>
                @foreach ($rooms as $room)
                    <tr>
                        <th scope="row">{{ $room->id }}</th>
                        <td>{{ $room->name }}</td>
                        <td><a href="{{ route('rooms.show', $room->id) }}">Voir</a></td>

                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
