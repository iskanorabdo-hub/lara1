<h1>Modifier</h1>

<form method="POST" action="{{ route('enregistrer', $parking->id) }}">
    @csrf
    @if($errors->any())
    <ul style="color : red">
        @foreach ($errors->all() as $er )
        <li>{{$er}}</li>
        @endforeach
    </ul>
    @endif

 <br>
    Ville:
    <input type="text" name="ville" value="{{$parking->ville}}"><br><br>

    Capacité:
    <input type="text" name="capacite" value="{{$parking->capacite}}"><br><br>

    Prix par heure:
    <input type="text" name="prix_heure"value="{{$parking->prix_heure}}"><br><br>

    <button type="submit">Enregistrer</button>
</form>


<br>
<a href="{{ route('liste-parking') }}">Voir liste</a>
