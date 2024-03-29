@extends('layouts.main')

@section('title','HealthForm - Textos Psicoeducativos')

@section('title_page','Textos Psicoeducativos')

@section('content')

<div class="d-flex flex-column w-100">

    <form id="form_categorias" class="d-flex align-items-center justify-content-around bg-dark pt-3 pb-3" action="{{route('posts.index')}}" method="get">
        <h2>Filtrar por categorias:</h2>
        @csrf

        <select onchange="enviarFormulario()" class="form-select form-select-lg w-50" aria-label="Default select example" name="categoria_id">

          <option value="Todas" selected>Todas</option>

          @foreach ($categorias as $categoria)

          @if (isset($categoria_id))
          
            @if ($categoria->id != $categoria_id) 
            <option value="{{$categoria->id}}">{{$categoria->nome}}</option>
            @else
            <option selected disabled>{{$categoria->nome}}</option>
            @endif

          @else
          <option value="{{$categoria->id}}">{{$categoria->nome}}</option>
          @endif

          @endforeach
        </select>

    </form>

    <div class="d-flex flex-wrap justify-content-center align-items-baseline posts">
      @foreach ($posts as $post)
        <div class="card" style="width: 18rem;">
            <div class="card-body text-center">
              <h5 class="card-title fw-bold">{{$post->titulo}}</h5>
              <p class="card-text">{{$post->conteudo}}</p>
              <a href="{{route('posts.show', $post->id)}}" class="btn btn-primary fs-4">Visualizar</a>
            </div>
        </div>
      @endforeach
    </div>

</div>

@endsection