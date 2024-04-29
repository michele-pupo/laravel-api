@extends('layouts.app')

@section('content')

<div class="container py-5 text-center">

    <h1 class="display-3 pb-5">Pagina di amministrazione</h1>

    <h2 class="pb-5">Benvenuto <span class="text-uppercase text-danger">{{$user->name}}</span></h2>
    {{-- @dump($user) --}}

    <div class="pb-4">
        <a href="{{route('admin.projects.index')}}" class="btn btn-info">Visualizza progetti</a>
        <a href="{{route('admin.projects.create')}}" class="btn btn-success">Aggiungi nuovo progetto</a>
    </div>
    <div>
        <a href="{{route('admin.types.index')}}" class="btn btn-danger">Gestione tipologie di progetto</a>
        <a href="{{route('admin.technologies.index')}}" class="btn btn-warning">Gestione tecnologie usate</a>
    </div>
</div>

@endsection