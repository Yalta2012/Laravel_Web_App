<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>609-31</title>
</head>
<body>
    @if($user)
    <h1>{{"Пользователь: ".$user->first_name." ".$user->last_name}}</h1>
    <h2>Список арендованных помещений</h2>
    <table border="1">
        <thead>
            <td>id</td>
            <td>Название</td>
            <td>Описание</td>
            <td>Тип</td>
            <td>Адрес</td>
            <td>Город</td>
            <td>Регион</td>
            <td>Страна</td>
            <td>Начало</td>
            <td>Конец</td>
        </thead>
        @foreach ($user->leases as $lease)
            <tr>
                <td>{{$lease->id}}</td>
                <td>{{$lease->title}}</td>
                <td>{{$lease->description}}</td>
                <td>{{$lease->property_type->name}}</td>
                <td>{{$lease->address->street." ".$lease->address->house}}</td>
                <td>{{$lease->address->city->name}}</td>
                <td>{{$lease->address->city->region->name}}</td>
                <td>{{$lease->address->city->region->country->name}}</td>
                <td>{{$lease->pivot->start_date}}</td>
                <td>{{$lease->pivot->end_date}}</td>
            </tr>
        @endforeach
    </table>

    <h2>Список имущества</h2>
    <table border="1">
        <thead>
            <td>id</td>
            <td>Название</td>
            <td>Описание</td>
            <td>Тип</td>
            <td>Адрес</td>
            <td>Город</td>
            <td>Регион</td>
            <td>Страна</td>
        </thead>
        @foreach ($user->properties as $property)
            <tr>
                <td>{{$property->id}}</td>
                <td>{{$property->title}}</td>
                <td>{{$property->description}}</td>
                <td>{{$property->property_type->name}}</td>
                <td>{{$property->address->street." ".$property->address->house}}</td>
                <td>{{$property->address->city->name}}</td>                
                <td>{{$property->address->city->region->name}}</td>                
                <td>{{$property->address->city->region->country->name}}</td>                
            </tr>
        @endforeach
    </table>
    @else
    <h2>Неверный id пользователя</h2>
    @endif
</body>
</html>