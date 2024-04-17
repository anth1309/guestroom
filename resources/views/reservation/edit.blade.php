@extends('base')

@section('title', 'Modifier une réservation')

@section('content')
    <?php
    
    ?>
    <div class="container bg-div">
        <h2>Modifier la reservation n0 de la chambre {{ $reservation->room->name }}</h2>
        <form action="{{ route('reservations.update', $reservation->id) }}" method="POST">
            @csrf
            <input type="hidden" name="room_id" id="room_id" value="{{ $reservation->room_id }}">
            @method('PUT')
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="lastname">Nom :</label>
                        <input type="text" name="lastname" id="lastname" class="form-control" required
                            placeholder="Votre nom" value="{{ $reservation->lastname }}">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="firstname">Prénom :</label>
                        <input type="text" name="firstname" id="firstname" class="form-control" required
                            placeholder="Votre prénom" value="{{ $reservation->firstname }}">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="email">Email :</label>
                        <input type="email" name="email" id="email" class="form-control" required
                            placeholder="exemple@gmail.com" value="{{ $reservation->email }}">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="phone">Téléphone :</label>
                        <input type="tel" name="phone" id="phone" class="form-control" required
                            value="{{ $reservation->phone }}">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="start_date">Date de début :</label>
                        <input type="date" name="start_date" id="start_date" class="form-control" required
                            value="{{ $reservation->start_date }}">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="end_date">Date de fin :</label>
                        <input type="date" name="end_date" id="end_date" class="form-control" required
                            value="{{ $reservation->end_date }}">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="adults">Nombre d'adultes :</label>
                        <select name="adults" id="adults" class="form-control">
                            <option value="1" {{ $reservation->adults == 1 ? 'selected' : '' }}>1</option>
                            <option value="2" {{ $reservation->adults == 2 ? 'selected' : '' }}>2</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="children">Nombre d'enfants (plus de 2 ans) :</label>
                        <select name="children" id="children" class="form-control">
                            <option value="0" {{ $reservation->children == 0 ? 'selected' : '' }}>0</option>
                            <option value="1" {{ $reservation->children == 1 ? 'selected' : '' }}>1</option>
                            <option value="2" {{ $reservation->children == 2 ? 'selected' : '' }}>2</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="bed">Lit parapluie :</label>
                        <select name="bed" id="bed" class="form-control">
                            <option value="1" {{ $reservation->bed == 1 ? 'selected' : '' }}>Non</option>
                            <option value="2" {{ $reservation->bed == 2 ? 'selected' : '' }}>Oui</option>
                        </select>
                    </div>
                </div>
            </div>



            <button type="submit" class="btn  mt-2 mb-2 background text">Enregistrer les modifications</button>
        </form>
    </div>
@endsection
