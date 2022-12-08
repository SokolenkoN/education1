<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <title>Project Walking Dead</title>
</head>

<header>
    <nav class="navbar navbar-expand-md navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{route('home.index')}}">Project Walking Dead</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse" >
                <ul class="navbar-nav me-auto mb-2 mb-md-0">
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('home.index')}}">Главная</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('character.index')}}">Персонажи</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('fraction.index')}}">Фракции</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('socials.index')}}">Сообщество</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>

@yield('content')

</html>
