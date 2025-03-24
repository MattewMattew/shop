@extends('layouts.app')

@section('title', 'Авторизация')

@section('content')
<x-guest-layout>
    <div class="min-h-screen flex items-center justify-center bg-gray-100">
        <div class="max-w-md w-full px-6 py-8 bg-white rounded-lg shadow-md">
            <h2 class="text-2xl font-bold text-center mb-6">{{ __('Авторизация') }}</h2>

            <!-- Session Status -->
            <x-auth-session-status class="mb-4" :status="session('status')" />

            <!-- Validation Errors -->
            <x-auth-validation-errors class="mb-4" :errors="$errors" />

            <form method="POST" action="{{ route('login') }}" class="space-y-6" id="loginForm">
                @csrf

                <!-- Email Address -->
                <div>
                    <x-label for="email" :value="__('Email')" class="block text-sm font-medium text-gray-700" />

                    <x-input id="email" class="mt-1 block w-full px-3 py-2 border border-gray-300 placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md h-10"
                             type="email" name="email" :value="old('email')" required autofocus aria-required="true" aria-label="Email" />
                </div>

                <!-- Password -->
                <div>
                    <x-label for="password" :value="__('Password')" class="block text-sm font-medium text-gray-700" />

                    <x-input id="password" class="mt-1 block w-full px-3 py-2 border border-gray-300 placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md h-10"
                             type="password" name="password" required autocomplete="current-password" aria-required="true" aria-label="Password" />
                </div>

                <!-- Remember Me -->
                <div class="flex items-center justify-between">
                    <div class="flex items-center">
                        <input id="remember_me" type="checkbox" class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded"
                               name="remember" aria-label="Remember me">
                        <label for="remember_me" class="ml-2 block text-sm text-gray-900">
                            {{ __('Remember me') }}
                        </label>
                    </div>

                    @if (Route::has('password.request'))
                    <div class="text-sm">
                        <a href="{{ route('password.request') }}" class="font-medium text-indigo-600 hover:text-indigo-500">
                            {{ __('Forgot your password?') }}
                        </a>
                    </div>
                    @endif
                </div>

                <div>
                    <button type="submit" class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 relative h-10 btn-success" id="submitButton">
                        <span id="submitText">{{ __('Log in') }}</span>
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script>
        document.getElementById('loginForm').addEventListener('submit', function() {
            var submitButton = document.getElementById('submitButton');
            var submitText = document.getElementById('submitText');
            var loadingSpinner = document.getElementById('loadingSpinner');

            submitButton.disabled = true;
            submitText.classList.add('hidden');
            loadingSpinner.classList.remove('hidden');
        });
    </script>
</x-guest-layout>
@endsection
