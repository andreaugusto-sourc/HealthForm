@extends('layouts.main')

@section('title', $questionario->titulo)

@section('content')

<form action="{{route('respostas.store')}}" method="post" class="d-flex flex-column bg-default">
    @csrf

    <h1 class="text-center text-dark w-100 display-5 fw-bold mb-3">{{$questionario->titulo}}</h1>

    @foreach ($questionario->perguntas as $pergunta)
        <label class="form-label fs-5 text-dark fw-bold">{{$pergunta->texto}}?</label>
        <input class="form-control form-control-lg mb-3" type={{$pergunta->tipo}} name="texto[]" placeholder="{{$pergunta->placeholder}}">
        <input type="hidden" name="pergunta_id[]" value={{$pergunta->id}}>
    @endforeach


    <button type="submit" class="btn btn-success">Enviar</button>

</form>

@endsection