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
        <div class="h-screen" x-data="{ openRegister: false }">
            <div class="container space-y-20 pb-20">
                {{-- Nav --}}
                <div class="flex items-center justify-between py-6">
                    <img class="w-[190px] h-[70px]" src="{{asset('assets/logo.png')}}" alt="">
                    <div class="flex items-center gap-4">
                        @php
                            $currentRoute = Route::currentRouteName();
                            $active = 'font-bold text-north-star-blue';
                            $inactive = 'font-medium text-black-mana';
                        @endphp
                        <a href="{{route('beranda')}}" class="{{$currentRoute === 'beranda' ?  $active : $inactive}} text-sm hover:text-north-star-blue">Beranda</a>
                        <a href="{{route('event')}}" class="{{$currentRoute === 'event' ?  $active : $inactive}} text-sm hover:text-north-star-blue hover:font-bold">Event</a>
                        <a href="{{route('history')}}" class="{{$currentRoute === 'history' ?  $active : $inactive}} text-sm hover:text-north-star-blue hover:font-bold">Riwayat</a>
                    </div>
                    <div class="flex items-center gap-2.5">
                        <button @click="openRegister = !openRegister" class="rounded-3xl border border-north-star-blue text-north-star-blue font-bold text-xs px-4 py-3 hover:bg-north-star-blue hover:text-white">Daftar</button>
                        <a href="{{route('login')}}" class="rounded-3xl border border-north-star-blue text-north-star-blue font-bold text-xs px-4 py-3 hover:bg-north-star-blue hover:text-white">Login</a>
                    </div>
                </div>

                    <!-- Modal -->
                <div
                    x-show="openRegister"
                    style="display: none"
                    x-on:keydown.escape.prevent.stop="openRegister = false"
                    role="dialog"
                    aria-modal="true"
                    x-id="['modal-title']"
                    :aria-labelledby="$id('modal-title')"
                    class="fixed inset-0 z-10 overflow-y-auto"
                >
                    <!-- Overlay -->
                    <div x-show="openRegister" x-transition.opacity class="fixed inset-0 bg-black/45"></div>

                    <!-- Panel -->
                    <div
                        x-show="openRegister" x-transition
                        class="relative flex min-h-screen items-center justify-center p-4"
                    >
                        <div
                            x-on:click.stop
                            x-trap.noscroll.inert="openRegister"
                            class="relative min-w-96 max-w-xl rounded-[5px] bg-[#041B5C] p-6 shadow-lg space-y-6"
                        >
                            <div class="absolute -top-2 -right-2 cursor-pointer" x-on:click="openRegister = false">
                                <div class="border border-north-star-blue w-7 h-7 rounded-full flex justify-center items-center bg-white">
                                    <svg width="13" height="13" viewBox="0 0 13 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M1.33333 1.33334L11.6667 11.6667" stroke="#EB0D0D" stroke-width="2" stroke-linecap="round"/>
                                        <path d="M1.33328 11.6667L11.6666 1.33335" stroke="#EB0D0D" stroke-width="2" stroke-linecap="round"/>
                                    </svg>
                                </div>
                            </div>
                            <h2 class="text-white text-center text-2xl">Daftarkan Akun</h2>
                            <div class="flex justify-center items-center gap-5">
                                <a href="{{route('register-customer')}}">
                                    <div class="py-5 px-[26px] flex flex-col justify-center items-center border border-white hover:bg-north-star-blue hover:border-none rounded-lg gap-2.5">
                                        <img src="{{asset('assets/soccer-player.png')}}" class="max-w-[50px] mx-auto" alt="">
                                        <span class="text-white">Penyewa</span>
                                    </div>
                                </a>
                                <a href="{{route('register-admin')}}">
                                    <div class="py-5 px-[26px] flex flex-col justify-center items-center border border-white hover:bg-north-star-blue hover:border-none rounded-lg gap-2.5">
                                        <img src="{{asset('assets/manager.png')}}" class="max-w-[50px] mx-auto" alt="">
                                        <span class="text-white">Lapangan</span>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Content --}}
                
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
