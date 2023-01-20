<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Fonts -->
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->

    <title>Project Walking Dead</title>
</head>

<body style="overflow: hidden">
    <nav class="navbar navbar-expand-md navbar-dark bg-dark" style="width: 100vw">
        <div class="container">
            <div class="row col-6">
            <a class="navbar-brand" href="{{route('start.index')}}">Project Walking Dead</a>
            </div>

            <div class="col-9 header-menu">
                <ul class="navbar-nav flex-row">

                    <li>
                        <a class="nav-link" href="{{route('admin.main')}}">admin</a>
                    </li>

                    <li>
                        <a class="nav-link" href="{{route('start.index')}}">Главная</a>
                    </li>
                    <li>
                        <a class="nav-link" href="{{route('character.index')}}">Персонажи</a>
                    </li>
                    <li>
                        <a class="nav-link" href="{{route('fraction.index')}}">Фракции</a>
                    </li>
                    <li>
                        <a class="nav-link" href="{{route('socials.index')}}">Сообщество</a>
                    </li>

                    @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('login.index')}}">Войти</a>
                    </li>
                    @else
                        <li>
                            <a class="nav-link" href="{{route('profile.index')}}">{{ Auth::user()->name }}</a>
                        </li>

                        <a class="nav-link" href="{{ route('logout1') }}"
                           >
                            Выйти
                        </a>

                        <form id="logout-form" action="{{ route('logout1') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    @endguest

                </ul>
            </div>
        </div>
    </nav>
</body>
<main class="py-4" style="display: flex; justify-content: center; gap: 100px">
@yield('content')
</main>
</html>
