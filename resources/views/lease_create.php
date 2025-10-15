<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>609-31</title>
</head>
<body>
    <h2>Заключение договора аренды</h2>

    <form action="">
    @csrf
    <label>Город</label>

    <select name="city_id" value="{{ old('ciry_id') }}">
        <!-- <option style="..."> -->
        @foreach($cities as $city)
            <option value="{{$city->id}}">
                @if(old('city_id') == $city->id) selected
                @endif>{{$city->name}}

            </option>
        @endforeach
    </select>

    </form>

</body>
</html>