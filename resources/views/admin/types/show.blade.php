@extends('layouts.app')

@section('content')

<div class="container py-2">

    <div class="d-flex flex-column gap-3 align-items-center">
        <h2 class="fw-bold display-3">{{$type->title}}</h2>
        <div class="text-center">
            <p class="fs-5">{{$type->description}}</p>
            
        </div>
        <div class="container justify-content-center d-flex gap-5">
            <button class="btn btn-warning"><a class="text-decoration-none text-white" href="{{route('admin.types.edit', $type->id)}}">Modifica</a></button>
            <button type="button" class="btn btn-danger px-3" data-bs-toggle="modal" data-bs-target="#exampleModal">Elimina</button>
            <button class="btn btn-secondary"><a class="text-decoration-none text-white" href="{{route('admin.types.index')}}">Indietro</a></button>
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Elimina il tipo</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                    <div class="modal-body">
                        Sei proprio sicuro di voler eliminare il tipo: {{$type->title}}?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annulla</button>
                        <form action="{{route('admin.types.destroy', $type->id)}}" method="POST">

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