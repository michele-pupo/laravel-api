@extends('layouts.app')

@section('content')

<div class="container py-5">

    <h1>Modifica il progetto</h1>
    
    <form action="{{ route('admin.projects.update', $project) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="name" class="form-label">Titolo progetto</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{old('name') ?? $project->name}}" required>
            @error('title')
            <div class="invalid-feedback">
                {{$message}}
            </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Descrizione</label>
            <textarea type="text" class="form-control @error('description') is-invalid @enderror"  name="description" required>{{old('description') ?? $project->description}}</textarea>
            @error('description')
            <div class="invalid-feedback">
                {{$message}}
            </div>
            @enderror
        </div>

        <div class="mb-3">
            <img class="w-50" src="{{asset('storage/' . $project->project_image)}}" alt="Copertina progetto">
            <label for="project_image" class="form-label">Copertina</label>
            <input type="file" class="form-control @error('project_image') is-invalid @enderror" name="project_image">
            @error('project_image')
            <div class="invalid-feedback">
                {{$message}}
            </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="project_date" class="form-label">Data di consegna</label>
            <input type="date" class="form-control @error('project_date') is-invalid @enderror" name="project_date" value="{{old('project_date') ?? $project->project_date}}" required>
            @error('project_date')
            <div class="invalid-feedback">
                {{$message}}
            </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="link_github" class="form-label">Link Github</label>
            <input type="text" class="form-control @error('link_github') is-invalid @enderror" name="link_github" value="{{old('link_github') ?? $project->link_github}}" required>
            @error('link_githube')
            <div class="invalid-feedback">
                {{$message}}
            </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="type" class="form-label">Tipologia</label>
            <select class="form-select" name="type_id" id="type_id">
               @foreach ($types as $type)
                    <option value="{{$type->id}}" {{$type->id == old('$type_id', $project->type ? $project->type->id : '') ? 'selected' : ''}}>
                        {{$type->title}}
                    </option>
               @endforeach 
            </select>
        </div>

        <div class="mb-3">
            <label for="">Tecnologie</label>
            <div class="d-flex gap-3">
                @foreach($technologies as $technology)
                <div class="form-check">

                    @if($errors->any())

                    <input 
                        type="checkbox" 
                        name="technologies[]" 
                        value="{{$technology->id}}" 
                        class="form-check-input" 
                        id="technology-{{$technology->id}}" 
                        {{in_array($technology->id, old('technologies', $project->technologies->pluck('id')->toArray())) ? 'checked' : ''}}
                    >
                    @else
                    <input 
                        type="checkbox" 
                        name="technologies[]" 
                        value="{{$technology->id}}" 
                        class="form-check-input" 
                        id="technology-{{$technology->id}}" 
                        {{in_array($technology->id, old('technologies', $project->technologies->pluck('id')->toArray())) ? 'checked' : ''}}
                    >
                    @endif
                    <label 
                        class="form-check-label" 
                        for="technology-{{$technology->id}}"
                    >{{$technology->title}}</label>
                </div>
                @endforeach
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Salva</button>
        <a href="{{ route('admin.projects.index') }}" class="btn btn-secondary">Indietro</a>
    </form>
</div>

@endsection