<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Détail Voiture</title>

```
<style>
    body {
        font-family: Arial, sans-serif;
        background: #f4f6f9;
        margin: 0;
        padding: 0;
    }

    .container {
        max-width: 600px;
        margin: 50px auto;
        background: white;
        padding: 30px;
        border-radius: 12px;
        box-shadow: 0 4px 10px rgba(0,0,0,0.1);
    }

    h1 {
        text-align: center;
        color: #333;
    }

    .info {
        margin: 15px 0;
        font-size: 18px;
        color: #555;
    }

    .label {
        font-weight: bold;
        color: #222;
    }

    .buttons {
        margin-top: 25px;
        display: flex;
        justify-content: space-between;
    }

    a {
        text-decoration: none;
        padding: 10px 15px;
        border-radius: 8px;
        color: white;
        transition: 0.3s;
    }

    .btn-parking {
        background: #3498db;
    }

    .btn-parking:hover {
        background: #2980b9;
    }

    .btn-voiture {
        background: #2ecc71;
    }

    .btn-voiture:hover {
        background: #27ae60;
    }
</style>
```

</head>

<body>

<div class="container">
    <h1>Détail de voiture #{{$voiture->id}}</h1>

```
<div class="info">
    <span class="label">Marque :</span> {{$voiture->marque}}
</div>

<div class="info">
    <span class="label">Modèle :</span> {{$voiture->model}}
</div>

<div class="info">
    <span class="label">Kilométrage :</span> {{$voiture->Km}} Km
</div>

<div class="buttons">
    <a href="{{route('liste-parking')}}" class="btn-parking">Liste Parking</a>
    <a href="{{route('liste')}}" class="btn-voiture">Liste Voitures</a>
</div>
```

</div>

</body>
</html>
