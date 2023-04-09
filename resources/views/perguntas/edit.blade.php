@extends('layouts.main')

@section('title',"Editar perguntas")

@section('content')


<form action="{{route('perguntas.update', $Pergunta->id)}}" method="post" id="form">
    @csrf
    @method('PUT')
    <h1 class="text-center text-dark w-100">Edite uma pergunta</h1>

    <label for="texto">Texto da pergunta:</label>
    <input type="text" value="{{$Pergunta->texto}}" name="texto">

    <button type="submit">Editar</button>

</form>


@endsection