<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>609-31</title>
</head>
<body>
    <h2>{{$city ? "Адреса в городе: ".$city->name : "Неверный id города"}}</h2>
    @if($city)
    <table border="1">
        <thead>
            <td>id</td>
            <td>Улица</td>
            <td>Дом</td>

        </thead>
        @foreach ($city->addresses as $address)
            <tr>
                <td>{{$address->id}}</td>
                <td>{{$address->street}}</td>
                <td>{{$address->house}}</td>
            </tr>
        @endforeach
    </table>
    @endif
</body>
</html>