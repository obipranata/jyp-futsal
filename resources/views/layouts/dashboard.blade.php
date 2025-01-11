<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap" rel="stylesheet">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <!-- Styles -->
        @livewireStyles
    </head>
    <body>
        <div class="h-screen">
            <div class="container space-y-20 pb-20">
                {{-- Nav --}}
                <div class="flex items-center justify-between py-6">
                    <img class="w-[190px] h-[70px]" src="{{asset('assets/logo.png')}}" alt="">
                    <div class="flex items-center gap-4">
                        <a href="{{route('beranda')}}" class="text-north-star-blue text-sm font-bold hover:text-north-star-blue">Beranda</a>
                        <a href="" class="text-black-mana text-sm font-medium hover:text-north-star-blue hover:font-bold">Event</a>
                        <a href="" class="text-black-mana text-sm font-medium hover:text-north-star-blue hover:font-bold">Riwayat</a>
                    </div>
                    <div class="flex items-center gap-2.5">
                        <a href="" class="rounded-3xl border border-north-star-blue text-north-star-blue font-bold text-xs px-4 py-3 hover:bg-north-star-blue hover:text-white">Daftar</a>
                        <a href="{{route('login')}}" class="rounded-3xl border border-north-star-blue text-north-star-blue font-bold text-xs px-4 py-3 hover:bg-north-star-blue hover:text-white">Login</a>
                    </div>
                </div>
                
                {{ $slot }}
            </div>
            
            {{-- Footer --}}
            <footer class="bg-olympian-blue text-white text-sm text-center py-4 fixed bottom-0 w-full">
                Copyright 2025. All Right Reserverd
            </footer>
        </div>

        @livewireScripts
    </body>
</html>
