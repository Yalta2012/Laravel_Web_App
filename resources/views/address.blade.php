<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>609-31</title>
</head>
<body>
    <h2>{{$address ? "Собственность в здании: ".$address->street." ".$address->house : "Неверный id адреса"}}</h2>
    @if($address)
    <table border="1">
        <thead>
            <td>id</td>
            <td>Название</td>
            <td>Описание</td>
            <td>Категория</td>
            <td>Состояние</td>
        </thead>
        @foreach ($address->properties as $property)
            <tr>
                <td>{{$property->id}}</td>
                <td>{{$property->title}}</td>
                <td>{{$property->description}}</td>
                <td>{{$property->property_type->name }}</td>
                <td>{{$property->is_available ? "Свободно" : "Занято"}}</td>
            </tr>
        @endforeach
    </table>
    @endif
</body>
</html>