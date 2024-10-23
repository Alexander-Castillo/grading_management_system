<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link rel="stylesheet" href="{{ url('/') }}/css/style.css">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">


    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased">

    <nav class="navbar navbar-expand-lg bg-dark-tertiary">
        @if (auth()->user()->role === 'admin')
            <div class="container-fluid">
                <a class="navbar-brand" href="#">Control Panel</a>
                {{-- <button >
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarScroll"> --}}
                    <ul class="navbar-nav me-auto my-2 my-lg-0" >
                        <li class="nav-item"><a class="nav-link active" aria-current="page" href="{{ route('dashboard') }}">Admins</a>
                        </li>
                        <li class="nav-item"><a class="nav-link active" href="{{ route('admin.index') }}">Teachers</a>
                        </li>
                        <li class="nav-item"><a class="nav-link active"
                                href="{{ route('admin.students') }}">Students</a></li>
                    @elseif(auth()->user()->role === 'teacher')
                        <li class="nav-item"><a class="nav-link" href="{{ route('teacher.dashboard') }}">Dashboard</a></li>
                        @elseif(auth()->user()->role === 'student')
                        <li class="nav-item"><a class="nav-link" href="#">Dashboard</a></li>
                    </ul>
        @endif
        <form class="d-flex me-2" id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;" role="search">
        <button class="btn btn-outline-danger my-2 my-sm-0" type="submit"><a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a></button>
        
        
            @csrf
        </form>
        </div>
        </div>
    </nav>
    
    {{-- <img id="background" class="absolute -left-20 top-20 max-w-[1024px]" src="https://res.cloudinary.com/dhwarywdk/image/upload/v1729396614/banner_gyo1z5.jpg" alt="Universidad de la Vida" /> --}}


    <div class="container">
        @yield('content')
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
</script>

</html>
