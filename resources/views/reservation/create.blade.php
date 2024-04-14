@extends('base')

@section('title', 'Créer une réservation')

@section('content')
    <div class="container bg-div">
        <h2>Votre réservation pour la chambre "{{ $roomName }}"</h2>

        <form action="{{ route('reservations.store') }}" method="POST">
            @csrf
            <input type="hidden" name="room_id" value="{{ $roomId }}">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="lastname">Nom :</label>
                        <input type="text" name="lastname" id="lastname" class="form-control" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="firstname">Prénom :</label>
                        <input type="text" name="firstname" id="firstname" class="form-control" required>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="email">Email :</label>
                        <input type="email" name="email" id="email" class="form-control" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="phone">Téléphone :</label>
                        <input type="tel" name="phone" id="phone" class="form-control" required>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="start_date">Date de début :</label>
                        <input type="date" name="start_date" id="start_date" class="form-control" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="end_date">Date de fin :</label>
                        <input type="date" name="end_date" id="end_date" class="form-control" required>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="comment">Commentaire :</label>
                <textarea name="comment" id="comment" class="form-control"></textarea>
            </div>



            <button type="submit" class="btn  mt-2 mb-2 background text">Valider ma réservation</button>
        </form>
    </div>
@endsection
