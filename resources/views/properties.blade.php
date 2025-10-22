@extends('layout')
@section('content')

<div class="container mt-4">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h2 class="card-title mb-0">Жилая площадь</h2>
                    <a href="{{ url('property/create') }}" class="btn btn-primary">Добавить собственность</a>
                </div>
                
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover">
                            <thead class="table-light">
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Название</th>
                                    <th scope="col">Описание</th>
                                    <th scope="col">Состояние</th>
                                    <th scope="col">Тип</th>
                                    <th scope="col">Адрес</th>
                                    <th scope="col">Город</th>
                                    <th scope="col">Регион</th>
                                    <th scope="col">Страна</th>
                                    <th scope="col">Владелец</th>
                                    <th scope="col">Действия</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($properties as $property)
                                    <tr>
                                        <td>{{ $property->id }}</td>
                                        <td>{{ $property->title }}</td>
                                        <td>{{ $property->description }}</td>
                                        <td>
                                            <span class="badge {{ $property->is_available ? 'bg-success' : 'bg-secondary' }}">
                                                {{ $property->is_available ? "Свободно" : "Занято" }}
                                            </span>
                                        </td>
                                        <td>{{ $property->property_type->name }}</td>
                                        <td>{{ $property->address->street." ".$property->address->house }}</td>
                                        <td>{{ $property->address->city->name }}</td>
                                        <td>{{ $property->address->city->region->name }}</td>
                                        <td>{{ $property->address->city->region->country->name }}</td>
                                        <td>{{ $property->owner->first_name." ".$property->owner->last_name }}</td>
                                        <td>
                                            <div class="btn-group" role="group">
                                                <a href="{{ url('property/'.$property->id) }}" class="btn btn-sm btn-outline-primary">Подробнее</a>
                                                <a href="{{ url('property/edit/'.$property->id) }}" class="btn btn-sm btn-outline-primary">Редактировать</a>
                                                <a href="{{ url('property/destroy/'.$property->id) }}" class="btn btn-sm btn-outline-danger">Удалить</a>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    
                    
                    <div class="d-flex justify-content-center mt-4">
                        {{ $properties->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection