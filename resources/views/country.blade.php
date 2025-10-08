<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>609-31</title>
</head>
<body>
    <h2>{{$country ? "Регионы в стране: ".$country->name : "Неверный id страны"}}</h2>
    @if($country)
    <table border="1">
        <thead>
            <td>id</td>
            <td>Регион</td>
        </thead>
        @foreach ($country->regions as $region)
            <tr>
                <td>{{$region->id}}</td>
                <td>{{$region->name}}</td>

            </tr>
        @endforeach
    </table>
    @endif
</body>
</html>