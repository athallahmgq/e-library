@section('title2', 'Register')


<x-guest-layout>


   {{-- Register --}}
   <div class="sm:mx-auto sm:w-full sm:max-w-md py-10">
    <div class="flex justify-center">
        <div class="flex items-center gap-2">
            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-emerald-600"><path d="M2 16V4a2 2 0 0 1 2-2h11"></path><path d="M5 14H4a2 2 0 1 0 0 4h1"></path><path d="M22 18H11a2 2 0 1 0 0 4h11"></path><path d="M11 6h4"></path><path d="M11 10h7"></path><path d="M11 14h10"></path><path d="M11 18h4"></path><path d="M11 22h4"></path></svg>
            <h1 class="text-2xl font-bold text-gray-900">E-Library</h1>
        </div>
    </div>
    <h2 class="mt-6 text-center text-3xl font-extrabold text-gray-900">
         Register 
    </h2>
    <p class="mt-2 text-center text-sm text-gray-600">
        Atau
    <a href="{{ route('login') }}" class="font-medium text-emerald-600 hover:text-emerald-500 underline">
            masuk ke akun yang sudah ada!
        </a>
    </p>
 </div>

    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        {{-- ROLE --}}

        <div class="mt-4">
            <x-input-label for="role" :value="__('Daftar Sebagai')" />
            <select id="role" name="role" required class="block mt-1 p-2 rounded-lg border-gray-300 w-full">
                <option value="user">User</option>
                <option value="admin">Admin</option>
            </select>
        </div>
        

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
