@extends('layouts.app')

@section('title', 'Editar curso')

@section('content')
<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1>Editar curso</h1>
        <a href="{{ route('courses.index') }}" class="btn btn-secondary">Volver</a>
    </div>
    <form action="{{ route('courses.update', $course['id']) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="name" class="form-label">Nombre</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $course['name'] ?? ($course['course_number'] ?? '') }}" required>
        </div>
        <div class="mb-3">
            <label for="code" class="form-label">Código</label>
            <input type="text" class="form-control" id="code" name="code" value="{{ $course['code'] ?? ($course['course_number'] ?? '') }}" required>
        </div>
        <div class="mb-3">
            <label for="area_id" class="form-label">Área</label>
            <select class="form-control" id="area_id" name="area_id">
                @foreach($areas as $area)
                    <option value="{{ $area['id'] }}" @if(($course['area_id'] ?? null) == $area['id']) selected @endif>{{ $area['name'] }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="training_center_id" class="form-label">Centro de formación</label>
            <select class="form-control" id="training_center_id" name="training_center_id">
                @foreach($trainingCenters as $tc)
                    <option value="{{ $tc['id'] }}" @if(($course['training_center_id'] ?? null) == $tc['id']) selected @endif>{{ $tc['name'] }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Actualizar</button>
    </form>
</div>
@endsection
