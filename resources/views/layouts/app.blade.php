<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="icon" type="image/png" href="{{ asset('favicon.png') }}">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
    </style>
</head>
<body>
    <div class="flex min-h-screen">
        <!-- Sidebar -->
        <aside class="w-64 bg-gray-900 text-white flex-shrink-0">
            <div class="h-16 flex items-center justify-center border-b border-gray-800">
                <span class="text-xl font-bold">Menu</span>
            </div>
            <nav class="mt-4">
                <ul class="space-y-2 px-4">
                    <li><a href="{{ route('dashboard') }}" class="block py-2 px-3 rounded hover:bg-gray-800">Dashboard</a></li>
                    <li><a href="{{ route('vehicles.manage') }}" class="block py-2 px-3 rounded hover:bg-gray-800">Kendaraan</a></li>
                    <li><a href="{{ route('mahasiswa.index') }}" class="block py-2 px-3 rounded hover:bg-gray-800">Mahasiswa</a></li>
                    <li><a href="{{ route('dosen.index') }}" class="block py-2 px-3 rounded hover:bg-gray-800">Dosen</a></li>
                    <li><a href="{{ route('karyawan.index') }}" class="block py-2 px-3 rounded hover:bg-gray-800">Karyawan</a></li>
                </ul>
            </nav>
        </aside>
        <!-- Main Content -->
        <main class="flex-1">
            @yield('content')
        </main>
    </div>
</body>
</html>