@extends('layouts.app')

@section('title', 'Crear área')

@section('content')
<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1>Crear área</h1>
        <a href="{{ route('areas.index') }}" class="btn btn-secondary">Volver</a>
    </div>

    <form action="{{ route('areas.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Nombre</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <button type="submit" class="btn btn-primary">Guardar</button>
    </form>
</div>
@endsection
