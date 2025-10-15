<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>609-31</title>
</head>
<body>
    <h2>{{$property ? "Список арендаторов собственности id:".$property->id : "Неверный id собственности"}}</h2>
    @if($property)
    <table border="1">
        <thead>
            <td>id</td>
            <td>Имя</td>
            <td>Фамилия</td>
            <td>Начало</td>
            <td>Конец</td>
        </thead>
        @foreach ($property->tenants as $tenant)
            <tr>
                <td>{{$tenant->id}}</td>
                <td>{{$tenant->first_name}}</td>
                <td>{{$tenant->last_name}}</td>
                <td>{{$tenant->pivot->start_date}}</td>
                <td>{{$tenant->pivot->end_date}}</td>
                
            </tr>
        @endforeach
    </table>
    @endif
</body>
</html>