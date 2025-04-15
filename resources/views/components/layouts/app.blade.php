<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Lunaris')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    
    @livewireStyles
    @stack('styles')
</head>
<body class="bg-light">

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary mb-4">
        <div class="container-fluid">
            
        </div>

    </nav><a href="/" wire:navigate>Lunaris</a><a href="/posts" wire:navigate>Posts</a>

    <!-- Content -->
    <main class="container mb-5">
        @yield('content', (isset($slot) ? $slot : '') )
    </main>

    <!-- Toast Container -->
    <div class="position-fixed top-0 end-0 p-3" style="z-index: 1055">
        <!-- Toastlar burada JavaScript ile dinamik olarak oluşturulacak -->
    </div>

    <!-- Bootstrap JS + jQuery -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    @livewireScripts
    @stack('scripts')
</body>
</html>