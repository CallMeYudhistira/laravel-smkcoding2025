<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>@yield('title')</title>
    <style>
        a{
            text-decoration: none;
            color: white;
        }
    </style>
</head>

<body style="background-color: white;">
    @if (session()->get('isLogged'))
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark" style="min-width: 1240px;">
            <div class="container-fluid">
                <div class="collapse navbar-collapse" id="navbarNavDarkDropdown">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <button class="btn btn-dark">
                                <a class="nav-link" href="{{ route('users.index') }}">Home</a>
                            </button>
                        </li>
                        <li class="nav-item dropdown" style="margin-top: 3%;">
                            <button class="btn btn-dark dropdown-toggle" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                Konten
                            </button>
                            <ul class="dropdown-menu dropdown-menu-dark">
                                <li><a class="dropdown-item" href="{{ route('content.index') }}">Lihat Konten</a></li>
                                @if(session()->get('role') == 'admin')
                                <li><a class="dropdown-item" href="{{ route('content.create') }}">Buat Konten</a></li>
                                <li><a class="dropdown-item" href="{{ route('content.management') }}">Kelola Konten</a></li>
                                @endif
                            </ul>
                        </li>

                        <li class="nav-item">
                            <button class="btn btn-dark" aria-expanded="false">
                                <a class="nav-link" href="{{ route('auth.logout') }}">Logout</a>
                            </button>
                    </ul>
                </div>
                
                <form class="d-flex" role="search" action="{{ route('content.search') }}" method="POST">
                    @csrf
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" id="cari" name="cari">
                    <button class="btn btn-primary" type="submit">Search</button>
                </form>
            </div>
        </nav>
    @endif
    <div class="container" style="margin-top: 4%;">
        @yield('content')
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>
