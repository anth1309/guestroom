@extends('base')

@section('title', isset($room) ? 'Modifier une chambre' : 'Créer une chambre')

@section('content')
    <div class="container bg-div">
        <h2>{{ isset($room) ? 'Modifier la chambre ' . $room->name : 'Créer une chambre' }}</h2>


        <form action="{{ isset($room) ? route('rooms.update', $room->id) : route('rooms.store') }}" method="POST"
            enctype="multipart/form-data">
            @csrf
            @if (isset($room))
                @method('PUT')
            @endif
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="name">Nom de la chambre :</label>
                        <input type="text" name="name" id="name" class="form-control"
                            value="{{ isset($room) ? $room->name : '' }}" required>
                    </div>
                    <div class="form-group">
                        <label for="capacity">Capacité :</label>
                        <input type="number" name="capacity" id="capacity" class="form-control"
                            value="{{ isset($room) ? $room->capacity : '' }}" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="price_weekend">Prix week-end :</label>
                        <input type="number" name="price_weekend" id="price_weekend" class="form-control"
                            value="{{ isset($room) ? $room->weekend_price : '' }}" required>
                    </div>
                    <div class="form-group">
                        <label for="price_week">Prix semaine :</label>
                        <input type="number" name="price_week" id="price_week" class="form-control"
                            value="{{ isset($room) ? $room->weekly_price : '' }}" required>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="images">Images de la chambre :</label>
                <input type="file" name="images[]" id="images" class="form-control-file" multiple>
            </div>


            <div class="form-group">
                <label for="description">Description :</label>
                <textarea name="description" id="description" class="form-control" required>{{ isset($room) ? $room->description : '' }}</textarea>
            </div>
            <button type="submit"
                class="btn  mt-2 mb-2 background text">{{ isset($room) ? 'Enregistrer les modifications' : 'Créer la chambre' }}</button>
        </form>
    </div>
@endsection
