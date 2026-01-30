 <x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <section class="flex justify-center relative min-h-screen">
        <img src="https://pagedone.io/asset/uploads/1702362010.png" alt="gradient background image" class="w-full h-full object-cover fixed">
        <div class="mx-auto max-w-lg px-6 lg:px-8 absolute py-20">
            <img src="https://pagedone.io/asset/uploads/1702362108.png" alt="pagedone logo" class="mx-auto lg:mb-11 mb-8 object-cover">
            <div class="rounded-2xl bg-white shadow-xl">
                <form method="POST" action="{{ route('login') }}" class="lg:p-11 p-7 mx-auto">
                    @csrf
                    
                    <div class="mb-11">
                        <h1 class="text-gray-900 text-center font-manrope text-3xl font-bold leading-10 mb-2">Welcome Back</h1>
                        <p class="text-gray-500 text-center text-base font-medium leading-6">Login to your account</p>
                    </div>
                    
                    <!-- Email Address -->
                    <input 
                        id="email" 
                        type="email" 
                        name="email" 
                        value="{{ old('email') }}" 
                        required 
                        autofocus 
                        autocomplete="username"
                        class="w-full h-12 text-gray-900 placeholder:text-gray-400 text-lg font-normal leading-7 rounded-full border-gray-300 border shadow-sm focus:outline-none px-4 mb-2" 
                        placeholder="Email">
                    <x-input-error :messages="$errors->get('email')" class="mt-2 mb-4" />
                    
                    <!-- Password -->
                    <input 
                        id="password" 
                        type="password" 
                        name="password" 
                        required 
                        autocomplete="current-password"
                        class="w-full h-12 text-gray-900 placeholder:text-gray-400 text-lg font-normal leading-7 rounded-full border-gray-300 border shadow-sm focus:outline-none px-4 mb-1" 
                        placeholder="Password">
                    <x-input-error :messages="$errors->get('password')" class="mt-2 mb-4" />
                    
                    <!-- Remember Me & Forgot Password -->
                    <div class="flex justify-between items-center mb-6">
                        <label for="remember_me" class="inline-flex items-center">
                            <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                            <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                        </label>
                        
                        @if (Route::has('password.request'))
                            <a href="{{ route('password.request') }}" class="text-indigo-600 text-right text-base font-normal leading-6">
                                Forgot Password?
                            </a>
                        @endif
                    </div>
                    
                    <button type="submit" class="w-full h-12 text-white text-center text-base font-semibold leading-6 rounded-full hover:bg-indigo-800 transition-all duration-700 bg-indigo-600 shadow-sm mb-11">
                        Login
                    </button>
                    
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="flex justify-center text-gray-900 text-base font-medium leading-6">
                            Don't have an account? 
                            <span class="text-indigo-600 font-semibold pl-3">Sign Up</span>
                        </a>
                    @endif
                </form>
            </div>
        </div>
    </section>
</x-guest-layout>