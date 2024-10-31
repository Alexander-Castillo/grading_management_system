<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased">

    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <ul class="navbar-nav">
            @auth
            @if(auth()->user()->role === 'admin')
            <li class="nav-item"><a class="nav-link active" aria-current="page" href="{{ route('admin.teacher.index') }}">Teachers</a></li>
            <li class="nav-item"><a class="nav-link active" aria-current="page" href="{{ route('admin.student.index') }}">Students</a></li>
            @elseif(auth()->user()->role === 'teacher')
            <li class="nav-item"><a class="nav-link active" aria-current="page" href="{{ route('teacher.students') }}">Estudiantes</a></li>
            @elseif(auth()->user()->role === 'student')
            <li class="nav-item"><a class="nav-link active" aria-current="page" href="{{ route('dashboard') }}">Dashboard</a></li>
            @endif
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="{{ route('logout') }}"
                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                    >
                    Logout
                </a>
            </li>
            @endauth
        </ul>
    </nav>
    {{-- <img id="background" class="absolute -left-20 top-20 max-w-[1024px]" src="https://res.cloudinary.com/dhwarywdk/image/upload/v1729396614/banner_gyo1z5.jpg" alt="Universidad de la Vida" /> --}}


    {{-- <div class="container d-flex bg-center">
        <a href="{{ route('dashboard') }}">
        <div class="card teacher">
           <h2 class="bg-center">Admins</h2>
            <div class="container">
                <svg  xmlns="http://www.w3.org/2000/svg"  width="54"  height="54"  viewBox="0 0 24 24"  fill="currentColor"  class="icon icon-tabler icons-tabler-filled icon-tabler-user"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 2a5 5 0 1 1 -5 5l.005 -.217a5 5 0 0 1 4.995 -4.783z" /><path d="M14 14a5 5 0 0 1 5 5v1a2 2 0 0 1 -2 2h-10a2 2 0 0 1 -2 -2v-1a5 5 0 0 1 5 -5h4z" /></svg>
            </div>
        </a>
        </div>
            <div class="card"> 
                <a href="{{ route('admin.index') }}">
                <h2>Teachers</h2>
                 <div class="container">
                     <svg  xmlns="http://www.w3.org/2000/svg"  width="54"  height="54"  viewBox="0 0 24 24"  fill="currentColor"  class="icon icon-tabler icons-tabler-filled icon-tabler-user"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 2a5 5 0 1 1 -5 5l.005 -.217a5 5 0 0 1 4.995 -4.783z" /><path d="M14 14a5 5 0 0 1 5 5v1a2 2 0 0 1 -2 2h-10a2 2 0 0 1 -2 -2v-1a5 5 0 0 1 5 -5h4z" /></svg>
                 </div>
                </a>
            </div>
                 <div class="card">
                    <a  href="{{ route('admin.students') }}">
                    <h2>Students</h2>
                     <div class="container">
                         <svg  xmlns="http://www.w3.org/2000/svg"  width="54"  height="54"  viewBox="0 0 24 24"  fill="currentColor"  class="icon icon-tabler icons-tabler-filled icon-tabler-user"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 2a5 5 0 1 1 -5 5l.005 -.217a5 5 0 0 1 4.995 -4.783z" /><path d="M14 14a5 5 0 0 1 5 5v1a2 2 0 0 1 -2 2h-10a2 2 0 0 1 -2 -2v-1a5 5 0 0 1 5 -5h4z" /></svg>
                     </div>
                    </a>
                 </div>
          </div> --}}
        @yield('content')
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</html>
