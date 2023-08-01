<nav class="navbar navbar-expand-lg bg-body-tertiary shadow">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{ route('home') }}">{{ config('app.name')}}</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-between" id="navbarNav">
            <ul class="navbar-nav ">

                <!-- <li class="nav-item">
                    <a class="nav-link" href="{{ route('articles') }}">Articoli</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('contacts') }}">Contatti</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('about-us') }}">Chi siamo</a>
                </li> -->

                <!-- @foreach ($nav as $navLink => $navItem)
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route($navLink) }}">{{ $navItem }}</a>
                    </li>
                @endforeach -->

                @foreach($nav as $navLink => $navItem)
                <li class="nav-item">
                    <a class="nav-link" href="{{ route($navLink) }}">{{ $navItem }}</a>
                </li>
                @endforeach
            </ul>
            <ul class="navbar-nav">
                @auth
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        {{ auth()->user()->name }}
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li class="dropdown-item"><a href="{{ route('articlesList') }}">Articoli</a></li>
                        <li class="dropdown-item"><a href="{{ route('categories.index') }}">Categorie</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <form action="/logout" method="POST" class="dropdown-item">
                            @csrf
                            <button class="btn btn-sm btn-danger" type="submit">Logout</button>
                        </form>
                    </ul>
                </li>
                @else
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Accedi
                    </a>
                    <ul class="dropdown-menu">
                        <li class="dropdown-item"><a href="/login">Login</a></li>
                        <li class="dropdown-item"><a href="/register">Registrati</a></li>
                    </ul>
                </li>
                @endauth

            </ul>
        </div>


    </div>
</nav>