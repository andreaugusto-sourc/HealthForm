<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/style.css">
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
        crossorigin="anonymous"></script>
    <script defer src="/js/script.js"></script>
    <link rel="apple-touch-icon" sizes="180x180" href="/images/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/images/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/images/favicon-16x16.png">
    <link rel="manifest" href="/images/site.webmanifest">
    <title>@yield('title')</title>
</head>
<body>
    <div class='container'>
        <nav class="navbar">
            <div class="container-fluid">
                <div class="d-flex align-items-center pt-2 pb-2"><img src="/images/logo.png">
                    <a class="navbar-brand text-white ms-5 fs-2 fw-bold" href="{{route('home')}}">HealthForm</a>
                </div>
                @auth
                <div class="nav-item dropdown"><a class="nav-link dropdown-toggle fs-3" href="#" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        <div class="menu">
                            <span class="one"></span>
                            <span class="two"></span>
                            <span class="three"></span>
                        </div>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-dark p-3">
                        <li>
                            <form action="{{route('logout')}}" method="POST">@csrf<a
                                    class="nav-link dropdown-item text-light fs-4" href="{{route('logout')}}"
                                    onclick="event.preventDefault();this.closest('form').submit();">Logout</a></form>
                        </li>
                        @if (isset(Auth::user()->admin))
                        <li><a class="nav-link text-light dropdown-item fs-4" href="{{route('dashboard')}}">Dashboard</a></li>
                        @endif
                    </ul>
                </div>
                @endauth
            </div>
        </nav>
        @yield('content')
    </div>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>
</html>