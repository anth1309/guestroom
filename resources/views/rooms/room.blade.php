@extends('base')

@section('content')
    <div class="container bg-div">

        @if ($room)
            <h2>Détails de la chambre {{ $room->name }}</h2>

            <p>Description : {{ $room->description }}</p>
            <p>Capacité : {{ $room->capacity }}, plus un lit bébé sur demandée</p>
            <p>Prix de la nuitée la semaine : {{ $room->weekly_price }} Xpf</p>
            <p>Prix de la nuitée le week-end : {{ $room->weekend_price }} Xpf</p>
            <br>
            <p>Pour rappel nous sommes fermé le lundi</p>
            <a href="{{ route('reservation.create', ['roomId' => $room->id, 'roomName' => $room->name]) }}"
                class="btn mt-2 mb-2 background text">Réserver</a>
        @else
            <p>La chambre demandée n'existe pas.</p>
        @endif
    </div>
@endsection
