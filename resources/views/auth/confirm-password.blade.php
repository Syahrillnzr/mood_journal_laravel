{{-- <x-guest-layout>
    <div class="mb-4 text-sm text-gray-600 dark:text-gray-400">
        {{ __('This is a secure area of the application. Please confirm your password before continuing.') }}
    </div>

    <form method="POST" action="{{ route('password.confirm') }}">
        @csrf

        <!-- Password -->
        <div>
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <div class="flex justify-end mt-4">
            <x-primary-button>
                {{ __('Confirm') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout> --}}


<x-guest-layout>
    <section class="flex justify-center relative min-h-screen">
        <img src="https://pagedone.io/asset/uploads/1702362010.png" alt="gradient background image" class="w-full h-full object-cover fixed">
        <div class="mx-auto max-w-lg px-6 lg:px-8 py-20 relative">
            <img src="https://pagedone.io/asset/uploads/1702362108.png" alt="pagedone logo" class="mx-auto mb-8 object-cover">
            <div class="rounded-2xl bg-white shadow-xl">
                <form method="POST" action="{{ route('password.confirm') }}" class="lg:p-11 p-7 mx-auto">
                    @csrf
                    
                    <div class="mb-8">
                        <h1 class="text-gray-900 text-center font-manrope text-3xl font-bold leading-10 mb-2">Confirm Password</h1>
                        <p class="text-gray-500 text-center text-base font-medium leading-6">This is a secure area. Please confirm your password before continuing.</p>
                    </div>
                    
                    <!-- Password -->
                    <input 
                        id="password" 
                        type="password" 
                        name="password" 
                        required 
                        autocomplete="current-password"
                        class="w-full h-12 text-gray-900 placeholder:text-gray-400 text-lg font-normal leading-7 rounded-full border-gray-300 border shadow-sm focus:outline-none px-4 mb-2" 
                        placeholder="Password">
                    <x-input-error :messages="$errors->get('password')" class="mt-2 mb-6" />
                    
                    <button type="submit" class="w-full h-12 text-white text-center text-base font-semibold leading-6 rounded-full hover:bg-indigo-800 transition-all duration-700 bg-indigo-600 shadow-sm">
                        Confirm
                    </button>
                </form>
            </div>
        </div>
    </section>
</x-guest-layout>