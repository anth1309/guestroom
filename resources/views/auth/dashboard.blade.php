@extends('base')

@section('content')
    <div class="container bg-div">

        @auth
            <p>Bienvenue, {{ Auth::user()->name }}!</p>
        @endauth
        <h1>Guide pour gérer les réservations(chambres)</h1>

        <h2> 1: Accéder à la liste des réservations</h2>
        <p>Vous êtes connectéen tant qu'administrateur.</p>

        <p>Cliquez sur le lien "Gestion des réservations" ou "Gestion des chambres" pour afficher toutes les
            réservations(chambres) enregistrées dans le système.</p>

        <h2> 2: Afficher les détails d'une réservation (chambres)</h2>
        <p>Sur la page listant toutes les réservations, vous verrez une liste de réservations avec des détails tels que
            l'ID, le nom de la chambre et les dates de début et de fin.</p>
        <p>Pour afficher les détails d'une réservation spécifique, cliquez sur le lien "Voir" associé à cette
            réservation.</p>

        <h2> 3: Mettre à jour une réservation(chambres)</h2>
        <p>Une fois que vous êtes sur la page des détails d'une réservation, vous devriez voir
            "Modifier" qui vous permet de mettre à jour cette réservation.</p>
        <p>Cliquez sur le bouton "Modifier" pour accéder à un formulaire où vous pouvez modifier les détails de la
            réservation, tels que les dates de début et de fin...</p>
        <p>Une fois les modifications apportées, soumettez le formulaire pour enregistrer les changements.</p>

        <h2> 4: Supprimer une réservation(chambres)</h2>
        <p>Sur la page des détails d'une réservation, vous devriez voir un bouton ou un lien "Supprimer" qui vous permet de
            supprimer cette réservation.</p>
        <p>Cliquez sur le bouton "Supprimer" pour afficher une boîte de dialogue de confirmation.</p>
        <p>Confirmez la suppression de la réservation en cliquant sur "Oui" ou "Supprimer" dans la boîte de dialogue.</p>

        <h2> 5: Créer une réservation(chambres)</h2>
        <p>Cliquez sur le lien "Nouvelle réservation" pour accéder au formulaire de création.</p>
        <p>Sur le formulaire de création, saisissez toutes les informations nécessaires pour la nouvelle réservation. Cela
            peut inclure le choix de la chambre, les dates de début et de fin, ainsi que d'autres détails pertinents.</p>
        <p>Assurez-vous de remplir toutes les informations requises de manière précise et correcte.</p>
        <p>Une fois que vous avez rempli tous les champs du formulaire, cliquez sur le bouton "Créer" pour enregistrer la
            nouvelle réservation dans le système.</p>

    </div>
@endsection
