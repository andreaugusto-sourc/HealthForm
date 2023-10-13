@extends('layouts.main')

@section('title','HealthForm - Dashboard')

@section('content')

<section class="d-flex justify-content-between flex-wrap home">
<a href="{{route('dashboard.posts')}}" class="text-center">
    <div class="d-flex flex-column align-items-center bg-default">
        <h1>Dashboard de Posts</h1>
        <img src="/images/multiple-users.png" alt="">
        <p class="text-center">Lorem Ipsum é simplesmente uma simulação de texto da indústria tipográfica e de impressos, e vem sendo utilizado desde o século XVI.</p>
    </div>
</a>

<a href="{{route('dashboard.questionarios')}}" class="text-center">
    <div class="d-flex flex-column align-items-center bg-default">
        <h1>Dashboard de Questionários</h1>
        <img src="/images/list.png" alt="Imagem de um questionário">
        <p class="text-center">Lorem Ipsum é simplesmente uma simulação de texto da indústria tipográfica e de impressos, e vem sendo utilizado desde o século XVI.</p>
    </div>
</a>
</section>

@endsection