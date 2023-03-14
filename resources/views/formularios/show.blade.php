@extends('layouts.main')

@section('title','HealthForm - Visualização')

@section('content')



<form action="" id="form">
    @csrf

    <h1 class="text-center text-dark w-100">{{$Formulario->titulo}}</h1>

    @foreach ($perguntas as $pergunta)
        <label class="fs-5 text-dark fw-bold"for="">{{$pergunta->texto}}?</label>
        <input type={{$pergunta->tipo}} placeholder="{{$pergunta->placeholder}}">
    @endforeach

    <button type="submit">Enviar</button>

</form>


@endsection