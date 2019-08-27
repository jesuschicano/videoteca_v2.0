@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <ul class="list-group">
            <li class="list-group-item active">Géneros</li>
            @foreach($generos as $genero)
                <li class="list-group-item">{{ $genero->genero }}</li>
            @endforeach
        </ul>
    </div>
</div>
@endsection