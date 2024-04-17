@extends('base')

@section('title', 'Créer une réservation')

@section('content')
    <?php
    use Illuminate\Support\Facades\DB;
    $room = DB::table('rooms')->where('id', $roomId)->first();
    $reservations = DB::table('reservations')->where('room_id', $roomId)->where('end_date', '>', now()->toDateString())->select('start_date', 'end_date')->get();
    
    $reservationDateArray = $reservations->toArray();
    $reservationDateJson = json_encode($reservationDateArray);
    ?>

    ?>
    <div class="container bg-div">
        <h2>Votre réservation pour la chambre "{{ $roomName }}"</h2>

        <form action="{{ route('reservations.store') }}" method="POST">
            @csrf
            <input type="hidden" name="room_id" id="room_id" value="{{ $roomId }}">

            <input type="hidden" id="weekday_base_price" value="{{ $room->weekly_price }}">
            <input type="hidden" id="weekend_base_price" value="{{ $room->weekend_price }}">
            <input type="hidden" id="max_guests" value="{{ $capacity = $room->capacity }}">
            <input type="hidden" id="reservation-date" value="{{ $reservationDateJson }}">


            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="lastname">Nom :</label>
                        <input type="text" name="lastname" id="lastname" class="form-control" required
                            placeholder="Votre nom">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="firstname">Prénom :</label>
                        <input type="text" name="firstname" id="firstname" class="form-control" required
                            placeholder="Votre prénom">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="email">Email :</label>
                        <input type="email" name="email" id="email" class="form-control" required
                            placeholder="exemple@gmail.com">
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

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="adults">Nombre d'adultes :</label>
                        <select name="adults" id="adults" class="form-control">
                            <option value="1">1</option>
                            <option value="2">2</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="children">Nombre d'enfants (plus de 2 ans) :</label>
                        <select name="children" id="children" class="form-control">
                            <option value="0">0</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="bed">Lit parapluie :</label>
                        <select name="bed" id="bed" class="form-control">
                            <option value="0">Non</option>
                            <option value="1">Oui</option>
                        </select>
                    </div>
                </div>


                <div class="col-md-6">
                    <div class="form-group">
                        <label for="price">Prix de votre séjour :</label>
                        <input type="text" name="price" id="price" class="form-control">
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
