@extends('layouts.main')

@section('title','HealthForm - Cadastro')

@section('content')

<form action="{{route('register')}}" method="post" id="form">
    @csrf
        <h1 class="text-center text-dark w-100">Junte-se a nós</h1>

        <input type="text" name="name" placeholder="Nome">
    
        <input type="email" name="email" required placeholder="E-mail">

        <input type="password" name="password" required placeholder="Senha">

        <input type="password" name="password_confirmation" required placeholder="Repita a senha">
    
        <div class="d-flex-reverse m-auto pt-2">
            <button type="submit">Cadastrar-se</button>
            <a href="{{route('login')}}" class="text-dark fs-3 text-center fw-bold ms-5">Já possui uma conta?</a>
        </div>
</form>
@endsection