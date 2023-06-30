@extends('layouts.main')

@section('title','HealthForm - Cadastro')

@section('content')

<form action="{{route('register')}}" method="post" class="d-flex flex-column bg-default cadastro">
    @csrf

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <h1 class="text-center text-dark w-100">Junte-se a nós</h1>

        <input type="text" name="name" class="form-control form-control-lg mb-3" placeholder="Nome">
    
        <input type="email" name="email" class="form-control form-control-lg mb-3" required placeholder="E-mail">

        <input type="password" name="password" class="form-control form-control-lg mb-3" required placeholder="Senha">

        <input type="password" name="password_confirmation" class="form-control form-control-lg mb-3" required placeholder="Repita a senha">
    
        <div class="d-flex-reverse m-auto pt-2">
            <button type="submit" class="btn btn-primary btn-lg fw-bold">Cadastrar-se</button>
            <a href="{{route('login')}}" class="text-dark fs-3 text-center fw-bold ms-5">Já possui uma conta?</a>
        </div>
</form>
@endsection