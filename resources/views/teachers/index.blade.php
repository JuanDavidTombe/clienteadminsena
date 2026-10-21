@php
    $areaNames = collect($areas)->pluck('name', 'id');
    $centerNames = collect($trainingCenters)->pluck('name', 'id');
@endphp

@extends('layouts.app')

@section('title', 'Instructores')

@section('content')
    <div class="container mt-4">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1>Lista de Instructores</h1>
            <a href="{{ route('teachers.create') }}" class="btn btn-success">Crear</a>
        </div>

        <div class="table-responsive">
            <table class="table table-bordered table-striped">
                <thead class="thead-dark">
                    <tr>
                        <th>id</th>
                        <th>name</th>
                        <th>email</th>
                        <th>area_id</th>
                        <th>training_center_id</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($teachers as $teacher)
                        <tr>
                            <td>{{ $teacher['id'] }}</td>
                            <td>{{ $teacher['name'] }}</td>
                            <td>{{ $teacher['email'] }}</td>
                            <td>{{ $teacher['area_id'] }}</td>
                            <td>{{ $teacher['training_center_id'] }}</td>
                            <td>
                                <a href="{{ route('teachers.show', $teacher['id']) }}" class="btn btn-info btn-sm">Ver más</a>
                                <a href="{{ route('teachers.edit', $teacher['id']) }}" class="btn btn-warning btn-sm">Editar</a>
                                <form action="{{ route('teachers.destroy', $teacher['id']) }}" method="POST" style="display:inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Eliminar?')">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center">No hay registros.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
