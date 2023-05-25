@extends('layouts.main')

@section('content')

<div class="row mb-4">
    <div class="col-12">
        <div class="card">
            <div class="card-header text-dark">
                <h1>Dashboard de {{$Formulario->titulo}}</h1>
            </div>
            <div class="card-body">
                <a href="{{route('perguntas.create',["adicionarPergunta" => $Formulario->id])}}" class="btn btn-success btn-lg">Adicionar Pergunta</a>
            </div>
        </div>
    </div>
</div>

@foreach ($Perguntas as $Pergunta)
<div class="d-flex justify-content-around align-items-center m-5">

    <a class="w-25 text-white text-decoration-none fs-3">{{$Pergunta->texto}}</a>

    <form action="{{route('perguntas.destroy',$Pergunta->id)}}" method="post">
    @csrf
    @method('delete')
    <button type="submit" class="btn btn-danger">Deletar</button>
    </form>

    <button type="button" class="btn btn-primary"><a class="text-white" href="{{route('perguntas.edit',$Pergunta->id)}}">Editar</a></button>
</div>
@endforeach

@endsection
