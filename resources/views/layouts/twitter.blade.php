<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <script src="https://kit.fontawesome.com/86cd5efa39.js" crossorigin="anonymous"></script>
    </head>
    <body>

        {{-- Page --}}
        <div class="page">

            {{-- Page Left Side --}}
            <div class="page__left-side">

                {{-- Mainbar --}}
                <livewire:components.mainbar />

            </div>

            {{-- Page Right Side --}}
            <div class="page__right-side">

                {{-- Feed --}}
                <div class="feed">

                    {{-- Feed Top --}}
                    <div class="feed__top sticky top-0">
                        Inicio
                    </div>

                    {{-- Feed Content --}}
                    <div class="feed__content">

                        {{ $slot }}
                        
                    </div>

                </div>

                {{-- Sidebar --}}
                <div class="sidebar">
                </div>

            </div>

        </div>

    </body>
</html>
