@extends('layouts.app')

@section('title', 'Editar computador')

@section('content')
<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1>Editar computador</h1>
        <a href="{{ route('computers.index') }}" class="btn btn-secondary">Volver</a>
    </div>

    <form action="{{ route('computers.update', $computer['id']) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="serial" class="form-label">Serial</label>
            <input type="text" class="form-control" id="serial" name="serial" value="{{ $computer['serial'] ?? '' }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Actualizar</button>
    </form>
</div>
@endsection
