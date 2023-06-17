@extends('layouts.main')

@section('HealthForm - Cadastro de texto')

@section('content')

<form action="{{route('posts.store')}}" method="post" id="form" enctype="multipart/form-data">
    @csrf 
    <h1 class="text-center text-dark w-100">Cadastre um texto motivacional</h1>

    <label for="">Título:</label>
    <input type="text" placeholder="Título/nome" name="titulo">

    <label for="">Conteúdo:</label>
    <input type="text" placeholder="Conteúdo" name="conteudo">

    <label for="">Ativo:</label>
    <select name="ativo">
        <option>Sim</option>
        <option>Não</option>
    </select>

    <label for="">Imagem ilustrativa (opcional):</label>
    <input type="file" name="imagem">

    <label for="">Errata (Apenas preencha para fazer alguma correção no seu texto):</label>
    <input type="text" placeholder="Errata" name="errata">

    <button type="submit">Cadastrar</button>
</form>

@endsection