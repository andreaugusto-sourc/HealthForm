@extends('layouts.main')

@section('content')

<div class="row mb-4">
    <div class="col-12">
        <div class="card">
            <div class="card-header text-dark">
                <h1>Dashboard de Questionários</h1>
            </div>
            <div class="card-body">
                <a href="{{route('questionarios.create')}}" class="btn btn-success btn-lg">Adicionar Questionário</a>
            </div>
        </div>
    </div>
</div>

@foreach ($Questionarios as $Questionario)

<div class="d-flex justify-content-between align-items-center m-5">

    <a class="w-25 text-white text-decoration-underline fs-3" href="{{route('questionarios.show',$Questionario->id)}}">{{$Questionario->titulo}}</a>

    <a class="text-white text-decoration-underline fs-3" href="{{route('dashboard.perguntas',$Questionario->id)}}">Perguntas</a>

    <a class="text-white text-decoration-underline fs-3" href="{{route('respostas.show',$Questionario->id)}}">Respostas</a>

    <form action="{{route('questionarios.destroy',$Questionario->id)}}" method="post">
    @csrf
    @method('delete')
    <button type="submit" class="btn btn-danger fs-5">Deletar</button>
    </form>

    <button type="button" class="btn btn-primary fs-5"><a class="text-white" href="{{route('questionarios.edit',$Questionario->id)}}">Editar</a></button>
</div>

@endforeach
@endsection
