@extends('layouts.app')

@section('content')

<div class="container py-5">

    <h1>Modifica la tecnologia</h1>
    
    <form action="{{ route('admin.technologies.update', $technology->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="title" class="form-label">Tipologia</label>
            <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{old('title') ?? $technology->title}}" required>
            @error('title')
            <div class="invalid-feedback">
                {{$message}}
            </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="color" class="form-label">Colore</label>
            <input type="color" name="color">{{old('color') ?? $technology->color}}</input>
        </div>

        
        <button type="submit" class="btn btn-primary">Salva</button>
        <a href="{{ route('admin.technologies.index') }}" class="btn btn-secondary">Indietro</a>
    </form>
</div>

@endsection