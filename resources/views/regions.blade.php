<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>609-31</title>
</head>
<body>
    <h2>Список регионов</h2>
    <table border="1">
        <thead>
            <td>id</td>
            <td>Название</td>
            <td>Страна</td>
        </thead>
        @foreach ($regions as $region)
            <tr>
                <td>{{$region->id}}</td>
                <td>{{$region->name}}</td>
                <td>{{$region->country->name}}</td>

            </tr>
        @endforeach
    </table>
</body>
</html>