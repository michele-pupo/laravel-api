@extends('layouts.app')

@section('content')

<div class="container py-5">
    <h1>Inserisci nuova tecnologia</h1>
    <form action="{{ route('admin.technologies.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label for="title" class="form-label">Titolo</label>
            <input type="text" class="form-control @error('tile') is-invalid @enderror" name="title" value="{{old('title')}}" required>
            @error('title')
            <div class="invalid-feedback">
                {{$message}}
            </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="color" class="form-label">Colore</label>
            <input type="color" name="color">{{old('color')}}</input>
        </div>

       
        <button type="submit" class="btn btn-primary">Salva</button>
        <a href="{{ route('admin.technologies.index') }}" class="btn btn-secondary">Indietro</a>
    </form>
</div>

@endsection