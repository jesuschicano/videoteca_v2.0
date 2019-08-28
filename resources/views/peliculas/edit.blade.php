@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">

			@if ($errors->any())
				<div class="col-sm-6 alert alert-danger">
					<ul>
						@foreach ($errors->all() as $error)
							<li>{{ $error }}</li>
						@endforeach
					</ul>
				</div>
			@endif

			@if(session('status'))
				<div class="col-sm-6 alert alert-success">
					{{ session('status') }}
				</div>
  		@endif

			<div class="col-sm-12 col-md-10 mt-4">
				<form action="{{ route('peliculas.update', $pelicula->id) }}" method="POST">
					@csrf
					@method('PUT')
					<!--  -->
					<div class="form-group">
						<label for="title">Título</label>
						<input type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ $pelicula->titulo }}" >
					</div>
					<!--  -->
					<div class="form-group">
						<label for="year">Año</label>
						<input type="number" class="form-control @error('year') is-invalid @enderror" name="year" value="{{ $pelicula->year }}" min="1900" max="2099">
					</div>
					<!--  -->
					<div class="form-group">
						<label for="duration">Duración</label>
						<input type="number" name="duration" class="form-control @error('duration') is-invalid @enderror" value="{{ $pelicula->duracion }}" min="1" max="500" size="3">
					</div>
					<!--  -->
					<div class="form-group">
						<label for="director">Director</label>
						<input type="text" class="form-control @error('director') is-invalid @enderror" name="director" value="{{ $pelicula->director }}">
					</div>
					<!--  -->
					<div class="form-group">
						<label for="genero">Género</label>
						<select name="genero" class="form-control">
							@foreach($generos as $g)
								<option value="{{ $g->id }}" {{ $g->id == $pelicula->id_genero ? 'selected' : '' }}>
									{{ $g->genero }}
								</option>
							@endforeach
						</select>
					</div>
					<!--  -->
					<button type="submit" class="btn btn-primary">Modificar</button>
				</form>	
			</div>

    </div>
</div>
@endsection