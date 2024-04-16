<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Votre réservation</title>
</head>

<body>
    <h1>Votre réservation</h1>

    <p>Merci d'avoir effectué une réservation chez nous. Voici les détails de votre réservation :</p>

    <ul>
        {{-- <li>Chambre: {{ $reservation->name }}</li> --}}
        <li>Du: {{ $reservation->start_date }}</li>
        <li>Au: {{ $reservation->end_date }}</li>

    </ul>
    <p>Afin de valider votre réservation, nous vous demandons de bien vouloir vous acquitter d'un acompte représentant
        un tiers du coût total de votre séjour avant
        le{{ \Carbon\Carbon::parse($reservation->start_date)->subDays(3)->format('Y-m-d') }}, sans
        quoi nous serons obligés d'annuler la réservation</p><br>


    <p>Si vous avez des questions, n'heitez pas à nous contacter.</p>

    <p>Nous vous remercions de votre réservation et nous sommes impatients de vous accueillir chez nous.</p>

    <p>Cordialement,<br>Paul et Valérie</p>
</body>

</html>
