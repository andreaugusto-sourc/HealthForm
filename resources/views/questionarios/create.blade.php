@extends('layouts.main')

@section('title','Cadastro de questionário')

@section('content')

<form action="{{route('questionarios.store')}}" method="post" id="form">
    @csrf 
    <h1 class="text-center text-dark w-100">Cadastre um questionário</h1>

    <label for="">Título:</label>
    <input type="text" placeholder="Título/nome" name="titulo">

    <label for="">Descrição:</label>
    <input type="text" placeholder="Descriçao" name="descricao">

    <label for="">Ativo:</label>
    <select name="ativo">
        <option>Sim</option>
        <option>Não</option>
    </select>

    <button type="submit">Cadastrar</button>
</form>

@endsection