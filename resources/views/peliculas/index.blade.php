@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <table class="table table-stripped table-bordered" id="example">
            <thead>
                <tr>
                    <th>Título</th>
                    <th>Año</th>
                    <th>Duración</th>
                    <th>Director</th>
                    <th>Género</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($peliculas as $pelicula)
                    <tr>
                        <td>{{ $pelicula->titulo }}</td>
                        <td>{{ $pelicula->year }}</td>
                        <td>{{ $pelicula->duracion }}</td>
                        <td>{{ $pelicula->director }}</td>
                        <td>{{ $pelicula->genero->genero }}</td>
                        <td>
                            <a href="{{ route('peliculas.edit', $pelicula->id) }}" class="btn btn-warning btn-sm">Editar
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection

@push('table')
    <!-- Data Table -->
    <script src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.18/js/dataTables.bootstrap4.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#example').DataTable({
                "lengthMenu": [[25, 50, -1], [25, 50, "All"]],
            });
        } );
    </script>
@endpush