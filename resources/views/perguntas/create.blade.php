@extends('layouts.main')

@section('title','Cadastro de perguntas')

@section('content')

<form action="{{route('perguntas.store')}}" method="post" id="form">
    @csrf
    <h1 class="text-center text-dark w-100">Cadastre uma pergunta</h1>

    <label for="texto" required>Texto:</label>
    <input type="text" name="texto">

    <label for="placeholder">Placeholder:</label>
    <input type="text" name="placeholder">

    <label for="tipo">Tipo:</label>
    <select name="tipo" required>
        <option disabled>Selecione uma opção:</option>
        @foreach ($tiposPergunta as $tipoPergunta)
            <option>{{$tipoPergunta->value}}</option>
        @endforeach
    </select>

    <div class="d-flex-reverse m-auto pt-2">
        <button type="submit">Cadastrar</button>
        <a href="{{route('questionarios.index')}}" class="text-dark fs-3 text-center fw-bold ms-5">Finalizar</a>
    </div>
</form>
@endsection