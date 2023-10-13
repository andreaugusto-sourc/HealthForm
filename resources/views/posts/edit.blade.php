@extends('layouts.main')

@section('title','Edição de texto motivacional')

@section('content')

<form action="{{route('posts.update', $Post->id)}}" method="post" enctype="multipart/form-data" class="d-flex flex-column bg-default">
    @csrf
    @method('PUT')
    <h1 class="text-center text-dark w-100">Edite um texto motivacional</h1>

    <div class="input-group input-group-lg mb-3">
        <span class="input-group-text" id="inputGroup-sizing-lg">Título</span>
        <input type="text" name="titulo" value="{{$Post->titulo}}" placeholder="Título/nome" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg">
    </div>

    <div class="input-group input-group-lg mb-3">
        <span class="input-group-text" id="inputGroup-sizing-lg">Conteúdo</span>
        <input class="form-control" aria-label="With input" name="conteudo" value="{{$Post->conteudo}}" placeholder="Escreva algum texto">
    </div>

    <select class="form-select form-select-lg mb-3" name="ativo" value="{{$Post->ativo}}" aria-label=".form-select-lg example">
        <option selected disabled>Ativo (Status)</option>
        @if($Post->ativo == "Sim")
        <option selected>Sim</option>
        @else
        <option>Sim</option>
        @endif
        @if($Post->ativo == "Não")
        <option selected>Não</option>
        @else
        <option>Não</option>
        @endif
    </select>

    <div class="input-group input-group-lg mb-3">
          <input type="file" name="imagem" class="form-control" id="inputGroupFile02">
          <label class="input-group-text" for="inputGroupFile02">Imagem Ilustrativa (opcional)</label>
    </div>

    <button type="submit" class="btn btn-primary btn-lg fs-3">Editar</button>
</form>

@endsection