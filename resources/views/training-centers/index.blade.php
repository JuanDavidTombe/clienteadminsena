@extends('layouts.app')

@section('title', 'Centros de formación')

@section('content')
    <div class="container mt-4">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1>Lista de Centros de Formación</h1>
            <a href="{{ route('training-centers.create') }}" class="btn btn-success">Crear</a>
        </div>

        <div class="table-responsive">
            <table class="table table-bordered table-striped">
                <thead class="thead-dark">
                    <tr>
                        <th>id</th>
                        <th>name</th>
                        <th>location</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($trainingCenters as $trainingCenter)
                        <tr>
                            <td>{{ $trainingCenter['id'] }}</td>
                            <td>{{ $trainingCenter['name'] }}</td>
                            <td>{{ $trainingCenter['location'] ?? '' }}</td>
                            <td>
                                <a href="{{ route('training-centers.show', $trainingCenter['id']) }}" class="btn btn-info btn-sm">Ver más</a>
                                <a href="{{ route('training-centers.edit', $trainingCenter['id']) }}" class="btn btn-warning btn-sm">Editar</a>
                                <form action="{{ route('training-centers.destroy', $trainingCenter['id']) }}" method="POST" style="display:inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Eliminar?')">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center">No hay registros.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
