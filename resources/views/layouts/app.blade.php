<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lalapan Cak Der - Inventory</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;700;900&display=swap');
        body { font-family: 'Inter', sans-serif; overflow-x: hidden; }
        /* Memastikan navigasi tidak bertumpuk di layar sangat kecil */
        .nav-scroll { overflow-x: auto; -webkit-overflow-scrolling: touch; }
        .nav-scroll::-webkit-scrollbar { display: none; }
    </style>
</head>
<body class="bg-gray-100">
    @yield('content')
    @stack('scripts')
</body>
</html>