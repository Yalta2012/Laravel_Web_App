<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>609-31</title>
</head>
<body>
    <h2>Список стран</h2>
    <table border="1">
        <thead>
            <td>id</td>
            <td>Название</td>
            <td>Код</td>

        </thead>
        @foreach ($countries as $country)
            <tr>
                <td>{{$country->id}}</td>
                <td>{{$country->name}}</td>
                <td>{{$country->code}}</td>

            </tr>
        @endforeach
    </table>
</body>
</html>