@extends('layout.app')
@section('page_title', 'Profile')
@section('title', 'Profile')
@section('content')

<main class="flex-1 overflow-y-auto p-4 md:p-6 bg-gray-50">
    <div class="max-w-5xl mx-auto">
        <!-- Breadcrumb -->
        <nav class="mb-4 text-sm" aria-label="Breadcrumb">
            <ol class="flex items-center space-x-2">
                <li>
                    <a href="{{ route('dashboard.index') }}" class="text-gray-500 hover:text-gray-700">Dashboard</a>
                </li>
                <li class="flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-gray-400"><path d="m9 18 6-6-6-6"></path></svg>
                    <span class="ml-2 text-gray-900 font-medium">Profile</span>
                </li>
            </ol>
        </nav>

    <div class="py-2">
        <div class="max-w-7xl space-y-6">
            <div class="p-8 bg-white shadow rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            <div class="p-8 bg-white shadow rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            <div class="p-8 bg-white shadow rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>
        </div>
    </div>
</main>

@endsection

