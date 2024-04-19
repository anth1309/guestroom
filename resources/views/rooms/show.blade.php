@extends('base')

@section('content')
    <div class="container bg-div">
        @auth
            <p>Bienvenue, {{ Auth::user()->name }}!</p>
        @endauth
        <h1>Détails de la chambre {{ $room->name }}</h1>
        <div>
            <p>Nom : {{ $room->name }}</p>
            <p>Description : {{ $room->description }}</p>
            <p>Prix semaine : {{ $room->weekly_price }}</p>
            <p>Prix week-end : {{ $room->weekend_price }} Xpf</p>
            <p>Capacité : {{ $room->capacity }}</p>
        </div>
        <div class="mb-2">
            <a href="{{ route('rooms.edit', $room->id) }}" class="btn btn-primary">Modifier</a>
            <form id="delete-form-{{ $room->id }}" action="{{ route('rooms.destroy', $room->id) }}" method="POST"
                style="display: inline-block;">
                @csrf
                @method('DELETE')
                <button type="button" class="btn btn-danger"
                    onclick="confirmDelete('{{ $room->id }}')">Supprimer</button>
            </form>
        </div>
        @if (count($room->images) > 0)
            <h2>Photos de la chambre</h2>
            <div class="row">
                @foreach ($room->images as $image)
                    <div class="col-md-3 mb-3">
                        <img src="{{ asset('storage/' . $image->image_path) }}" alt="Image de la chambre"
                            class="img-thumbnail" width="150" height="150">
                        <form id="delete-form-{{ $image->id }}" action="{{ route('image.destroy', $image->id) }}"
                            method="POST">

                            @csrf
                            @method('DELETE')
                            <button type="button" class="btn btn-danger"
                                onclick="confirmDelete('{{ $image->id }}')">Supprimer</button>

                        </form>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
    <script>
        function confirmDelete(destroyId) {
            if (confirm('Êtes-vous sûr de vouloir supprimer ?')) {
                document.getElementById('delete-form-' + destroyId).submit();
            } else {
                return false;
            }
        }
    </script>
@endsection
