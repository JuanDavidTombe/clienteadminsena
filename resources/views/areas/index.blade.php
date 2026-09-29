@extends('layouts.app')

@section('title', 'Áreas')

@section('content')
    <div class="container mt-4">
        <h1 class="mb-4">Lista de Áreas</h1>

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
