<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>@yield('title', 'Grand Col')</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css"
        integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js"
        integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous">
    </script>

    <script src='https://cdn.jsdelivr.net/npm/fullcalendar/index.global.min.js'></script>

    <style>
    </style>
</head>

<body class="background">
    <div class="container bg-div">
        <div class="header d-flex align-items-center">
            <h1 class="text">Le Gîte du Grand Col</h1>
        </div>
    </div>
    <nav class="navbar mx-5 navbar-toggleable-md navbar-inverse navbar-dark" style="background-color: black;">
        <div class="container justify-content-center">
            @if (!Auth::check())
                <ul class="nav navbar-nav nav-fill">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('home') }}">Accueil</a>
                    </li>
                    @yield('navbar')

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('price') }}">Tarifs</a>

                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('calendar') }}">Disponibilites</a>
                    </li>
                </ul>
            @else
                <div class="container">
                    <div class="row">
                        <div class="col">

                            <ul class="nav navbar-nav nav-fill justify-content-start">
                                @yield('navbar')

                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('rooms.index') }}">Gestion des
                                        chambres</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('reservations.index') }}">Gestion des
                                        réservations</a>
                                </li>
                            </ul>
                        </div>
                        <div class="col-auto">

                            <form action="{{ route('logout') }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-link">Se déconnecter</button>
                            </form>
                        </div>
                    </div>
                </div>
            @endif

        </div>
    </nav>
    <div class="container">
        <main role="main">
            @yield('content')
        </main>
    </div>
</body>

</html>
