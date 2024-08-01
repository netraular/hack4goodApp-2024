@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Resultados de la Búsqueda</h1>
    <table class="table" id="results-table">
        <thead>
            <tr>
                <th style=" display: none;">ID</th>
                <th>Imagen</th>
                <th>Nombre</th>
                <th>Marca</th>
                <th>Categoría</th>
                <th>Descripción</th>
                <th>Puntuación</th>
                <th>Distancia</th>
                <th>Lugar</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($results as $result)
            <tr>
                <td style=" display: none;">{{ $result['qr']->id }}</td>
                <td>
                    @if($result['product'] && $result['product']->pic)
                    <img src="{{ asset($result['product']->pic) }}" alt="Imagen del producto" style="max-width: 100px; max-height: 100px;">
                    @else
                    N/A
                    @endif
                </td>
                <td>{{ $result['product'] ? $result['product']->name : 'N/A' }}</td>
                <td>{{ $result['product'] ? $result['product']->marca : 'N/A' }}</td>
                <td>{{ $result['product'] ? $result['product']->category : 'N/A' }}</td>
                <td>{{ $result['product'] ? $result['product']->description : 'N/A' }}</td>
                <td>{{ $result['qr']->puntuacion }}</td>
                <td>{{ $result['qr']->distancia }}</td>
                <td>{{ $result['node'] ? $result['node']->lugar : 'N/A' }}</td>
                
                <td>
                    <a href="https://eco2.netshiba.com/viewqr?id={{ $result['qr']->id }}" class="btn btn-primary">Saber más</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection

@section('scripts')
<script>
    $(document).ready(function() {
        $('#results-table').DataTable();
    });
</script>
@endsection