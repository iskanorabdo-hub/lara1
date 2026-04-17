<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Détail Voiture</title>
</head>
<body>
    <h1>Détail de voiture #{{$voiture->id}}</h1>

    <p>Marque : {{$voiture->marque}}</p>
    <p>Modèle : {{$voiture->model}}</p>
    <p>Kilométrage : {{$voiture->Km}} Km</p>

    <a href="{{route('liste-parking')}}">Liste Parking</a>
    <a href="{{route('liste')}}">Liste Voitures</a>
</body>
</html>