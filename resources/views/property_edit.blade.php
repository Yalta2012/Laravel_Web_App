@extends('layout')
@section('content')

<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h2 class="card-title mb-0">
                        @if($property)
                            Редактирование информации о недвижимости ID: {{ $property->id }}
                        @else
                            Неверный ID собственности
                        @endif
                    </h2>
                </div>
                
                @if($property)
                <div class="card-body">
                    <form method="post" action="{{ url('property/update/'.$property->id) }}">
                        @csrf

                        <!-- Название -->
                        <div class="mb-3">
                            <label for="title" class="form-label">Название</label>
                            <input type="text" 
                                   class="form-control @error('title') is-invalid @enderror" 
                                   id="title" 
                                   name="title" 
                                   value="{{ old('title', $property->title) }}">
                            @error('title')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Описание -->
                        <div class="mb-3">
                            <label for="description" class="form-label">Описание</label>
                            <textarea class="form-control @error('description') is-invalid @enderror" 
                                      id="description" 
                                      name="description" 
                                      rows="3">{{ old('description', $property->description) }}</textarea>
                            @error('description')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Категория -->
                        <div class="mb-3">
                            <label for="type_id" class="form-label">Категория</label>
                            <select class="form-select @error('type_id') is-invalid @enderror" 
                                    id="type_id" 
                                    name="type_id">
                                <option value="">Выберите категорию</option>
                                @foreach ($property_types as $property_type)
                                    <option value="{{ $property_type->id }}" 
                                        {{ old('type_id', $property->type_id) == $property_type->id ? 'selected' : '' }}>
                                        {{ $property_type->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('type_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Владелец -->
                        <div class="mb-3">
                            <label for="owner_id" class="form-label">Владелец</label>
                            <select class="form-select @error('owner_id') is-invalid @enderror" 
                                    id="owner_id" 
                                    name="owner_id">
                                <option value="">Выберите владельца</option>
                                @foreach ($owners as $owner)
                                    <option value="{{ $owner->id }}" 
                                        {{ old('owner_id', $property->owner_id) == $owner->id ? 'selected' : '' }}>
                                        {{ $owner->first_name." ".$owner->last_name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('owner_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Адрес -->
                        <div class="mb-3">
                            <label for="address_id" class="form-label">Адрес</label>
                            <select class="form-select @error('address_id') is-invalid @enderror" 
                                    id="address_id" 
                                    name="address_id">
                                <option value="">Выберите адрес</option>
                                @foreach ($addresses as $address)
                                    <option value="{{ $address->id }}" 
                                        {{ old('address_id', $property->address_id) == $address->id ? 'selected' : '' }}>
                                        {{ $address->street." ".$address->house.", ".$address->city->name.", ".$address->city->region->name.", ".$address->city->region->country->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('address_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Состояние -->
                        <div class="mb-4">
                            <label class="form-label">Состояние</label>
                            <div class="form-check">
                                <input class="form-check-input @error('is_available') is-invalid @enderror" 
                                       type="radio" 
                                       name="is_available" 
                                       id="available_1" 
                                       value="1" 
                                       {{ old('is_available', $property->is_available) == '1' ? 'checked' : '' }}>
                                <label class="form-check-label text-success" for="available_1">
                                    Свободно
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input @error('is_available') is-invalid @enderror" 
                                       type="radio" 
                                       name="is_available" 
                                       id="available_0" 
                                       value="0" 
                                       {{ old('is_available', $property->is_available) == '0' ? 'checked' : '' }}>
                                <label class="form-check-label text-secondary" for="available_0">
                                    Занято
                                </label>
                            </div>
                            @error('is_available')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Кнопки -->
                        <div class="d-flex justify-content-between align-items-center">
                            <a href="{{ url()->previous() }}" class="btn btn-secondary">Отмена</a>
                            <button type="submit" class="btn btn-primary">Сохранить изменения</button>
                        </div>
                    </form>
                </div>
                @else
                <div class="card-body">
                    <div class="alert alert-danger text-center">
                        <i class="fas fa-exclamation-triangle"></i> Собственность не найдена
                    </div>
                    <div class="text-center">
                        <a href="{{ url('/') }}" class="btn btn-primary">На главную</a>
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>

@endsection