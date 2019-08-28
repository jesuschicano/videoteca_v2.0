@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        @foreach($data as $p)
            <li class="list-group-item col-lg-4 mx-2 my-2">
                <h3>{{ $p->genero }} 
                <span class="badge badge-primary float-right">
                    {{ $p->peliculas_count }}
                </span></h3>
            </li>
        @endforeach
    </div>
</div>
@endsection