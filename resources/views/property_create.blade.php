<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>609-31</title>
    <style> .is-invalid {color: red; } </style>
</head>
<body>
    <h2>Добавить единицу недвижимости</h2>

    <form method="post" action={{ url('property') }}/>
    @csrf

    <label>Название</label>
    <input type="text" name="title" value="{{old('title')}}"/>
    
    @error('title')
    <div class="is-invalid">{{$message}}</div>
    @enderror
    
    <br>

    <label>Описание</label>
    <input type="text" name="description" value="{{old('description')}}"/>

    @error('description')
    <div class="is-invalid">{{$message}}</div>
    @enderror

    <br>

    <label>Категория</label>
    <select name="type_id" value="{{old('type_id')}}">
        <option style="...">

        @foreach ($property_types as $property_type)
            <option value="{{$property_type->id}}">
                @if(old('type_id') == $property_type->id) selected @endif
                {{$property_type->name}}
            </option>

        @endforeach

    </select>

    @error('property_type_id')
    <div class="is-invalid">{{$message}}</div>
    @enderror


    <br>


    <label>Владелец</label>
    <select name="owner_id" value="{{old('owner_id')}}">
        <option style="...">

        @foreach ($owners as $owner)
            <option value="{{$owner->id}}">
                @if(old('owner_id') == $owner->id) selected @endif
                {{$owner->first_name." ".$owner->last_name}}
            </option>

        @endforeach
    </select>

    @error('owner_id')
    <div class="is-invalid">{{$message}}</div>
    @enderror


    <br>


    <label>Адрес</label>
    <select name="address_id" value="{{old('address_id')}}">
        <option style="...">

        @foreach ($addresses as $address)
            <option value="{{$address->id}}">
                @if(old('address_id') == $address->id) selected @endif
                {{$address->street." ".$address->house." ".$address->city->name." ".$address->city->region->name." ".$address->city->region->country->name}}
            </option>

        @endforeach
    </select>

    @error('address_id')
    <div class="is-invalid">{{$message}}</div>
    @enderror


    <br>


    <input type="submit">

    </form>

</body>
</html>