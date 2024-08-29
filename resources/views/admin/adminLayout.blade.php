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
        <div class="flash_message fixed top-4 left-1/2 transform -translate-x-1/2 bg-green-500 text-white text-center px-4 py-2 rounded shadow-lg z-50">
            {{ session('success') }}
        </div>
    @endif
    @if (session('error'))
        <div class="flash_message fixed top-4 left-1/2 transform -translate-x-1/2 bg-red-500 text-white text-center px-4 py-2 rounded shadow-lg z-50">
            {{ session('error') }}
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @php
        $route = request()->route()->getName();
    @endphp

    <nav class="navbar navbar-expand-lg bg-orange-500 navbar-dark flex items-center justify-center">
        <p class="mr-auto ml-2">Agence</p>
        <button class="btn btn-primary ml-auto w-[90px] {{ str_contains($route, 'property') ? 'active outline outline-2 outline-green-500' : '' }}" 
            onclick="window.location='{{ route('admin.property.index') }}'">
            Biens
        </button>

        <button class="btn btn-primary w-[90px] mx-2 {{ str_contains($route, 'option') ? 'active outline outline-2 outline-green-500' : '' }}" 
            onclick="window.location='{{ route('admin.option.index') }}'">
            Options
        </button>
    </nav>

    <h1 class='text-center text-xl font-bold mt-4'>@yield('h1', 'Adminisration')</h1>


    @yield('content')
    @vite('resources/js/app.js')


    <script>
        document.addEventListener('DOMContentLoaded', function() {
            setTimeout(function() {
                var flash_message = document.getElementById('flash_message');
                if (flash_message) {
                    flash_message.style.transition = 'opacity 0.5s ease';
                    flash_message.style.opacity = '0';
                    setTimeout(() => flash_message.remove(), 500);
                }
            }, 3000);
        });
    </script>
</body>
</html>