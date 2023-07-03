@extends('layouts.main')

@section('title','HealthForm - Acompanhamento de {{$Questionario->titulo}}')

@section('content')
    <section class="d-flex flex-column bg-default">
        <h1 class="text-center text-dark w-100 display-5 fw-bold mb-3">{{$Questionario->titulo}} - Respostas</h1>
        @foreach ($users as $user)
            <h2 class="text-start text-dark w-100 fs-1 fw-bold mb-3">{{$user->name}}</h2>
            @foreach ($perguntas as $pergunta)
                @foreach ($respostas as $resposta)
                    @if ($user->id == $resposta->user_id && $resposta->pergunta_id == $pergunta->id )
                    <p class="fs-5">- {{$pergunta->texto}}?</p>
                    <p class="fs-5"><strong>Resposta do usuário: </strong>{{$resposta->texto}}</p>
                    @endif
                @endforeach
            @endforeach
        @endforeach
    </section>
@endsection