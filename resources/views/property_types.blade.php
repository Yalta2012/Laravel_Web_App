<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>609-31</title>
</head>
<body>
    <h2>Список категорий</h2>
    <table border="1">
        <thead>
            <td>id</td>
            <td>Название</td>
        </thead>
        @foreach ($property_types as $type)
            <tr>
                <td>{{$type->id}}</td>
                <td>{{$type->name}}</td>
            </tr>
        @endforeach
    </table>
</body>
</html>