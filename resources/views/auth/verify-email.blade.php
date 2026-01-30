{{-- <x-guest-layout>
    <div class="mb-4 text-sm text-gray-600 dark:text-gray-400">
        {{ __('Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.') }}
    </div>

    @if (session('status') == 'verification-link-sent')
        <div class="mb-4 font-medium text-sm text-green-600 dark:text-green-400">
            {{ __('A new verification link has been sent to the email address you provided during registration.') }}
        </div>
    @endif

    <div class="mt-4 flex items-center justify-between">
        <form method="POST" action="{{ route('verification.send') }}">
            @csrf

            <div>
                <x-primary-button>
                    {{ __('Resend Verification Email') }}
                </x-primary-button>
            </div>
        </form>

        <form method="POST" action="{{ route('logout') }}">
            @csrf

            <button type="submit" class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800">
                {{ __('Log Out') }}
            </button>
        </form>
    </div>
</x-guest-layout> --}}


<x-guest-layout>
    <section class="flex justify-center relative min-h-screen">
        <img src="https://pagedone.io/asset/uploads/1702362010.png" alt="gradient background image" class="w-full h-full object-cover fixed">
        <div class="mx-auto max-w-lg px-6 lg:px-8 py-20 relative">
            <img src="https://pagedone.io/asset/uploads/1702362108.png" alt="pagedone logo" class="mx-auto mb-8 object-cover">
            <div class="rounded-2xl bg-white shadow-xl">
                <div class="lg:p-11 p-7 mx-auto">
                    
                    <div class="mb-8">
                        <h1 class="text-gray-900 text-center font-manrope text-3xl font-bold leading-10 mb-2">Verify Your Email</h1>
                        <p class="text-gray-500 text-center text-base font-medium leading-6">
                            Thanks for signing up! Before getting started, please verify your email address by clicking on the link we just emailed to you.
                        </p>
                    </div>

                    @if (session('status') == 'verification-link-sent')
                        <div class="mb-6 p-4 rounded-lg bg-green-50 border border-green-200">
                            <p class="text-green-600 text-center text-sm font-medium">
                                A new verification link has been sent to your email address!
                            </p>
                        </div>
                    @endif

                    <form method="POST" action="{{ route('verification.send') }}" class="mb-6">
                        @csrf
                        <button type="submit" class="w-full h-12 text-white text-center text-base font-semibold leading-6 rounded-full hover:bg-indigo-800 transition-all duration-700 bg-indigo-600 shadow-sm">
                            Resend Verification Email
                        </button>
                    </form>

                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="w-full text-gray-600 hover:text-gray-900 text-center text-base font-medium leading-6 transition-all duration-300">
                            Log Out
                        </button>
                    </form>

                </div>
            </div>
        </div>
    </section>
</x-guest-layout>