@php
    $areaNames = collect($areas)->pluck('name', 'id');
    $centerNames = collect($trainingCenters)->pluck('name', 'id');
@endphp

@extends('layouts.app')

@section('title', 'Cursos')

@section('content')
    <div class="container mt-4">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1>Lista de Cursos</h1>
            <a href="{{ route('courses.create') }}" class="btn btn-success">Crear</a>
        </div>

        <div class="table-responsive">
            <table class="table table-bordered table-striped">
                <thead class="thead-dark">
                    <tr>
                        <th>id</th>
                        <th>name</th>
                        <th>code</th>
                        <th>area_id</th>
                        <th>training_center_id</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($courses as $course)
                        <tr>
                            <td>{{ $course['id'] }}</td>
                            <td>{{ $course['name'] ?? ($course['course_number'] ?? '') }}</td>
                            <td>{{ $course['code'] ?? ($course['course_number'] ?? '') }}</td>
                            <td>{{ $course['area_id'] }}</td>
                            <td>{{ $course['training_center_id'] }}</td>
                            <td>
                                <a href="{{ route('courses.show', $course['id']) }}" class="btn btn-info btn-sm">Ver más</a>
                                <a href="{{ route('courses.edit', $course['id']) }}" class="btn btn-warning btn-sm">Editar</a>
                                <form action="{{ route('courses.destroy', $course['id']) }}" method="POST" style="display:inline-block;">
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
