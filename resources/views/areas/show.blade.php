@extends('layouts.app')

@section('title', 'Área')

@section('content')
<div class="container my-5">
    <h2 class="mb-4 text-success">Detalles del Área</h2>

    @if (!empty($area['image_url']))
        <div class="mb-4 text-center">
            <a href="{{ $area['image_url'] }}" target="_blank">
                <img src="{{ $area['image_url'] }}" alt="Imagen de {{ $area['name'] ?? 'Área' }}" class="img-fluid rounded shadow" style="max-height: 300px;">
            </a>
        </div>
    @endif

    <div class="table-responsive">
        <table class="table table-bordered table-hover">
            <thead class="table-success">
                <tr>
                    <th scope="col">Campo</th>
                    <th scope="col">Valor</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($area as $key => $value)
                    <tr>
                        <td><strong>{{ $key }}</strong></td>
                        <td>
                            @if ($key === 'image_url' && !empty($value))
                                <a href="{{ $value }}" target="_blank">{{ $value }}</a>
                            @else
                                {{ is_array($value) ? json_encode($value) : $value }}
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <a href="{{ route('areas.index') }}" class="btn btn-outline-success">Volver al listado</a>
</div>
@endsection
