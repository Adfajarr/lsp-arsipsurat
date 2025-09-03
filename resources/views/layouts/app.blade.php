<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'SISTEM INFORMASI PENGARSIPAN DESA') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <script src="https://unpkg.com/feather-icons"></script>

    </head>
<body class="bg-gray-100 min-h-screen flex">
    <!-- Sidebar -->
    <aside class="w-64 bg-blue-900 text-white flex flex-col">
        <div class="p-4 text-2xl font-bold">
            Arsip Desa
        </div>
        <nav class="flex-1 p-4 space-y-2">
            <a href="{{ route('dashboard') }}" class="flex items-center gap-2 px-3 py-2 rounded hover:bg-blue-700 hover:font-semibold">
                <i data-feather="home" class="w-5 h-5 text-white"></i> Dashboard
            </a>
            <a href="{{ route('mail.index') }}" class="flex items-center gap-2 px-3 py-2 rounded hover:bg-blue-700 hover:font-semibold">
                <i data-feather="mail" class="w-5 h-5 text-white"></i> Surat
            </a>
            <a href="{{ route('category.index') }}" class="flex items-center gap-2 px-3 py-2 rounded hover:bg-blue-700 hover:font-semibold">
                <i data-feather="folder" class="w-5 h-5 text-white"></i> Kategori Surat
            </a>
            <a href="{{ route('about') }}" class="flex items-center gap-2 px-3 py-2 rounded hover:bg-blue-700 hover:font-semibold">
                <i data-feather="info" class="w-5 h-5 text-white"></i> About
            </a>
        </nav>

        <!-- Logout -->
        <form method="POST" action="{{ route('logout') }}" class="p-4">
            @csrf
            <button type="submit" class="w-full px-3 py-2 bg-red-600 rounded hover:bg-red-700 font-bold">
                Logout
            </button>
        </form>
    </aside>

    <!-- Main content -->
    <div class="flex-1 flex flex-col">
        <!-- Navbar -->
        <header class="bg-white shadow px-6 py-4 flex justify-between items-center">
            <h1 class="text-xl font-semibold">{{ $title ?? 'Dashboard' }}</h1>
            <span class="text-gray-600">Halo, {{ Auth::user()->name ?? 'User' }}</span>
        </header>

        <!-- Content -->
        <main class="flex-1 p-6">
            @yield('content')
        </main>

        <!-- Footer (hanya area konten) -->
        <footer class="bg-gray-200 text-center py-3 text-sm text-gray-600">
            &copy; {{ date('Y') }} Desa Karangduren - Sistem Arsip Surat
        </footer>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        feather.replace()
    </script>
    @stack('scripts')

</body>
</html>


