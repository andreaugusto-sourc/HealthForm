@extends('layouts.main')

@section('title','HealthForm - Área de Acompanhamentos')

@section('title_page', 'Área de Acompanhamentos')

@section('content')

<section class="d-flex justify-content-between flex-wrap home">
<a href="{{route('dashboard.posts')}}" class="text-center">
    <div class="d-flex flex-column align-items-center bg-default">
        <h1>Acompanhar Textos Psicoeducativos</h1>
        <img src="/images/multiple-users.png" alt="Imagem de uma publicação">
    </div>
</a>

<a href="{{route('dashboard.questionarios')}}" class="text-center">
    <div class="d-flex flex-column align-items-center bg-default">
        <h1>Acompanhar Questionários</h1>
        <img src="/images/list.png" alt="Imagem de um questionário">
    </div>
</a>
</section>

@endsection