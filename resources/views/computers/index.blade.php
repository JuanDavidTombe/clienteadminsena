@extends('layouts.app')

@section('title', 'Equipos de cómputo')

@section('content')
    <div class="container mt-4">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1>Lista de Equipos de Cómputo</h1>
            <a href="{{ route('computers.create') }}" class="btn btn-success">Crear</a>
        </div>

        <div class="table-responsive">
            <table class="table table-bordered table-striped">
                <thead class="thead-dark">
                    <tr>
                        <th>id</th>
                        <th>number</th>
                        <th>brand</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($computers as $computer)
                        <tr>
                            <td>{{ $computer['id'] }}</td>
                            <td>{{ $computer['number'] }}</td>
                            <td>{{ $computer['brand'] }}</td>
                            <td>
                                <a href="{{ route('computers.show', $computer['id']) }}" class="btn btn-info btn-sm">Ver más</a>
                                <a href="{{ route('computers.edit', $computer['id']) }}" class="btn btn-warning btn-sm">Editar</a>
                                <form action="{{ route('computers.destroy', $computer['id']) }}" method="POST" style="display:inline-block;">
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
