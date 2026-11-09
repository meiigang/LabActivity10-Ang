<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Bakuna Tracker')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans bg-gray-100 text-gray-900">
    <nav class="flex items-center justify-between bg-white px-8 py-4 shadow">
        <a href="{{ route('dashboard') }}" class="font-bold">Bakuna Tracker</a>

        @auth
            <div class="flex items-center gap-4">
                <a href="{{ route('dashboard') }}" class="text-blue-600 hover:underline">Dashboard</a>
                <a href="{{ route('schedule') }}" class="text-blue-600 hover:underline">Schedules</a>
                <span>Hi, {{ auth()->user()->name }}</span>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="text-red-600 hover:underline">Logout</button>
                </form>
            </div>
        @endauth

        @guest
            <a href="{{ route('login') }}" class="text-blue-600 hover:underline">Sign in</a>
        @endguest
    </nav>

    <main>
        @yield('content')
    </main>

    <footer class="mt-8 border-t border-gray-200 bg-white px-8 py-4 text-sm text-gray-500">
        Bakuna Tracker &middot; Community vaccination records
    </footer>
</body>
</html>
