@extends('base')

@section('content')
    <div class="container bg-div">
        @auth
            <p>Bienvenue, {{ Auth::user()->name }}!</p>
        @endauth
        <h1>Détails de la réservation</h1>
        <div>
            <p>ID : {{ $reservation->id }}</p>
            <p>Chambre : {{ $reservation->room->name }}</p>
            <p>Date de début : {{ $reservation->start_date }}</p>
            <p>Date de fin : {{ $reservation->end_date }}</p>
        </div>
        <div>
            <a href="{{ route('reservations.edit', $reservation->id) }}" class="btn btn-primary">Modifier</a>
            <form action="{{ route('reservations.destroy', $reservation->id) }}" method="POST" style="display: inline-block;">
                @csrf
                @method('DELETE')
                <button type="button" class="btn btn-danger"
                    onclick="confirmDelete('{{ $reservation->id }}')">Supprimer</button>
            </form>
        </div>
    </div>
    <script>
        function confirmDelete(reservationId) {
            if (confirm('Êtes-vous sûr de vouloir supprimer cette réservation ?')) {
                document.getElementById('delete-form-' + reservationId).submit();
            } else {
                return false;
            }
        }
    </script>
@endsection
