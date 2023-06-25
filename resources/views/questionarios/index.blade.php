@extends('layouts.main')

@section('title','HealthForm - Questionários')

@section('content')

<div class="d-flex flex-column w-100">

    <form class="d-flex align-items-center justify-content-around bg-dark pt-3 pb-3" action="{{route('questionarios.index')}}" method="get">
        <h2>Filtrar por:</h2>
        @csrf

        <select class="form-select form-select-lg w-50" aria-label="Default select example">
          <option selected disabled>Categoria</option>
          <option>One</option>
          <option>Two</option>
          <option>Three</option>
        </select>

        <button type="submit" class="btn btn-light btn-lg">Filtrar</button>
    </form>

    <div class="d-flex flex-wrap align-items-center">
      @foreach ($questionarios as $questionario)
        <div class="card" style="width: 18rem;">
            <div class="card-body">
              <h5 class="card-title text-center fw-bold">{{$questionario->titulo}}</h5>
              <p class="card-text">{{$questionario->descricao}}</p>
              <a href="{{route('questionarios.show', $questionario->id)}}" class="btn btn-primary">Responder</a>
            </div>
        </div>
      @endforeach
    </div>

</div>

@endsection