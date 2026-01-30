{{-- <x-guest-layout>
    <form method="POST" action="{{ route('password.store') }}">
        @csrf

        <!-- Password Reset Token -->
        <input type="hidden" name="token" value="{{ $request->route('token') }}">

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email', $request->email)" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />
            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
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
            <x-primary-button>
                {{ __('Reset Password') }}
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
                <form method="POST" action="{{ route('password.store') }}" class="lg:p-11 p-7 mx-auto">
                    @csrf

                    <!-- Password Reset Token -->
                    <input type="hidden" name="token" value="{{ $request->route('token') }}">
                    
                    <div class="mb-8">
                        <h1 class="text-gray-900 text-center font-manrope text-3xl font-bold leading-10 mb-2">Reset Password</h1>
                        <p class="text-gray-500 text-center text-base font-medium leading-6">Enter your email and create a new password</p>
                    </div>
                    
                    <!-- Email Address -->
                    <input 
                        id="email" 
                        type="email" 
                        name="email" 
                        value="{{ old('email', $request->email) }}" 
                        required 
                        autofocus 
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
                        placeholder="New Password">
                    <x-input-error :messages="$errors->get('password')" class="mt-2 mb-4" />
                    
                    <!-- Confirm Password -->
                    <input 
                        id="password_confirmation" 
                        type="password" 
                        name="password_confirmation" 
                        required 
                        autocomplete="new-password"
                        class="w-full h-12 text-gray-900 placeholder:text-gray-400 text-lg font-normal leading-7 rounded-full border-gray-300 border shadow-sm focus:outline-none px-4 mb-6" 
                        placeholder="Confirm New Password">
                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2 mb-4" />
                    
                    <button type="submit" class="w-full h-12 text-white text-center text-base font-semibold leading-6 rounded-full hover:bg-indigo-800 transition-all duration-700 bg-indigo-600 shadow-sm mb-8">
                        Reset Password
                    </button>
                    
                    <a href="{{ route('login') }}" class="flex justify-center text-gray-900 text-base font-medium leading-6">
                        Remember your password? 
                        <span class="text-indigo-600 font-semibold pl-3">Back to Login</span>
                    </a>
                </form>
            </div>
        </div>
    </section>
</x-guest-layout>