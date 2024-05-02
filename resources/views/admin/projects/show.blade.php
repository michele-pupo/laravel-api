@extends('layouts.app')

@section('content')

<div class="container py-2">

    <div class="d-flex flex-column gap-3 align-items-center">
        <h2 class="fw-bold display-3">{{$project->name}}</h2>
        <img class="w-75" src="{{asset('storage/' . $project->project_image)}}" alt="Copertina progetto">
        <div class="text-center">
            <p class="fs-5">{{$project->description}}</p>
            <div class="pb-3">
                @foreach($project->technologies as $technology)
                    <span class="badge rounded-pill text-black text-uppercase fw-bold" style="background-color: {{$technology->color ?? 'rgba(255,255,255,.4)'}}">{{$technology->title}}</span>
                @endforeach
            </div>
            <h6 class="text-danger fs-3 pb-2">{{$project->type?->title}}</h6>
            <h6>{{ \Carbon\Carbon::parse($project->project_date)->format('d/m/Y') }}</h6>
            <h6><a href="{{$project->link_github}}">link progetto github</a></h6>
            
        </div>
        <div class="container justify-content-center d-flex gap-5">
            <button class="btn btn-warning"><a class="text-decoration-none text-white" href="{{route('admin.projects.edit', $project)}}">Modifica</a></button>
            <button type="button" class="btn btn-danger px-3" data-bs-toggle="modal" data-bs-target="#exampleModal">Elimina</button>
            <button class="btn btn-secondary"><a class="text-decoration-none text-white" href="{{route('admin.projects.index')}}">Indietro</a></button>
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Elimina il progetto</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                    <div class="modal-body">
                        Sei proprio sicuro di voler eliminare il progetto: {{$project->name}}?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annulla</button>
                        <form action="{{route('admin.projects.destroy', $project)}}" method="POST">

                            @csrf

                            @method("DELETE")

                            <button class="btn btn-danger">Elimina</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection