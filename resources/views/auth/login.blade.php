@extends('layouts.login')

@section('title','HealthForm - Login')

@section('content')

<section class="d-flex justify-content-around w-100">

    <div class="d-flex flex-column align-items-center w-50">
        <nav class="navbar mb-5">
            <div class="container-fluid p-4">
                <img src="/images/logo.png" class="">
                <a class="navbar-brand text-white fs-1 fw-bold ms-5" href="{{route('formularios.index')}}">HealthForm</a>
            </div>
        </nav>

        <h2 id="titulo_texto" class="mb-5 fs-1">Contexto do projeto</h2>

        <p class="text-center fs-4">Lorem Ipsum é simplesmente uma simulação de texto da indústria tipográfica e de impressos, e vem sendo utilizado desde o século XVI, quando um impressor desconhecido pegou uma bandeja de tipos e os embaralhou para fazer um livro de modelos de tipos.</p>

        <div class="d-flex">
            <ion-icon size="large" onclick="nextText(-1)" id="back" name="caret-back-outline"></ion-icon>
            <ion-icon size="large" onclick="nextText(1)" id="next" name="caret-forward-outline"></ion-icon>
        </div>

    </div>

    <form action="{{route('login')}}" method="post" id="form" class="min-vh-100 justify-content-center">

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @csrf
        <img src="/images/imagem.png" alt="">

        <h2 class="text-dark text-center m-3">Bem-vindo de volta</h2>

        <input type="email" placeholder="E-mail" name="email" required>

        <input type="password" placeholder="Senha" name="password" required>

        @if (Route::has('password.request'))
        <a href="{{ route('password.request') }}" class="text-decoration-underline mb-3 fw-semibold">Esqueceu sua senha?</a>
        @endif

        <button type="submit">Login</button>

        <a href="{{route('register')}}" class="text-dark fs-3 text-center fw-bold mt-3">Crie sua conta</a>
    </form>

</section>

<h1 class="text-center fs-1 w-100 mt-5 mb-5">Time de Desenvolvimento</h1>

<div class="d-flex flex-wrap w-100">
    <div class="d-flex flex-column align-items-center w-50 mb-5 mt-5">
        <img src="/images/exemplo.png" alt="">
        <h4 class="text-center mb-4 mt-4">André Augusto Rodrigues Martins</h4>
        <p class="text-center fs-5 w-75 ">Lorem Ipsum é simplesmente uma simulação de texto da indústria tipográfica e de impressos, e vem sendo utilizado desde o século XVI, quando um impressor desconhecido pegou uma bandeja de tipos e os embaralhou para fazer um livro de modelos de tipos.</p>
    </div>

    <div class="d-flex flex-column align-items-center w-50 mb-5 mt-5">
        <img src="/images/exemplo.png" alt="">
        <h4 class="text-center mb-4 mt-4">Maria Eduarda Aparecida Apolinário</h4>
        <p class="text-center fs-5 w-75 ">Lorem Ipsum é simplesmente uma simulação de texto da indústria tipográfica e de impressos, e vem sendo utilizado desde o século XVI, quando um impressor desconhecido pegou uma bandeja de tipos e os embaralhou para fazer um livro de modelos de tipos.</p>
    </div>

    <div class="d-flex flex-column align-items-center w-50 mb-5 mt-5">
        <img src="/images/exemplo.png" alt="">
        <h4 class="text-center mb-4 mt-4">Tayna Domingues da Silva</h4>
        <p class="text-center fs-5 w-75 ">Lorem Ipsum é simplesmente uma simulação de texto da indústria tipográfica e de impressos, e vem sendo utilizado desde o século XVI, quando um impressor desconhecido pegou uma bandeja de tipos e os embaralhou para fazer um livro de modelos de tipos.</p>
    </div>

    <div class="d-flex flex-column align-items-center w-50 mb-5 mt-5">
        <img src="/images/exemplo.png" alt="">
        <h4 class="text-center mb-4 mt-4">Rafael Alexandre de Pinho Lopes</h4>
        <p class="text-center fs-5 w-75 ">Lorem Ipsum é simplesmente uma simulação de texto da indústria tipográfica e de impressos, e vem sendo utilizado desde o século XVI, quando um impressor desconhecido pegou uma bandeja de tipos e os embaralhou para fazer um livro de modelos de tipos.</p>
    </div>

    
</div>

@endsection