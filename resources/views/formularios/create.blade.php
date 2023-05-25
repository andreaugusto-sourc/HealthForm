@extends('layouts.main')

@section('title','Cadastro de formulário')

@section('content')

<form action="{{route('formularios.store')}}" method="post" id="form">
    @csrf 
    <h1 class="text-center text-dark w-100">Cadastre um formulário</h1>

    <label for="">Título do formulário:</label>
    <input type="text" placeholder="Título/nome do formulário" name="titulo">

    <label for="">Ativo:</label>
    <select name="ativo">
        <option>Sim</option>
        <option>Não</option>
    </select>

    <button type="submit">Cadastrar</button>
</form>


@endsection