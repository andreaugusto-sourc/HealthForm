@extends('layouts.main')

@section('title','HealthForm - Questionários')

@section('content')

<div class="d-flex flex-column w-100">

    <form id="form_categorias" class="d-flex align-items-center justify-content-around bg-dark pt-3 pb-3" action="{{route('questionarios.index')}}" method="get">
        <h2>Filtrar por categorias:</h2>
        @csrf

        <select onchange="enviarFormulario()" class="form-select form-select-lg w-50" aria-label="Default select example" name="categoria_id">

          <option value="Todas" selected>Todas</option>

          @foreach ($categorias as $categoria)

          @if (isset($categoria_id))
          
            @if ($categoria->id != $categoria_id) 
            <option value="{{$categoria->id}}">{{$categoria->nome}}</option>
            @else
            <option selected disabled>{{$categoria->nome}}</option>
            @endif

          @else
          <option value="{{$categoria->id}}">{{$categoria->nome}}</option>
          @endif

          @endforeach
        </select>

    </form>

    <div class="d-flex flex-wrap align-items-center">
      @foreach ($questionarios as $questionario)
        <div class="card" style="width: 18rem;">
            <div class="card-body text-center">
              <h5 class="card-title fw-bold">{{$questionario->titulo}}</h5>
              <p class="card-text">{{$questionario->descricao}}</p>
              <a href="{{route('questionarios.show', $questionario->id)}}" class="btn btn-primary fs-4">Responder</a>
            </div>
        </div>
      @endforeach
    </div>

</div>

@endsection