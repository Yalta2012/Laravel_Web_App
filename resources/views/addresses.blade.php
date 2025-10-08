<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>609-31</title>
</head>
<body>
    <h2>Список адресов</h2>
    <table border="1">
        <thead>
            <td>id</td>
            <td>Улица</td>
            <td>Дом</td>
            <td>Город</td>
            <td>Регион</td>
            <td>Страна</td>
            
        </thead>
        @foreach ($addresses as $address)
            <tr>
                <td>{{$address->id}}</td>
                <td>{{$address->street}}</td>
                <td>{{$address->house}}</td>
                <td>{{$address->city->name}}</td>
                <td>{{$address->city->region->name}}</td>
                <td>{{$address->city->region->country->name}}</td>
            </tr>
        @endforeach
    </table>
</body>
</html>