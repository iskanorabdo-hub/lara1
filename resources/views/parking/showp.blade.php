<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Détail de Parking {{$parking->id}}</h1>

<a href="{{route('liste-parking')}}">Retour a listeparking</a><br>
<a href="{{route('liste')}}">Retour a listevoiture</a>
<p> ville : {{$parking->ville}}</p>
<p> capacite : {{$parking->capacite}}</p>
<p>prix : {{$parking->prix_heure}} dh</p>
<ul>
@foreach($parking->voitures as $v)
<li>
{{ $v->marque}}
@endforeach
</li>
</ul>
</body>
</html>