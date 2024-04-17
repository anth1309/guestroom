@extends('base')

@section('content')
    <div class="container bg-div">
        @auth
            <p>Bienvenue, {{ Auth::user()->name }}!</p>
        @endauth
        <h1>Toutes les réservations</h1>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">id</th>
                    <th scope="col">Chambre</th>
                    <th scope="col">Date de début</th>
                    <th scope="col">Date de fin</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($reservations as $reservation)
                    <tr>
                        <th scope="row">{{ $reservation->id }}</th>
                        <td>{{ $reservation->room->name }}</td>
                        <td>{{ $reservation->start_date }}</td>
                        <td>{{ $reservation->end_date }}</td>
                        <td><a href="{{ route('reservations.show', $reservation->id) }}">Voir</a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
