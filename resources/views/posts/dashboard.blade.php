@extends('layouts.main')

@section('content')

<div class="row mb-4">
    <div class="col-12">
        <div class="card">
            <div class="card-header text-dark">
                <h1>Acompanhamento de Textos Psicoeducativos</h1>
            </div>
            <div class="card-body">
                <a href="{{route('posts.create')}}" class="btn btn-success btn-lg">Adicionar Texto Psicoeducativo</a>
            </div>
        </div>
    </div>
</div>

@foreach ($posts as $Post)

<div class="d-flex justify-content-around align-items-center m-5">

    <a class="w-50 text-white text-decoration-underline fs-3" href="{{route('posts.show',$Post->id)}}">{{$Post->titulo}}</a>

    <form action="{{route('posts.destroy',$Post->id)}}" method="post">
    @csrf
    @method('delete')
    <button type="submit" class="btn btn-danger">Deletar</button>
    </form>

    <button type="button" class="btn btn-primary"><a class="text-white" href="{{route('posts.edit',$Post->id)}}">Editar</a></button>
</div>

@endforeach
@endsection
