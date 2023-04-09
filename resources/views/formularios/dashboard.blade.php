@extends('layouts.main')

@section('content')

<div class="row mb-4">
    <div class="col-12">
        <div class="card">
            <div class="card-header text-dark">
                <h1>Dashboard de Formulários</h1>
            </div>
            <div class="card-body">
                <a href="{{route('formularios.create')}}" class="btn btn-success btn-lg">Adicionar Formulário</a>
            </div>
        </div>
    </div>
</div>
@foreach ($Formularios as $Formulario)

<div class="d-flex justify-content-around align-items-center m-5">

    <a class="w-25 text-white text-decoration-underline fs-3" href="{{route('formularios.show',$Formulario->id)}}">{{$Formulario->titulo}}</a>

    <a class="w-25 text-white text-decoration-underline fs-3" href="{{route('dashboard.perguntas',$Formulario->id)}}">Perguntas</a>

    <form action="{{route('formularios.destroy',$Formulario->id)}}" method="post">
    @csrf
    @method('delete')
    <button type="submit" class="btn btn-danger">Deletar</button>
    </form>

    <button type="button" class="btn btn-primary"><a class="text-white" href="{{route('formularios.edit',$Formulario->id)}}">Editar</a></button>
</div>

@endforeach
@endsection
