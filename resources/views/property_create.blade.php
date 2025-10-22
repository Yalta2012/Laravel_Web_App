@extends('layout')
@section('content')

<div class="row justify-content-center">
    <div class="col-4">
        <form method="post" action="{{ url ('property') }}">
            @csrf

            <div class="mb-3">
                <label for="title" class="form-label">Название</label>
                <input type="text" name="title" id="title" value="{{old('title')}}" aria-describedby="titleHelp"
                class="form-control @error('title') is-invalid @enderror"/>
                @error('title')
                <div class="invalid-feedback">{{$message}}</div>
                @enderror
            </div>


            <div class="mb-3">
                <label for="description" class="form-label">Описание</label>
                <input type="text" name="description" id="description" value="{{old('description')}}" aria-describedby="descriptionHelp"
                class="form-control @error('description') is-invalid @enderror"/>
                @error('description')
                <div class="invalid-feedback">{{$message}}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="type_id" class="form-label">Категория</label>
                <select type="text" name="type_id" id="type_id" value="{{old('type_id')}}" aria-describedby="type_idHelp"
                class="form-control @error('type_id') is-invalid @enderror">
                    @foreach ($property_types as $property_type)
                        <option value="{{$property_type->id}}">
                            @if(old('type_id') == $property_type->id) selected @endif
                            {{$property_type->name}}
                        </option>
                    @endforeach
                </select>
                @error('title')
                <div class="invalid-feedback">{{$message}}</div>
                @enderror
            </div>

            
            <div class="mb-3">
                <label for="owner_id" class="form-label">Владелец</label>
                <select type="text" name="owner_id" id="owner_id" value="{{old('owner_id')}}" aria-describedby="owner_idHelp"
                class="form-control @error('title') is-invalid @enderror">
                    @foreach ($owners as $owner)
                        <option value="{{$owner->id}}">
                            @if(old('owner_id') == $owner->id) selected @endif
                            {{$owner->first_name." ".$owner->last_name}}
                        </option>
                    @endforeach
                </select>
                @error('owner_id')
                <div class="invalid-feedback">{{$message}}</div>
                @enderror
            </div>

            

            <div class="mb-3">
                <label for="title" class="form-label">Адрес</label>
                <select type="text" name="address_id" id="address_id" value="{{old('address_id')}}" aria-describedby="address_idHelp"
                class="form-control @error('address_id') is-invalid @enderror">
                    @foreach ($addresses as $address)
                        <option value="{{$address->id}}">
                            @if(old('address_id') == $address->id) selected @endif
                            {{$address->street." ".$address->house." ".$address->city->name." ".$address->city->region->name." ".$address->city->region->country->name}}
                        </option>
                    @endforeach 
                </select>
                @error('address_id')
                <div class="invalid-feedback">{{$message}}</div>
                @enderror
            </div>



            <button type="submit" class="btn btn-primary">Добавить</button>

        </form>
    </div>
</div>

@endsection