@extends('layouts.main')

@section('HealthForm - Cadastro de texto')

@section('content')

<form action="{{route('posts.store')}}" method="post" enctype="multipart/form-data" class="d-flex flex-column bg-default">
    @csrf 
    <h1 class="text-center text-dark w-100 display-5 fw-bold">Cadastre um texto motivacional</h1>

    <div class="input-group input-group-lg mb-3">
        <span class="input-group-text" id="inputGroup-sizing-lg">Título</span>
        <input type="text" name="titulo" placeholder="Título/nome" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg">
    </div>

    <div class="input-group input-group-lg mb-3">
        <span class="input-group-text">Conteúdo</span>
        <textarea class="form-control" aria-label="With textarea" name="conteudo" placeholder="Escreva algum texto"></textarea>
    </div>

    <select class="form-select form-select-lg mb-3" name="ativo" aria-label=".form-select-lg example">
        <option selected disabled>Ativo (Status)</option>
        <option>Sim</option>
        <option>Não</option>
    </select>

    <div class="input-group input-group-lg mb-3">
          <input type="file" name="imagem" class="form-control" id="inputGroupFile02">
          <label class="input-group-text" for="inputGroupFile02">Imagem Ilustrativa (opcional)</label>
    </div>

    <button type="submit" class="btn btn-primary btn-lg fs-3">Cadastrar</button>
</form>

@endsection