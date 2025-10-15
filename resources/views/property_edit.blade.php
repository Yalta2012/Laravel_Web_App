<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>609-31</title>
    <style> .is-invalid {color: red; } </style>
</head>
<body>
    <h2>{{$property ? "Редактирование ифнормации о недвижимости id:".$property->id : "Неверный id собственности"}}</h2>
    @if($property)
    <form method="post" action="{{url('property/update/'.$property->id)}}" />
        @csrf

        <label>Название</label>
        <input type="text" name="title" value="@if(old('title')) {{old('title')}} @else {{$property->title}} @endif " />

        @error('title')
        <div class="is-invalid">{{$message}}</div>
        @enderror

        
        <br>


        <label>Описание</label>
        <input type="text" name="description" value="@if(old('description')) {{old('description')}} @else {{$property->description}} @endif " />

        @error('description')
        <div class="is-invalid">{{$message}}</div>
        @enderror

        
        <br>


        <label>Категория</label>
        <select name="type_id" value="{{ old('type_id') }}">
            <option style="...">
            @foreach ($property_types as $property_type)
                <option value="{{$property_type->id}}">
                    @if(old('type_id'))
                        @if(old('type_id') == $property_type->id) selected @endif
                    @else
                        @if($property->type_id == $property_type->id) selected @endif
                    @endif {{$property_type->name}}
                </option>
            @endforeach
        </select>

        @error('type_id')
        <div class="is-invalid">{{$message}}</div>
        @enderror


        <br>


        <label>Владелец</label>
        <select name="owner_id" value="{{ old('owner_id') }}">
            <option style="...">
            @foreach ($owners as $owner)
                <option value="{{$owner->id}}">
                    @if(old('owner_id'))
                        @if(old('owner_id') == $owner->id) selected @endif
                    @else
                        @if($property->owner_id == $owner->id) selected @endif
                    @endif {{$owner->first_name." ".$owner->last_name}}
                </option>
            @endforeach
        </select>

        @error('type_id')
        <div class="is-invalid">{{$message}}</div>
        @enderror


        <br>


        <label>Адрес</label>
        
            <select name="address_id" value="{{ old('address_id') }}">
            <option style="...">
            @foreach ($addresses as $address)
                <option value="{{$address->id}}">
                    @if(old('address_id'))
                        @if(old('address_id') == $address->id) selected @endif
                    @else
                        @if($property->address_id == $address->id) selected @endif
                    @endif {{$address->street." ".$address->house." ".$address->city->name." ".$address->city->region->name." ".$address->city->region->country->name}}
                </option>
            @endforeach
        </select>

        @error('type_id')
        <div class="is-invalid">{{$message}}</div>
        @enderror


        <br>


        <label>Состояние</label>
                <input type="radio" name="is_available" value="1" {{ old('is_available', $property->is_available ? '1' : '0') == '1' ? 'checked' : '' }} > Свободно
                <input type="radio" name="is_available" value="0"   {{ old('is_available', $property->is_available ? '1' : '0') == '0' ? 'checked' : '' }}> Занято
        
        @error('is_available')
        <div class="is-invalid">{{$message}}</div>
        @enderror


        <br>


        <input type="submit">
    </form>
    @endif
</body>
</html>