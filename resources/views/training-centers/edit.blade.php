@extends('layouts.app')

@section('title', 'Editar centro de formación')

@section('content')
<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1>Editar centro de formación</h1>
        <a href="{{ route('training-centers.index') }}" class="btn btn-secondary">Volver</a>
    </div>

    <form action="{{ route('training-centers.update', $trainingCenter['id']) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="name" class="form-label">Nombre</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $trainingCenter['name'] ?? '' }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Actualizar</button>
    </form>
</div>
@endsection
