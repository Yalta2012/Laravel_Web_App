<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>609-31</title>
</head>
<body>
    <h2>Жилая площадь</h2>
    <table border="1">
        <thead>
            <td>id</td>
            <td>Название</td>
            <td>Описание</td>
            <td>Состояние</td>
            <td>Тип</td>
            <td>Адрес</td>
            <td>Город</td>
            <td>Регион</td>
            <td>Страна</td>
            <td>Владелец</td>

        </thead>
        @foreach ($properties as $property)
            <tr>
                <td>{{$property->id}}</td>
                <td>{{$property->title}}</td>
                <td>{{$property->description}}</td>
                <td>{{$property->is_available ? "Свободно" : "Занято"}}</td>
                <td>{{$property->property_type->name}}</td>
                <td>{{$property->address->street." ".$property->address->house}}</td>
                <td>{{$property->address->city->name}}</td>                
                <td>{{$property->address->city->region->name}}</td>                
                <td>{{$property->address->city->region->country->name}}</td>                
                <td>{{$property->owner->first_name." ".$property->owner->last_name}}</td>                
               
            </tr>
        @endforeach
    </table>
</body>
</html>


