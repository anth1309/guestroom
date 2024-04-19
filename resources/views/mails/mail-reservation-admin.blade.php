<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Nouvelle reservation</title>
</head>

<body>
    <p>Vous avez une réservation de {{ ucfirst($reservation->lastname) }} {{ ucfirst($reservation->firstname) }}</p>
    <p>Du {{ $reservation->start_date }} au {{ $reservation->end_date }}</p>
    <p>Chambre : {{ $reservation->room->name }}</p>
    <p>Prix : {{ $reservation->price }}</p>
    <p>Numero de reservation : {{ $reservation->reservation_number }}</p>
    <p>Email : {{ $reservation->email }}</p>
    <p>Telephone : {{ $reservation->phone }}</p>
    <p>Adulte : {{ $reservation->adult }}</p>
    <p>Enfant : {{ $reservation->children }}</p>
    <p>Lit Parapluie : {{ $reservation->bed }}</p>

</body>

</html>
