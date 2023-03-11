@extends('layouts.main')

@section('title','HealthForm')

@section('content')

<h1>Welcome, {{ Auth::user()->name }}</h1>
<a href="{{route('formularios.create')}}">Criar formulário</a>
@endsection