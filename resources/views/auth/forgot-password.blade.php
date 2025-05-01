@section('title2', 'Ganti')

<x-guest-layout>

    <div class="flex justify-between pb-8 pt-5">
        <div class="flex items-center gap-2">
            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-emerald-600"><path d="M2 16V4a2 2 0 0 1 2-2h11"></path><path d="M5 14H4a2 2 0 1 0 0 4h1"></path><path d="M22 18H11a2 2 0 1 0 0 4h11"></path><path d="M11 6h4"></path><path d="M11 10h7"></path><path d="M11 14h10"></path><path d="M11 18h4"></path><path d="M11 22h4"></path></svg>
            <h1 class="text-2xl font-bold text-gray-900">E-Library</h1>
        </div>
        <div>
            <a href="{{ route('login') }}" class="font-medium text-emerald-600 hover:text-emerald-500 underline">
                Back
            </a>
        </div>
    </div>

    <div class="mb-4 text-sm text-gray-600">
        {{ __('Kita semua pernah lupa, termasuk soal email Tapi tenang, kita siap bantu kamu balik ke akunmu.Cukup ikuti langkah-langkah di bawah ini buat reset dan mulai lagi ') }}
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-primary-button>
                {{ __('Email Password Reset Link') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
