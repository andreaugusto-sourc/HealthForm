@extends('layouts.main')

@section('title','Cadastro de perguntas')

@section('content')

<form action="{{route('perguntas.store')}}" method="post" class="d-flex flex-column bg-default">
    @csrf
    <h1 class="text-center text-dark w-100 display-5 fw-bold mb-3">Cadastre uma pergunta</h1>

    <div class="input-group input-group-lg mb-3">
        <span class="input-group-text" id="inputGroup-sizing-lg">Texto da pergunta</span>
        <input type="text" name="texto" placeholder="Não coloque '?' no final da pergunta" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg" required>
    </div>

    <div class="input-group input-group-lg mb-3">
        <span class="input-group-text" id="inputGroup-sizing-lg">Exemplo ou orientação de como responder (opcional)</span>
        <input type="text" name="placeholder" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg">
    </div>

    <select class="form-select form-select-lg mb-3" name="tipo" aria-label=".form-select-lg example">
        <option selected disabled>Tipo</option>
        @foreach ($tiposPergunta as $tipoPergunta)
            <option>{{$tipoPergunta->value}}</option>
        @endforeach
    </select>

    <div class="d-flex-reverse m-auto pt-2">
        <button type="submit" class="btn btn-primary">Cadastrar</button>
        <a href="{{route('questionarios.index')}}" class="text-dark fs-3 text-center fw-bold ms-5">Finalizar</a>
    </div>
</form>
@endsection