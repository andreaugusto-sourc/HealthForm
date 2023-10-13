@extends('layouts.main')

@section('title','Editar questionário')

@section('content')

<form action="{{route('questionarios.update', $Questionario->id)}}" method="post" class="d-flex flex-column bg-default">
    @csrf
    @method('PUT')
    <h1 class="text-center text-dark w-100">Edite um questionário</h1>

    <div class="input-group input-group-lg mb-3">
        <span class="input-group-text" id="inputGroup-sizing-lg">Título do questionário:</span>
        <input class="form-control" aria-label="With input" name="titulo" value="{{$Questionario->titulo}}" placeholder="Escreva algum texto">
    </div>

    <div class="input-group input-group-lg mb-3">
        <span class="input-group-text" id="inputGroup-sizing-lg">Descrição</span>
        <input class="form-control" aria-label="With input" name="descricao" value="{{$Questionario->descricao}}" placeholder="Escreva algum texto">
    </div>

    <select class="form-select form-select-lg mb-3" name="ativo" value="{{$Questionario->ativo}}" aria-label=".form-select-lg example">
        <option selected disabled>Ativo (Status)</option>
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

    <button type="submit" class="btn btn-primary btn-lg fs-3">Editar</button>
</form>

@endsection