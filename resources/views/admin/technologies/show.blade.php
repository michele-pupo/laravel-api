@extends('layouts.app')

@section('content')

<div class="container py-2">

    <div class="d-flex flex-column gap-3 align-items-center">
        <h2 class="fw-bold display-3">{{$technology->title}}</h2>
        <div class="text-center">
            <span class="badge rounded-pill text-black text-uppercase fw-bold" style="background-color: {{$technology->color}}">{{$technology->title}}</span>
            
        </div>
        <div class="container justify-content-center d-flex gap-5">
            <button class="btn btn-warning"><a class="text-decoration-none text-white" href="{{route('admin.technologies.edit', $technology->id)}}">Modifica</a></button>
            <button type="button" class="btn btn-danger px-3" data-bs-toggle="modal" data-bs-target="#exampleModal">Elimina</button>
            <button class="btn btn-secondary"><a class="text-decoration-none text-white" href="{{route('admin.technologies.index')}}">Indietro</a></button>
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Elimina la tecnologia</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                    <div class="modal-body">
                        Sei proprio sicuro di voler eliminare la tecnologia: {{$technology->title}}?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annulla</button>
                        <form action="{{route('admin.technologies.destroy', $technology->id)}}" method="POST">

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