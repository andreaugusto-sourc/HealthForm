@extends('layouts.main')

@section('content')

<div class="row mb-4">
    <div class="col-12">
        <div class="card">
            <div class="card-header text-dark">
                <h1>Dashboard de {{$questionario->titulo}}</h1>
            </div>
            <div class="card-body">
                <a href="{{route('perguntas.create',["adicionarPergunta" => $questionario->id])}}" class="btn btn-success btn-lg">Adicionar Pergunta</a>
            </div>
        </div>
    </div>
</div>

@foreach ($questionario->perguntas as $pergunta)
<div class="d-flex justify-content-around align-items-center m-5">

    <article class="w-25 text-white text-decoration-none fs-3">{{$pergunta->texto}}</article>

    <form action="{{route('perguntas.destroy', $pergunta->id)}}" method="post">
    @csrf
    @method('delete')
    <button type="submit" class="btn btn-danger">Deletar</button>
    </form>

    <button type="button" class="btn btn-primary"><a class="text-white" href="{{route('perguntas.edit',$pergunta->id)}}">Editar</a></button>
</div>
@endforeach

@endsection
