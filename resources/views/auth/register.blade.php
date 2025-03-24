@extends('layouts.app')

@section('title', 'Регистрация')

@section('content')
<x-guest-layout>
    <x-auth-card>
        <h2 class="text-2xl font-bold text-center mb-6">{{ __('Регистрация') }}</h2>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('register') }}" id="registerForm" aria-label="Registration Form" class="space-y-6">
            @csrf

            <!-- Name -->
            <div class="">
                <x-label for="name" :value="__('Name')" class="block text-sm font-medium text-gray-700" />

                <x-input id="name" class="mt-1 block w-full px-3 py-2 border border-gray-300 placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md h-10"
                         type="text" name="name" :value="old('name')" required autofocus aria-required="true" aria-label="Name" />
            </div>

            <!-- Email Address -->
            <div class="">
                <x-label for="email" :value="__('Email')" class="block text-sm font-medium text-gray-700" />

                <x-input id="email" class="mt-1 block w-full px-3 py-2 border border-gray-300 placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md h-10"
                         type="email" name="email" :value="old('email')" required aria-required="true" aria-label="Email" />
            </div>

            <!-- Password -->
            <div class="">
                <x-label for="password" :value="__('Password')" class="block text-sm font-medium text-gray-700" />

                <x-input id="password" class="mt-1 block w-full px-3 py-2 border border-gray-300 placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md h-10"
                         type="password" name="password" required autocomplete="new-password" aria-required="true" aria-label="Password" />
            </div>

            <!-- Confirm Password -->
            <div class="">
                <x-label for="password_confirmation" :value="__('Confirm Password')" class="block text-sm font-medium text-gray-700" />

                <x-input id="password_confirmation" class="mt-1 block w-full px-3 py-2 border border-gray-300 placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md h-10"
                         type="password" name="password_confirmation" required aria-required="true" aria-label="Confirm Password" />
            </div>

            <div class="flex items-center justify-between mt-6 ">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>
            </div>
            <div class="flex items-center justify-between mt-6 ">
                <x-button class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 relative h-10 btn-success" id="submitButton">
                    <span id="submitText">{{ __('Register') }}</span>
                </x-button>
            </div>
        </form>
    </x-auth-card>

    <script>
        document.getElementById('registerForm').addEventListener('submit', function() {
            var submitButton = document.getElementById('submitButton');
            var submitText = document.getElementById('submitText');
            var loadingSpinner = document.getElementById('loadingSpinner');

            submitButton.disabled = true;
            submitText.classList.add('hidden');
            loadingSpinner.classList.remove('hidden');
        });

        // Client-side validation for better UX
        document.getElementById('registerForm').addEventListener('submit', function(event) {
            var password = document.getElementById('password').value;
            var confirmPassword = document.getElementById('password_confirmation').value;

            if (password !== confirmPassword) {
                alert('Passwords do not match!');
                event.preventDefault(); // Prevent form submission
            }
        });
    </script>
</x-guest-layout>
@endsection
