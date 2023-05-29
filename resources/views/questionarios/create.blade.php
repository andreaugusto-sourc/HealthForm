@extends('layouts.main')

@section('title','Cadastro de questionário')

@section('content')

<form action="{{route('questionarios.store')}}" method="post" id="form">
    @csrf 
    <h1 class="text-center text-dark w-100">Cadastre um questionário</h1>

    <label for="">Título do questionário:</label>
    <input type="text" placeholder="Título/nome do questionário" name="titulo">

    <label for="">Ativo:</label>
    <select name="ativo">
        <option>Sim</option>
        <option>Não</option>
    </select>

    <button type="submit">Cadastrar</button>
</form>

@endsection