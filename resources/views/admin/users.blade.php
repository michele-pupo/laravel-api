@extends('layouts.app')

@section('content')

<div class="container py-5">

    <h1>Tutti gli utenti admin</h1>
    <span class="text-uppercase text-danger">{{$user->name}}</span>

</div>

@endsection