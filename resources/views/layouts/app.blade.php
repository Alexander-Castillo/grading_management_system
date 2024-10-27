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

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        
    <nav>
        <ul>
            @if(auth()->user()->role === 'admin')
                <li><a href="#">Admins</a></li>
                <li><a href="{{ route('admin.teacher.index') }}">Teachers</a></li>
                <li><a href="{{ route('admin.student.index') }}">Students</a></li>
            @elseif(auth()->user()->role === 'teacher')
                <li><a href="{{ route('dashboard') }}">Dashboard</a></li>
            @elseif(auth()->user()->role === 'student')
                <li><a href="#">Dashboard</a></li>
            @endif
            <li><a href="{{ route('logout') }}" 
                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a></li>
        </ul>
    </nav>

    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>

    <div class="container">
        @yield('content')
    </div>
    </body>
</html>
