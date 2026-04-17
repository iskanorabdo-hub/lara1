<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<table border='1'>
        <tr>
            <th>id</th>
            <th>marque</th>
            <th>model</th>
            <th>Km</th>
        </tr>
        @foreach($voitures as $v)
        <tr>
            <td><a href="{{ route('show' , $v->id)}}">{{$v->id}}</a></td>
            <td>{{$v->marque}}</td>
            <td>{{$v->model}}</td>
            <td>{{$v->km}}</td>
        </tr>

        @endforeach
    </table>
    
    
</body>
</html>