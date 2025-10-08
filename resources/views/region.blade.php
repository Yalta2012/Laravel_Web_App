<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>609-31</title>
</head>
<body>
    <h2>{{$region ? "Города в регионе ".$region->name : "Неверный id региона"}}</h2>
    @if($region)
    <table border="1">
        <thead>
            <td>id</td>
            <td>Название</td>
        </thead>
        @foreach ($region->cities as $city)
            <tr>
                <td>{{$city->id}}</td>
                <td>{{$city->name}}</td>
            </tr>
        @endforeach
    </table>
    @endif
</body>
</html>