@extends('layouts.main')

@section('title', $Post->titulo)

@section('content')

<div class="d-flex justify-content-center align-items-center bg-default">

    @isset($Post->imagem)
    <img src="/images/uploads/{{$Post->imagem}}" alt="{{$Post->titulo}}">
    @endisset
 
    <div class="d-flex flex-column align-items-center">
        <h1 class="text-dark">{{$Post->titulo}}</h1>
        <p class="text-center text-dark fs-5 mb-3 lh-lg">{{$Post->conteudo}}</p>
        <a href="{{route('posts.index')}}"><button type="submit" class="btn btn-primary btn-lg">Voltar</button></a>
    </div>

</div>

@endsection