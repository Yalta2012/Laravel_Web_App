<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>609-31</title>
</head>
<body>
    <h2>Список пользователей</h2>
    <table border="1">
        <thead>
            <td>id</td>
            <td>Имя</td>
            <td>Фамилия</td>
            <td>Почта</td>
            <td>Телефон</td>
        </thead>
        @foreach ($users as $user)
            <tr>
                <td>{{$user->id}}</td>
                <td>{{$user->first_name}}</td>
                <td>{{$user->last_name}}</td>
                <td>{{$user->email}}</td>
                <td>{{$user->phone}}</td>

            </tr>
        @endforeach
    </table>
</body>
</html>