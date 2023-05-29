@extends('layouts.main')

@section('title','HealthForm')

@section('content')

<div class="row mb-4">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h1 class="text-dark">Página inicial</h1>
            </div>
            <div class="card-body">
                <a href="{{route('dashboard.questionarios')}}" class="btn btn-success btn-lg">Dashboard de Questionários</a>
            </div>
        </div>
    </div>
</div>

<div class="d-flex flex-wrap w-100">
    @foreach ($questionarios as $questionario)
        <a class="w-25 text-white fs-3 text-decoration-underline" href="{{route('questionarios.show',$questionario->id)}}">{{$questionario->titulo}}</a>
    @endforeach 
</div>

@endsection