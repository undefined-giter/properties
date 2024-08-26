<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('pageTitle', 'Admin') | Administration</title>
    @vite('resources/css/app.css')
</head>
<body>
    @if (session('success'))
    <div id="flash-message" class="fixed top-4 left-1/2 transform -translate-x-1/2 bg-green-500 text-white text-center px-4 py-2 rounded shadow-lg z-50">
            {{ session('success') }}
        </div>
    @endif
    
    <h1 class='text-center text-xl font-bold mt-4'>@yield('h1', 'Adminisration')</h1>


    @yield('content')
    @vite('resources/js/app.js')


    <script>
        document.addEventListener('DOMContentLoaded', function() {
            setTimeout(function() {
                var flashMessage = document.getElementById('flash-message');
                if (flashMessage) {
                    flashMessage.style.transition = 'opacity 0.5s ease';
                    flashMessage.style.opacity = '0';
                    setTimeout(() => flashMessage.remove(), 500);
                }
            }, 3000);
        });
    </script>
</body>
</html>