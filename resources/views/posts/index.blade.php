@extends('layouts.main')

@section('title','HealthForm - Textos Motivacionais')

@section('content')

<div class="d-flex flex-column w-100">

    <form class="d-flex align-items-center justify-content-around bg-dark pt-3 pb-3" action="{{route('posts.index')}}" method="get">
        <h2>Filtrar por:</h2>
        @csrf
        <label for="categoria" class="fs-5">Categoria:</label>
        <select name="categoria" id="categoria"><option>Selecione uma categoria</option></select>

        <label for="ordenacao" class="fs-5">Ordernar por:</label>
        <select name="ordenacao" id="ordenacao"><option>Data mais recente</option></select>

        <button type="submit" class="btn btn-light btn-lg">Filtrar</button>
    </form>

    <div class="d-flex flex-wrap align-items-center posts">
      @foreach ($posts as $post)
        <div class="card" style="width: 18rem;">
            <div class="card-body">
              <h5 class="card-title text-center fw-bold">{{$post->titulo}}</h5>
              <p class="card-text">{{$post->conteudo}}</p>
              <a href="{{route('posts.show', $post->id)}}" class="btn btn-primary">Visualizar</a>
            </div>
        </div>
      @endforeach
    </div>

</div>

@endsection