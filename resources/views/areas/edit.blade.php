@extends('layouts.app')

@section('title', 'Editar área')

@section('content')
<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1>Editar área</h1>
        <a href="{{ route('areas.index') }}" class="btn btn-secondary">Volver</a>
    </div>

    <form action="{{ route('areas.update', $area['id']) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="name" class="form-label">Nombre</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $area['name'] ?? '' }}" required>
        </div>

        @if (!empty($area['image_url']))
            <div class="mb-3">
                <label class="form-label d-block">Imagen actual</label>
                <img src="{{ $area['image_url'] }}" alt="Imagen de {{ $area['name'] }}" class="img-thumbnail" style="max-height: 150px;">
            </div>
        @endif

        <div class="mb-3">
            <label for="image" class="form-label">Cambiar Imagen (Cloudinary)</label>
            <input type="file" class="form-control" id="image" name="image" accept="image/*">
            <div class="form-text">Deja este campo vacío si deseas conservar la imagen actual.</div>
        </div>

        <button type="submit" class="btn btn-primary">Actualizar</button>
    </form>
</div>
@endsection
