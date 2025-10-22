@extends('layout')
@section('content')

<div class="container mt-4">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h2 class="card-title mb-0">
                        @if($property)
                            Список арендаторов собственности ID: {{ $property->id }}
                        @else
                            Неверный ID собственности
                        @endif
                    </h2>
                    <a href="{{ url()->previous() }}" class="btn btn-secondary">Назад</a>
                </div>
                
                @if($property)
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover">
                            <thead class="table-light">
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Имя</th>
                                    <th scope="col">Фамилия</th>
                                    <th scope="col">Начало аренды</th>
                                    <th scope="col">Конец аренды</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($property->tenants as $tenant)
                                    <tr>
                                        <td>{{ $tenant->id }}</td>
                                        <td>{{ $tenant->first_name }}</td>
                                        <td>{{ $tenant->last_name }}</td>
                                        <td>
                                            <span class="badge bg-info text-dark">
                                                {{ $tenant->pivot->start_date }}
                                            </span>
                                        </td>
                                        <td>
                                            <span class="badge {{ $tenant->pivot->end_date ? 'bg-warning text-dark' : 'bg-success' }}">
                                                {{ $tenant->pivot->end_date ?: 'Активная аренда' }}
                                            </span>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>

@endsection