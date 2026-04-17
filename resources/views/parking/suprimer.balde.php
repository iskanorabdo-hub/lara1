<h1>Suprimer Parking</h1>

<form method="POST" action="{{ route('inserer') }}">
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
    <input type="text" name="ville" value="{{old('ville')}}"><br><br>

    Capacité:
    <input type="text" name="capacite"><br><br>

    Prix par heure:
    <input type="text" name="prix_heure"><br><br>

    <button type="submit">Suprimer</button>
</form>


<br>