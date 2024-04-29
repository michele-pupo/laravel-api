@extends('layouts.app')

@section('content')

<div class="container py-2">
    <h1 class="text-center pb-4 display-5 fw-bold text-uppercase">Lista tecnologie</h1>
    <table class="table">
        <thead>
            <tr>
            <th scope="col">#</th>
            <th scope="col">Titolo</th>
            <th scope="col">Colore</th>
            <th scope="col"></th>
            <th scope="col"></th>
            </tr>
        </thead>
    <tbody>
    
            {{-- @dump($types) --}}
            @foreach($technologies as $technology)
            <tr>
                <th scope="row">{{$loop->index + 1}}</th>
                <td>{{$technology->title}}</td>
                <td><span class="badge rounded-pill text-black text-uppercase fw-bold" style="background-color: {{$technology->color}}">{{$technology->title}}</span></td>
                <td><a href="{{route('admin.technologies.show', $technology->id)}}" class="btn btn-info">Mostra</a></td>
                <td><a href="{{route('admin.technologies.edit', $technology->id)}}" class="btn btn-warning">Modifica</a></td>
            </tr>
            @endforeach
    
    </tbody>
    </table>
    <div class="d-flex justify-content-center gap-2">
        <button class="btn btn-primary mt-5"><a class="text-decoration-none " href="{{route('admin.technologies.create')}}">Aggiungi tecnologia</a></button>
        <button class="btn btn-secondary mt-5"><a class="text-decoration-none " href="{{route('admin.index')}}">indietro</a></button>
    </div>
</div>

@endsection