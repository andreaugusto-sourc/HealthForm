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
                <a href="{{route('dashboard.formularios')}}" class="btn btn-success btn-lg">Dashboard de Formulários</a>
            </div>
        </div>
    </div>
</div>

<div class="d-flex flex-wrap w-100">
    @foreach ($formularios as $formulario)
        <a class="w-25 text-white fs-3 text-decoration-underline" href="{{route('formularios.show',$formulario->id)}}">{{$formulario->titulo}}</a>
    @endforeach 
</div>


@endsection