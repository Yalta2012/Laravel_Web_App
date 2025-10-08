<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>609-31</title>
</head>
<body>
    <h2>{{$property_type ? "Список недвижимости с типом ".$property_type->name : "Неверный id типа"}}</h2>
    @if($property_type)
    <table border="1">
        <thead>
            <td>id</td>
            <td>Название</td>
            <td>Описание</td>
            <td>Улица</td>
            <td>Дом</td>
            <td>Состояние</td>
        </thead>
        @foreach ($property_type->properties as $property)
            <tr>
                <td>{{$property->id}}</td>
                <td>{{$property->title}}</td>
                <td>{{$property->description}}</td>
                <td>{{$property->address->street}}</td>
                <td>{{$property->address->house}}</td>
                <td>{{$property->is_available ? "Свободно" : "Занято"}}</td>
            </tr>
        @endforeach
    </table>
    @endif
</body>
</html>