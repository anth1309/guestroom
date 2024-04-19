@extends('base')

@section('content')
    <div class="container bg-div">
        @if ($room)
            <div class="row">
                <div class="col-md-6">
                    <h2>Détails de la chambre {{ $room->name }}</h2>

                    <p>Description : {{ $room->description }}</p>
                    <p>Capacité : {{ $room->capacity }}, plus un lit bébé sur demande</p>
                    <p>Prix de la nuitée la semaine : {{ $room->weekly_price }} Xpf</p>
                    <p>Prix de la nuitée le week-end : {{ $room->weekend_price }} Xpf</p>
                    <br>
                    <p>Pour rappel nous sommes fermés le lundi</p>
                    <a href="{{ route('reservation.create', ['roomId' => $room->id, 'roomName' => $room->name]) }}"
                        class="btn mt-2 mb-2 background text">Réserver</a>
                </div>
                <div class="col-md-6">
                    @if ($room->images->isNotEmpty())
                        <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                            <div class="carousel-inner">
                                @foreach ($room->images as $key => $image)
                                    <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                                        <img src="{{ asset('storage/' . $image->image_path) }}" class="d-block w-100"
                                            alt="Image de la chambre">
                                    </div>
                                @endforeach
                            </div>
                            <a class="carousel-control-prev" href="#carouselExampleControls" role="button"
                                data-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="sr-only">Précédent</span>
                            </a>
                            <a class="carousel-control-next" href="#carouselExampleControls" role="button"
                                data-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="sr-only">Suivant</span>
                            </a>
                        </div>
                    @else
                        <p>Aucune image disponible pour cette chambre.</p>
                    @endif
                </div>
            </div>
        @else
            <p>La chambre demandée n'existe pas.</p>
        @endif
    </div>
@endsection
