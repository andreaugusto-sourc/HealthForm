@extends('layouts.main')

@section('title', $Formulario->titulo)

@section('content')



<form action="{{route('respostas.store')}}" method="POST" id="form">
    @csrf

    <h1 class="text-center text-dark w-100">{{$Formulario->titulo}}</h1>

    @foreach ($perguntas as $pergunta)
        <label class="fs-5 text-dark fw-bold">{{$pergunta->texto}}?</label>
        <input type={{$pergunta->tipo}} name="texto[]" placeholder="{{$pergunta->placeholder}}">
        <input type="hidden" name="pergunta_id[]" value={{$pergunta->id}}>
    @endforeach

    <button type="submit">Enviar</button>

</form>


@endsection