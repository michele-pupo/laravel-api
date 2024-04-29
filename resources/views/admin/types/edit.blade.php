@extends('layouts.app')

@section('content')

<div class="container py-5">

    <h1>Modifica la tipologia</h1>
    
    <form action="{{ route('admin.types.update', $type->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="title" class="form-label">Tipologia</label>
            <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{old('title') ?? $type->title}}" required>
            @error('title')
            <div class="invalid-feedback">
                {{$message}}
            </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Descrizione</label>
            <textarea type="text" class="form-control @error('description') is-invalid @enderror"  name="description">{{old('description') ?? $type->description}}</textarea>
            @error('description')
            <div class="invalid-feedback">
                {{$message}}
            </div>
            @enderror
        </div>

        
        <button type="submit" class="btn btn-primary">Salva</button>
        <a href="{{ route('admin.types.index') }}" class="btn btn-secondary">Indietro</a>
    </form>
</div>

@endsection