<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>609-31</title>
</head>
<body>
    <h2>Список городов</h2>
    <table border="1">
        <thead>
            <td>id</td>
            <td>Название</td>
            <td>Регион</td>
            <td>Страна</td>

        </thead>
        @foreach ($cities as $city)
            <tr>
                <td>{{$city->id}}</td>
                <td>{{$city->name}}</td>
                <td>{{$city->region->name}}</td>
                <td>{{$city->region->country->name}}</td>

            </tr>
        @endforeach
    </table>
</body>
</html>