<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/main.css">
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <script defer src="/js/script.js"></script>
    <title>@yield('title')</title>
</head>
<body>
    <div class='container'>
        <nav class="navbar">
            <div class="container-fluid">
                <div class="d-flex align-items-center pt-2 pb-2">
                    <img src="/images/logo.png">
                    <a class="navbar-brand text-white ms-5 fs-2 fw-bold" href="{{route('formularios.index')}}">HealthForm</a>
                </div>
                @auth
                    <form action="{{route('logout')}}" method="POST">
                    @csrf
                    <a class="nav-link text-light fs-2 fw-bold navbar-brand" href="{{route('logout')}}" onclick="event.preventDefault();
                    this.closest('form').submit();">Logout</a>
                    </form>
                @endauth
            </div>
        </nav>
        @yield('content')
    </div>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>
</html>