@extends('layouts.main')

@section('title','Editar formulário')

@section('content')

<form action="{{route('formularios.update', $Formulario->id)}}" method="post" id="form">
    @csrf
    @method('PUT')
    <h1 class="text-center text-dark w-100">Edite um formulário</h1>

    <label for="">Título do formulário:</label>
    <input type="text" value="{{$Formulario->titulo}}" name="titulo">

    <label for="">Ativo:</label>
    <select name="ativo">
        @if($Formulario->ativo == "Sim")
        <option selected>Sim</option>
        @else
        <option>Sim</option>
        @endif
        @if($Formulario->ativo == "Não")
        <option selected>Não</option>
        @else
        <option>Não</option>
        @endif
    </select>

    <button type="submit">Editar</button>
</form>

@endsection