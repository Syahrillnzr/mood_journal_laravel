
<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <section class="flex justify-center relative min-h-screen">
        <img src="https://pagedone.io/asset/uploads/1702362010.png" alt="gradient background image" class="w-full h-full object-cover fixed">
        <div class="mx-auto max-w-lg px-6 lg:px-8 absolute py-20">
            <img src="https://pagedone.io/asset/uploads/1702362108.png" alt="pagedone logo" class="mx-auto lg:mb-11 mb-8 object-cover">
            <div class="rounded-2xl bg-white shadow-xl">
                <form method="POST" action="{{ route('password.email') }}" class="lg:p-11 p-7 mx-auto">
                    @csrf
                    
                    <div class="mb-11">
                        <h1 class="text-gray-900 text-center font-manrope text-3xl font-bold leading-10 mb-2">Forgot Password?</h1>
                        <p class="text-gray-500 text-center text-base font-medium leading-6">No problem. Enter your email and we'll send you a password reset link.</p>
                    </div>
                    
                    <!-- Email Address -->
                    <input 
                        id="email" 
                        type="email" 
                        name="email" 
                        value="{{ old('email') }}" 
                        required 
                        autofocus
                        class="w-full h-12 text-gray-900 placeholder:text-gray-400 text-lg font-normal leading-7 rounded-full border-gray-300 border shadow-sm focus:outline-none px-4 mb-2" 
                        placeholder="Email Address">
                    <x-input-error :messages="$errors->get('email')" class="mt-2 mb-4" />
                    
                    <button type="submit" class="w-full h-12 text-white text-center text-base font-semibold leading-6 rounded-full hover:bg-indigo-800 transition-all duration-700 bg-indigo-600 shadow-sm mb-11">
                        Email Password Reset Link
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