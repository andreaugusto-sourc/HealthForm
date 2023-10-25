@extends('layouts.main')

@section('title', 'Esqueci minha senha')

@section('content')

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('password.email') }}" class="d-flex flex-column bg-default">
        @csrf

        <h1 class="text-center text-dark w-100">Esqueci minha senha</h1>

        <p class="mb-4 fs-5 fw-semibold">
            {{ __('Esqueceu sua senha? Sem problemas. Apenas nos deixe saber seu endereço de e-mail e nós enviaremos um e-mail com um link para escolher uma nova senha.') }}
        </p>

        <!-- Email Address -->

        <input type="email" name="email" class="form-control form-control-lg mb-3" required placeholder="E-mail" :value="old('email')" required autofocus>

        <x-input-error :messages="$errors->get('email')" class="mt-2" />

        <button type="submit" class="btn btn-primary">Resetar senha</button>

    </form>
@endsection