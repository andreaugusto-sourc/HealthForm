@extends('layouts.main')

@section('title','HealthForm - Cadastro')

@section('content')

<form action="{{route('register')}}" method="post" id="form-welcome" class="d-flex flex-column p-5">
    @csrf
        <h1 class="text-center text-dark w-100">Junte-se a nós</h1>
        <label for="name" class="text-dark fs-5 fw-bold">Nome:</label>
        <input type="text" name="name">
    
        <label for="email" class="text-dark fs-5 fw-bold">E-mail:</label>
        <input type="email" name="email" required>
    
        <label for="password" class="text-dark fs-5 fw-bold">Senha:</label>
        <input type="password" name="password" required>
    
        <label for="password" class="text-dark fs-5 fw-bold">Repita a senha:</label>
        <input type="password" name="password_confirmation" required>
    
        <div class="d-flex-reverse">
            <button type="submit" class="fs-3 fw-bold">Cadastrar-se</button>
            <a href="{{route('login')}}" class="fs-4 ms-4 text-center text-decoration-underline fw-bold mt-3">Já possui uma conta?</a>
        </div>

</form>
@endsection