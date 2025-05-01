<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>E-Library | @yield('title', 'Dashboard')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <script src="https://unpkg.com/lucide@latest"></script>
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
        .sidebar {
            transition: width 0.3s ease;
        }
        @media (max-width: 768px) {
            .sidebar {
                width: 0;
                overflow: hidden;
            }
            .sidebar.open {
                width: 16rem;
            }
        }
    </style>
</head>
<body class="bg-gray-50 text-gray-900">
    <div class="flex ">
        {{-- Sidebar --}}
        @include("layout.sidebar")

        <div class="flex-1 flex flex-col md:pl-64">
            {{-- Header --}} 
            @include("layout.header")


            {{-- Main Content --}}
            <main>
                @yield('content')
            </main>
        </div>


    </div>
    <script>
        
        const menuBtn = document.getElementById('menuBtn');
        const sidebar = document.getElementById('sidebar');
        
        menuBtn.addEventListener('click', () => {
            sidebar.classList.toggle('hidden');
            sidebar.classList.toggle('open');
        });

       
        document.addEventListener('click', (e) => {
            if (window.innerWidth < 768 && 
                !sidebar.contains(e.target) && 
                !menuBtn.contains(e.target) && 
                !sidebar.classList.contains('hidden')) {
                sidebar.classList.add('hidden');
                sidebar.classList.remove('open');
            }
        });

    </script>
    <script src="https://unpkg.com/alpinejs" defer></script>
</body>
</html>