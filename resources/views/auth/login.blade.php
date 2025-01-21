<x-dashboard-layout>
    <div class="mx-auto lg:max-w-[700px] space-y-5">
        <div class="font-medium text-[#464646] text-[32px]">
            Login
        </div>
        <div class="border border-top  border-[#D9D9D9]"></div>
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="flex gap-5">
                <div class="space-y-4 flex-1">
                    <label for="email" class="text-north-star-blue text-sm pl-4 font-semibold">Email <span class="text-[#EA1C0F]">*</span></label>
                    <input type="email" name="email" id="email" class="bg-[#F1F1F1] border-none text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 w-full h-[50px]" placeholder="Masukkan Email Anda" required />
                    <div class="text-[#EA1C0F] pl-4 text-xs">@error('email') email atau kata sandi salah! @enderror</div>
                </div>
                <div class="space-y-4 flex-1">
                    <label for="password" class="text-north-star-blue text-sm pl-4 font-semibold">Password <span class="text-[#EA1C0F]">*</span></label>
                    <input type="password" name="password" id="password" class="bg-[#F1F1F1] border-none text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 w-full h-[50px]" placeholder="Masukkan Password Anda" required />
                    <div class="text-[#EA1C0F] pl-4 text-xs">@error('password') email atau kata sandi salah! @enderror</div>
                </div>
            </div>
            <div class="mt-5 space-y-4">
                <button class="w-full bg-north-star-blue text-white text-xl font-semibold rounded-lg py-4" type="submit">
                    Masuk
                </button>
                <div class="flex justify-center">
                    <button @click="openRegister = !openRegister" class="text-[#858585] text-base font-medium">
                        Belum Mempunyai Akun? <span class="text-north-star-blue">Daftar</span>
                    </button>
                </div>
            </div>
        </form>
    </div>
    {{-- <x-authentication-card>
        <x-slot name="logo">
            <x-authentication-card-logo />
        </x-slot>

        <x-validation-errors class="mb-4" />

        @session('status')
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ $value }}
            </div>
        @endsession

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div>
                <x-label for="email" value="{{ __('Email') }}" />
                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            </div>

            <div class="mt-4">
                <x-label for="password" value="{{ __('Password') }}" />
                <x-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
            </div>

            <div class="block mt-4">
                <label for="remember_me" class="flex items-center">
                    <x-checkbox id="remember_me" name="remember" />
                    <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif

                <x-button class="ms-4">
                    {{ __('Log in') }}
                </x-button>
            </div>
        </form>
    </x-authentication-card> --}}
</x-dashboard-layout>
