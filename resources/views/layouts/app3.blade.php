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

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaOb2J2SaWxBhqpcR9qmxjG/0a2L1QIdByI1q2AB8R9tPj8N7K2ihRSN5ix" crossorigin="anonymous">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased">

    <nav class="">
        <ul>
            @auth
            @if(auth()->user()->role === 'admin')
            <li><a href="{{ route('admin.teacher.index') }}">Teachers</a></li>
            <li><a href="{{ route('admin.student.index') }}">Students</a></li>
            @elseif(auth()->user()->role === 'teacher')
            <li><a href="{{ route('teacher.students') }}">Estudiantes</a></li>
            @elseif(auth()->user()->role === 'student')
            <li><a href="{{ route('dashboard') }}">Dashboard</a></li>
            @endif
            <li>
                <a href="{{ route('logout') }}"
                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    Logout
                </a>
            </li>
            @endauth
        </ul>
    </nav>

    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>

    {{-- <div class="container">
        @yield('content')
    </div> --}}
</body>


 <!-- Bootstrap JavaScript Bundle with Popper -->
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoIsnFN4E5NJ6A9Pvn4mDx0H++0i3Q6kftk8lAbXMK2kDwt" crossorigin="anonymous"></script>
</html>