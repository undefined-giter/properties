<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        @php
            $adminPage = Str::contains(Route::currentRouteName(), 'admin') ? true : false;
            $titleSuffix  = $adminPage ? 'Administration' : 'Agence';
            //$adminUser = auth()->check() && auth()->user()->role === 'admin';
        @endphp
        <title>@yield('pageTitle', 'Biens Immobiliés') | {{ $titleSuffix }}</title>
        
        @vite('resources/css/app.css')
        <link rel="stylesheet" href="{{ asset('css/globalClasses.css') }}">
    </head>
    <body>
        @php
            $route = request()->route()->getName();
        @endphp

        <nav class="navbar navbar-expand-lg bg-orange-500 navbar-dark flex items-center justify-between">
            <div class="flex-1">
                <a href="{{ route('homepage') }}" class="ml-2">Agence</a>
            </div>

            <div class="flex-1 text-center">
                <button class="btn btn-primary w-[180px] mx-auto {{ str_contains($route, 'option') ? 'active outline outline-2 outline-green-500' : '' }}" 
                    onclick="window.location='{{ route('list') }}'">
                    Liste des biens
                </button>
            </div>

            <div class="flex-1 text-right">
                @if(true) {{-- $adminUser --}}
                    <button class="btn btn-primary w-[90px] {{ str_contains($route, 'property') ? 'active outline outline-2 outline-green-500' : '' }}" 
                        onclick="window.location='{{ route('admin.property.index') }}'">
                        Biens
                    </button>

                    <button class="btn btn-primary w-[90px] mx-2 {{ str_contains($route, 'option') ? 'active outline outline-2 outline-green-500' : '' }}" 
                        onclick="window.location='{{ route('admin.option.index') }}'">
                        Options
                    </button>
                @endif
            </div>
        </nav>

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


        <h1 class="text-center text-lg mt-8">
            @yield('title', $titleSuffix )
        </h1>

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
