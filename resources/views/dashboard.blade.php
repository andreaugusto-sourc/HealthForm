@extends('layouts.main')

@section('title','HealthForm - Dashboard')

@section('content')

<section class="d-flex justify-content-between flex-wrap home">
    <div class="d-flex flex-column align-items-center bg-default">
        <h1>Dashboard de Posts</h1>
        <img src="/images/multiple-users.png" alt="">
        <p class="text-center">Lorem Ipsum é simplesmente uma simulação de texto da indústria tipográfica e de impressos, e vem sendo utilizado desde o século XVI.</p>
        <a href="{{route('dashboard.posts')}}"><button type="button" class="btn btn-dark btn-lg">Acessar</button></a>
    </div>

    <div class="d-flex flex-column align-items-center bg-default">
        <h1>Dashboard de Questionários</h1>
        <img src="/images/list.png" alt="Imagem de um questionário">
        <p class="text-center">Lorem Ipsum é simplesmente uma simulação de texto da indústria tipográfica e de impressos, e vem sendo utilizado desde o século XVI.</p>
        <a href="{{route('dashboard.questionarios')}}"><button type="button" class="btn btn-dark btn-lg">Acessar</button></a>
    </div>
</section>

@endsection