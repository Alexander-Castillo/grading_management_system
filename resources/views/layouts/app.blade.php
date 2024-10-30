<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        
    <nav>
        <ul>
            @if(auth()->user()->role === 'admin')
                <li><a href="#">Admins</a></li>
                <li><a href="{{ route('admin.teachers') }}">Teachers</a></li>
                <li><a href="{{ route('admin.students') }}">Students</a></li>
            @elseif(auth()->user()->role === 'teacher')
                <li><a href="#">Dashboard</a></li>
            @elseif(auth()->user()->role === 'student')
                <li><a href="#">Dashboard</a></li>
            @endif
            <li><a href="{{ route('logout') }}" 
                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a></li>
        </ul>
    </nav>
    
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf --}}

    <nav class="bg-gray-800 p-4">
        <div class="max-w-7xl mx-auto flex justify-between items-center">
            <ul class="flex space
                -x-4">
                @auth
                    @if (auth()->user()->role === 'admin')
                        <li>
                            <a href="{{ route('admin.teacher.index') }}"
                                class="text-white
                                hover:text-gray-300">Teachers</a>
                        </li>
                        <li>
                            <a href="{{ route('admin.student.index') }}"
                                class="text-white
                                hover:text-gray-300 p-10">Students</a>
                        </li>
                    @elseif(auth()->user()->role === 'teacher')
                        <li>
                            <a href="{{ route('teacher.students') }}"
                                class="text-white
                                    hover:text-gray-300 p-10">Estudiantes</a>
                        </li>
                    @elseif(auth()->user()->role === 'student')
                        <li>
                            <a href="{{ route('dashboard') }}"
                                class="text-white
                                        hover:text-gray-300">Dashboard</a>
                        </li>
                    @endif
                </ul>
                <div class="ml-auto">
                    <a href="{{ route('logout') }}"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                        class="text-white hover:text-gray-300">
                        Logout
                    </a>
                </div>
            @endauth

        </div>

    </nav>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>


    <!--Crear two cards to show Teachers and Students 50%-->
    
            <!--Button to add new Teacher or Student-->

            <div class="container">
                @yield('content')
            </div>

</body>

</html>
