@extends('layouts.app')

@section('title', 'Crear aprendiz')

@section('content')
<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1>Crear aprendiz</h1>
        <a href="{{ route('apprentices.index') }}" class="btn btn-secondary">Volver</a>
    </div>
    <form action="{{ route('apprentices.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Nombre</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Correo</label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>
        <div class="mb-3">
            <label for="course_id" class="form-label">Curso</label>
            <select class="form-control" id="course_id" name="course_id">
                @foreach($courses as $course)
                    <option value="{{ $course['id'] }}">{{ $course['name'] ?? ($course['course_number'] ?? $course['id']) }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="computer_id" class="form-label">Computador</label>
            <select class="form-control" id="computer_id" name="computer_id">
                @foreach($computers as $computer)
                    <option value="{{ $computer['id'] }}">{{ $computer['number'] ?? $computer['serial'] ?? $computer['id'] }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Guardar</button>
    </form>
</div>
@endsection
