{{-- <x-guest-layout>
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

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout> --}}


<x-guest-layout>
    <section class="flex justify-center relative min-h-screen">
        <img src="https://pagedone.io/asset/uploads/1702362010.png" alt="gradient background image" class="w-full h-full object-cover fixed">
        <div class="mx-auto max-w-lg px-6 lg:px-8 py-10 relative">
            <img src="https://pagedone.io/asset/uploads/1702362108.png" alt="pagedone logo" class="mx-auto mb-6 object-cover">
            <div class="rounded-2xl bg-white shadow-xl">
                <form method="POST" action="{{ route('register') }}" class="lg:p-11 p-7 mx-auto">
                    @csrf
                    
                    <div class="mb-8">
                        <h1 class="text-gray-900 text-center font-manrope text-3xl font-bold leading-10 mb-2">Create Account</h1>
                        <p class="text-gray-500 text-center text-base font-medium leading-6">Join us today and start your journey</p>
                    </div>
                    
                    <!-- Name -->
                    <input 
                        id="name" 
                        type="text" 
                        name="name" 
                        value="{{ old('name') }}" 
                        required 
                        autofocus 
                        autocomplete="name"
                        class="w-full h-12 text-gray-900 placeholder:text-gray-400 text-lg font-normal leading-7 rounded-full border-gray-300 border shadow-sm focus:outline-none px-4 mb-2" 
                        placeholder="Full Name">
                    <x-input-error :messages="$errors->get('name')" class="mt-2 mb-4" />
                    
                    <!-- Email Address -->
                    <input 
                        id="email" 
                        type="email" 
                        name="email" 
                        value="{{ old('email') }}" 
                        required 
                        autocomplete="username"
                        class="w-full h-12 text-gray-900 placeholder:text-gray-400 text-lg font-normal leading-7 rounded-full border-gray-300 border shadow-sm focus:outline-none px-4 mb-2" 
                        placeholder="Email Address">
                    <x-input-error :messages="$errors->get('email')" class="mt-2 mb-4" />
                    
                    <!-- Password -->
                    <input 
                        id="password" 
                        type="password" 
                        name="password" 
                        required 
                        autocomplete="new-password"
                        class="w-full h-12 text-gray-900 placeholder:text-gray-400 text-lg font-normal leading-7 rounded-full border-gray-300 border shadow-sm focus:outline-none px-4 mb-2" 
                        placeholder="Password">
                    <x-input-error :messages="$errors->get('password')" class="mt-2 mb-4" />
                    
                    <!-- Confirm Password -->
                    <input 
                        id="password_confirmation" 
                        type="password" 
                        name="password_confirmation" 
                        required 
                        autocomplete="new-password"
                        class="w-full h-12 text-gray-900 placeholder:text-gray-400 text-lg font-normal leading-7 rounded-full border-gray-300 border shadow-sm focus:outline-none px-4 mb-6" 
                        placeholder="Confirm Password">
                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2 mb-4" />
                    
                    <button type="submit" class="w-full h-12 text-white text-center text-base font-semibold leading-6 rounded-full hover:bg-indigo-800 transition-all duration-700 bg-indigo-600 shadow-sm mb-8">
                        Register
                    </button>
                    
                    <a href="{{ route('login') }}" class="flex justify-center text-gray-900 text-base font-medium leading-6">
                        Already registered? 
                        <span class="text-indigo-600 font-semibold pl-3">Login</span>
                    </a>
                </form>
            </div>
        </div>
    </section>
</x-guest-layout>