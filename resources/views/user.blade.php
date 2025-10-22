@extends('layout')
@section('content')

<div class="container mt-4">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    @if($user)
                        <h2 class="card-title mb-0">Пользователь: {{ $user->first_name }} {{ $user->last_name }}</h2>
                    @else
                        <h2 class="card-title mb-0 text-danger">Неверный ID пользователя</h2>
                    @endif
                </div>
                
                @if($user)
                <div class="card-body">
                    <div class="mb-5">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h4 class="mb-0">Список арендованных помещений</h4>
                            <span class="badge bg-primary">{{ $user->leases->count() }}</span>
                        </div>
                        
                        @if($user->leases->isNotEmpty())
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="table-light">
                                    <tr>
                                        <th scope="col">ID</th>
                                        <th scope="col">Название</th>
                                        <th scope="col">Описание</th>
                                        <th scope="col">Тип</th>
                                        <th scope="col">Адрес</th>
                                        <th scope="col">Город</th>
                                        <th scope="col">Начало</th>
                                        <th scope="col">Конец</th>
                                        <th scope="col">Статус</th>
                                        <th scope="col">Действия</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($user->leases as $lease)
                                        <tr>
                                            <td>{{ $lease->id }}</td>
                                            <td>{{ $lease->title }}</td>
                                            <td>{{ Str::limit($lease->description, 50) }}</td>
                                            <td>
                                                <span class="badge bg-secondary">{{ $lease->property_type->name }}</span>
                                            </td>
                                            <td>{{ $lease->address->street." ".$lease->address->house }}</td>
                                            <td>{{ $lease->address->city->name }}</td>
                                            <td>
                                                <span class="badge bg-info text-dark">{{ $lease->pivot->start_date }}</span>
                                            </td>
                                            <td>
                                                <span class="badge {{ $lease->pivot->end_date ? 'bg-warning text-dark' : 'bg-success' }}">
                                                    {{ $lease->pivot->end_date ?: 'Активно' }}
                                                </span>
                                            </td>
                                            <td>
                                                <span class="badge {{ $lease->pivot->end_date ? 'bg-secondary' : 'bg-success' }}">
                                                    {{ $lease->pivot->end_date ? 'Завершено' : 'Активная аренда' }}
                                                </span>
                                            </td>
                                            <td>
                                                <div class="btn-group" role="group">
                                                    <a href="{{ url('property/'.$lease->id) }}" class="btn btn-sm btn-outline-primary">Подробнее</a>
                                                    <a href="{{ url('lease/edit/'.$lease->id) }}" class="btn btn-sm btn-outline-primary">Редактировать</a>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        @endif
                    </div>

                    <div>
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h4 class="mb-0">Список имущества</h4>
                            <span class="badge bg-success">{{ $user->properties->count() }}</span>
                        </div>
                        
                        @if($user->properties->isNotEmpty())
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="table-light">
                                    <tr>
                                        <th scope="col">ID</th>
                                        <th scope="col">Название</th>
                                        <th scope="col">Описание</th>
                                        <th scope="col">Тип</th>
                                        <th scope="col">Адрес</th>
                                        <th scope="col">Город</th>
                                        <th scope="col">Регион</th>
                                        <th scope="col">Страна</th>
                                        <th scope="col"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($user->properties as $property)
                                        <tr>
                                            <td>{{ $property->id }}</td>
                                            <td>{{ $property->title }}</td>
                                            <td>{{ Str::limit($property->description, 50) }}</td>
                                            <td>
                                                <span class="badge bg-secondary">{{ $property->property_type->name }}</span>
                                            </td>
                                            <td>{{ $property->address->street." ".$property->address->house }}</td>
                                            <td>{{ $property->address->city->name }}</td>
                                            <td>{{ $property->address->city->region->name }}</td>
                                            <td>{{ $property->address->city->region->country->name }}</td>
                                            <td>
                                                <div class="btn-group" role="group">
                                                    <a href="{{ url('property/'.$property->id) }}" class="btn btn-sm btn-outline-primary">Подробнее</a>

                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                        @endif
                    </div>
                </div>
                @else
                <div class="card-body">
                    <div class="alert alert-danger text-center">
                        <i class="fas fa-exclamation-triangle"></i> Пользователь не найден
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