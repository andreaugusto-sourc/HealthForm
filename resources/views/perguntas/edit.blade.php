@extends('layouts.main')

@section('title',"Editar perguntas")

@section('content')


<form action="{{route('perguntas.update', $pergunta->id)}}" method="post" class="d-flex flex-column bg-default">
    @csrf
    @method('PUT')
    <h1 class="text-center text-dark w-100 display-5 fw-bold mb-3">Edite uma pergunta</h1>

    <div class="input-group input-group-lg mb-3">
        <span class="input-group-text" id="inputGroup-sizing-lg">Texto da pergunta</span>
        <input type="text" value="{{$pergunta->texto}}" name="texto" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg">
    </div>

    <div class="input-group input-group-lg mb-3">
        <span class="input-group-text" id="inputGroup-sizing-lg">Orientação da pergunta</span>
        <input type="text" value="{{$pergunta->placeholder}}" name="placeholder" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg">
    </div>

    <button type="submit" class="btn btn-primary">Editar</button>

</form>


@endsection