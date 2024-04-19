@extends('base')

@section('title', 'Acceuil Grand Col')


@section('content')
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <div class="text-center ">
        <h1 class="text-white  mt-3">Bienvenue au Gîte Le Grand Col !</h1>
        <p class="text-white  mt-3">


            Niché sur les rivages vierges de la magnifique île de Grande Terre en Nouvelle-Calédonie, notre gîte offre une
            escapade
            idyllique pour les voyageurs en quête de tranquillité, d'aventure et de découverte.

            Imaginez-vous, bercés par les brises marines, vous éveillant au son des vagues qui caressent doucement le
            rivage.
            Notre
            gîte vous invite à vous détendre et à vous ressourcer dans un cadre naturel à couper le souffle, où le bleu
            turquoise de
            l'océan rencontre le vert luxuriant de la forêt tropicale.

            Que vous soyez amateurs de farniente sur la plage, passionnés de plongée sous-marine à la découverte des récifs
            coralliens exotiques, ou tout simplement en quête d'aventures terrestres à travers les sentiers de randonnée
            pittoresques, notre gîte offre une variété d'activités pour satisfaire tous les goûts.

            Après une journée bien remplie à explorer les trésors de la Nouvelle-Calédonie, détendez-vous dans nos
            hébergements
            confortables et accueillants, où le charme rustique rencontre le luxe moderne. Savourez une délicieuse cuisine
            locale
            préparée avec des produits frais et des saveurs authentiques, tout en échangeant des histoires de voyages avec
            d'autres
            aventuriers du monde entier.

            Au Gîte Paradis Bleu, nous nous engageons à offrir à nos clients une expérience inoubliable, où l'hospitalité
            chaleureuse des îles se marie à la beauté sauvage de la nature. Rejoignez-nous pour une escapade mémorable au
            cœur
            de la
            Nouvelle-Calédonie, où chaque instant est une invitation à explorer, à rêver et à s'émerveiller.</p>
    </div>
    <div>
        @if ($images->isNotEmpty())
            <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    @foreach ($images as $key => $image)
                        <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                            <img src="{{ asset('storage/' . $image->image_path) }}" class="d-block w-75 mx-auto"
                                alt="Image du gite">
                        </div>
                    @endforeach
                </div>
                <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Précédent</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Suivant</span>
                </a>
            </div>
        @else
            <p>Aucune image disponible pour cette chambre.</p>
        @endif

    @endsection
    @section('navbar')
        <ul class="nav">
            @foreach ($rooms as $room)
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('room', $room->id) }}">{{ $room->name }}</a>
                </li>
            @endforeach
        </ul>
    @endsection
