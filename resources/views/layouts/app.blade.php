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

    <nav class="bg-blue-800 p-4 shadow-md fixed top-0 left-0 right-0 z-50">
        <div class="max-w-7xl mx-auto flex justify-between items-center">
            <div class="flex items-center space-x-4">
                <button id="menu-toggle" class="text-white focus:outline-none md:hidden">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path>
                    </svg>
                </button>
                <span class="text-white font-bold">Welcome to the Admin Dashboard</span>
            </div>
            <ul id="menu" class="hidden md:flex space-x-4">
                @auth
                    @if (auth()->user()->role === 'admin')
                        <li>
                            <a href="{{ route('admin.teacher.index') }}"
                                class="text-white font-bold hover:text-gray-300 transition duration-300">Teachers</a>
                        </li>
                        <li>
                            <a href="{{ route('admin.student.index') }}"
                                class="text-white font-bold hover:text-gray-300 transition duration-300">Students</a>
                        </li>
                    @elseif(auth()->user()->role === 'teacher')
                        <li>
                            <a href="{{ route('teacher.students') }}"
                                class="text-white font-bold hover:text-gray-300 transition duration-300">Estudiantes</a>
                        </li>
                        <li>
                            <a href="{{ route('activities.index') }}"
                                class="text-white font-bold hover:text-gray-300 transition duration-300">Actividades</a>
                        </li>
                    @elseif(auth()->user()->role === 'student')
                        <li>
                            <a href="{{ route('dashboard') }}"
                                class="text-white font-bold hover:text-gray-300 transition duration-300">Dashboard</a>
                        </li>
                    @endif
                @endauth
            </ul>
            @auth
                <div class="hidden md:flex items-center space-x-4">
                    <a href="{{ route('logout') }}"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                        class="text-white font-bold hover:text-gray-300 transition duration-300 flex items-center">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1m0-10V5m0 6H3"></path>
                        </svg>
                        Logout
                    </a>
                </div>
            @endauth
        </div>
        <div id="mobile-menu" class="md:hidden hidden">
            <ul class="space-y-4 mt-4">
                @auth
                    @if (auth()->user()->role === 'admin')
                        <li>
                            <a href="{{ route('admin.teacher.index') }}"
                                class="text-white font-bold hover:text-gray-300 transition duration-300">Teachers</a>
                        </li>
                        <li>
                            <a href="{{ route('admin.student.index') }}"
                                class="text-white font-bold hover:text-gray-300 transition duration-300">Students</a>
                        </li>
                    @elseif(auth()->user()->role === 'teacher')
                        <li>
                            <a href="{{ route('teacher.students') }}"
                                class="text-white font-bold hover:text-gray-300 transition duration-300">Estudiantes</a>
                        </li>
                        <li>
                            <a href="{{ route('activities.index') }}"
                                class="text-white font-bold hover:text-gray-300 transition duration-300">Actividades</a>
                        </li>
                    @elseif(auth()->user()->role === 'student')
                        <li>
                            <a href="{{ route('dashboard') }}"
                                class="text-white font-bold hover:text-gray-300 transition duration-300">Dashboard</a>
                        </li>
                    @endif
                @endauth
                @auth
                    <li>
                        <a href="{{ route('logout') }}"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                            class="text-white font-bold hover:text-gray-300 transition duration-300 flex items-center">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1m0-10V5m0 6H3"></path>
                            </svg>
                            Logout
                        </a>
                    </li>
                @endauth
            </ul>
        </div>
    </nav>

    <script>
        document.getElementById('menu-toggle').addEventListener('click', function () {
            document.getElementById('mobile-menu').classList.toggle('hidden');
        });
    </script>
    <div class="pt-16">

    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>

    {{-- <nav class="bg-blue-800 p-4 shadow-md">
        <div class="max-w-7xl mx-auto flex justify-between items-center">
            <ul class="flex space-x-4">
                @auth
                    @if (auth()->user()->role === 'admin')
                        <li>
                            <a href="{{ route('admin.teacher.index') }}"
                                class="text-white font-bold hover:text-gray-300 transition duration-300">Teachers</a>
                        </li>
                        <li>
                            <a href="{{ route('admin.student.index') }}"
                                class="text-white font-bold hover:text-gray-300 transition duration-300">Students</a>
                        </li>
                    @elseif(auth()->user()->role === 'teacher')
                        <li>
                            <a href="{{ route('teacher.students') }}"
                                class="text-white font-bold hover:text-gray-300 transition duration-300">Estudiantes</a>
                        </li>
                        <li>
                            <a href="{{ route('activities.index') }}"
                                class="text-white font-bold hover:text-gray-300 transition duration-300">Actividades</a>
                        </li>
                    @elseif(auth()->user()->role === 'student')
                        <li>
                            <a href="{{ route('dashboard') }}"
                                class="text-white font-bold hover:text-gray-300 transition duration-300">Dashboard</a>
                        </li>
                    @endif
                @endauth
            </ul>
            <span class="text-white font-bold">Welcome to the Admin Dashboard</span>
            @auth
                <div class="flex items-center space-x-4">
                    <a href="{{ route('logout') }}"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                        class="text-white font-bold hover:text-gray-300 transition duration-300 flex items-center">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1m0-10V5m0 6H3"></path>
                        </svg>
                        Logout
                    </a>
                </div>
            @endauth
        </div>
    </nav> --}}

    <div class="container mx-auto flex justify-center mt-8 mb-8">
        @yield('content')
    </div>
</body>

</html>