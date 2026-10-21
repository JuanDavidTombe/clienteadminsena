@php
    $courseNumbers = collect($courses)->pluck('course_number', 'id');
    $computerNumbers = collect($computers)->pluck('number', 'id');
@endphp

@extends('layouts.app')

@section('title', 'Aprendices')

@section('content')
    <div class="container mt-4">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1>Lista de Aprendices</h1>
            <a href="{{ route('apprentices.create') }}" class="btn btn-success">Crear</a>
        </div>

        <div class="table-responsive">
            <table class="table table-bordered table-striped">
                <thead class="thead-dark">
                    <tr>
                        <th>id</th>
                        <th>name</th>
                        <th>email</th>
                        <th>cell_number</th>
                        <th>course_id</th>
                        <th>computer_id</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($apprentices as $apprentice)
                        <tr>
                            <td>{{ $apprentice['id'] }}</td>
                            <td>{{ $apprentice['name'] }}</td>
                            <td>{{ $apprentice['email'] }}</td>
                            <td>{{ $apprentice['cell_number'] }}</td>
                            <td>{{ $apprentice['course_id'] }} <span class="badge bg-light text-dark">{{ $courseNumbers[$apprentice['course_id']] ?? '' }}</span></td>
                            <td>{{ $apprentice['computer_id'] }} <span class="badge bg-light text-dark">{{ $computerNumbers[$apprentice['computer_id']] ?? '' }}</span></td>
                            <td>
                                <a href="{{ route('apprentices.show', $apprentice['id']) }}" class="btn btn-info btn-sm">Ver más</a>
                                <a href="{{ route('apprentices.edit', $apprentice['id']) }}" class="btn btn-warning btn-sm">Editar</a>
                                <form action="{{ route('apprentices.destroy', $apprentice['id']) }}" method="POST" style="display:inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Eliminar?')">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center">No hay registros.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
