@extends('layouts.main')

@section('title','Editar questionário')

@section('content')

<form action="{{route('questionarios.update', $Questionario->id)}}" method="post" id="form">
    @csrf
    @method('PUT')
    <h1 class="text-center text-dark w-100">Edite um questionário</h1>

    <label for="">Título do questionário:</label>
    <input type="text" value="{{$Questionario->titulo}}" name="titulo">

    <label for="">Ativo:</label>
    <select name="ativo">
        @if($Questionario->ativo == "Sim")
        <option selected>Sim</option>
        @else
        <option>Sim</option>
        @endif
        @if($Questionario->ativo == "Não")
        <option selected>Não</option>
        @else
        <option>Não</option>
        @endif
    </select>

    <button type="submit">Editar</button>
</form>

@endsection