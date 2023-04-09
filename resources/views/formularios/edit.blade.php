@extends('layouts.main')

@section('title','Editar formulário')

@section('content')

<form action="{{route('formularios.update', $Formulario->id)}}" method="post" id="form">
    @csrf
    @method('PUT')
    <h1 class="text-center text-dark w-100">Edite um formulário</h1>

    <label for="">Título do formulário:</label>
    <input type="text" value="{{$Formulario->titulo}}" name="titulo">

    <button type="submit">Editar</button>
</form>

@endsection