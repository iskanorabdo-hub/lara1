<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Liste Parking</h1>

    <form method="GET" action="{{ route('liste-parking') }}">
        <input type="text" name="search" value="{{ request('search') }}" placeholder="Search ville">
        <button type="submit">Search</button>
    </form>

    <table border="1">
        <tr>
            <th>ID</th>
            <th>Ville</th>
            <th>Capacité</th>
            <th>Prix</th>
            <th>Actions</th>
        </tr>

        @forelse($parkinges as $v)
        <tr>
            <td>
                <a href="{{ route('showp', $v->id) }}">{{ $v->id }}</a>
            </td>
            <td>{{ $v->ville }}</td>
            <td>{{ $v->capacite }}</td>
            <td>{{ $v->prix_heure }}</td>
            <td>
                <a href="{{ route('modifierparking', $v->id) }}">Modifier</a>

                <form action="{{ route('supprimerparking', $v->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Supprimer</button>
                </form>
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="5">Aucun résultat</td>
        </tr>
        @endforelse
    </table>

    {{ $parkinges->links() }}
</body>
</html>