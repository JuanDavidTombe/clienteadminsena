@extends('layouts.app')

@section('title', 'Crear instructor')

@section('content')
<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1>Crear instructor</h1>
        <a href="{{ route('teachers.index') }}" class="btn btn-secondary">Volver</a>
    </div>
    <form action="{{ route('teachers.store') }}" method="POST">
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
            <label for="area_id" class="form-label">Área</label>
            <select class="form-control" id="area_id" name="area_id">
                @foreach($areas as $area)
                    <option value="{{ $area['id'] }}">{{ $area['name'] }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="training_center_id" class="form-label">Centro de formación</label>
            <select class="form-control" id="training_center_id" name="training_center_id">
                @foreach($trainingCenters as $tc)
                    <option value="{{ $tc['id'] }}">{{ $tc['name'] }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Guardar</button>
    </form>
</div>
@endsection
