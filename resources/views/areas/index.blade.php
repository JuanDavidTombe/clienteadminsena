@extends('layouts.app')

@section('title', 'Áreas')

@section('content')
    <div class="container mt-4">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1>Lista de Áreas</h1>
            <a href="{{ route('areas.create') }}" class="btn btn-success">Crear área</a>
        </div>

        <div class="table-responsive">
            <table class="table table-bordered table-striped">
                <thead class="thead-dark">
                    <tr>
                        <th>id</th>
                        <th>name</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($areas as $area)
                        <tr>
                            <td>{{ $area['id'] }}</td>
                            <td>{{ $area['name'] }}</td>
                            <td>
                                <a href="{{ route('areas.show', $area['id']) }}" class="btn btn-info btn-sm">Ver más</a>
                                <a href="{{ route('areas.edit', $area['id']) }}" class="btn btn-warning btn-sm">Editar</a>
                                <form action="{{ route('areas.destroy', $area['id']) }}" method="POST" style="display:inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Eliminar área?')">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3" class="text-center">No hay registros.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
