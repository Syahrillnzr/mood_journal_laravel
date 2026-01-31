<section class="py-12">
    <div class="w-full max-w-3xl mx-auto bg-white dark:bg-gray-800 shadow rounded-xl p-8 space-y-6">
        <!-- Header -->
        <header class="space-y-1">
            <h2 class="text-2xl font-bold text-gray-900 dark:text-gray-100">Profile Information</h2>
            <p class="text-sm text-gray-500 dark:text-gray-400">
                Update your account's profile information and email address.
            </p>
        </header>

        <!-- Verification Form -->
        <form id="send-verification" method="post" action="{{ route('verification.send') }}">
            @csrf
        </form>

        <!-- Profile Update Form -->
        <form method="post" action="{{ route('profile.update') }}" class="space-y-6">
            @csrf
            @method('patch')

            <!-- Name -->
            <div class="flex flex-col gap-1.5">
                <label for="name" class="text-gray-600 dark:text-gray-400 font-medium">Name</label>
                <x-text-input id="name" name="name" type="text" 
                    class="w-full px-5 py-3 rounded-lg shadow border border-gray-200 dark:border-gray-700" 
                    :value="old('name', $user->name)" required autofocus autocomplete="name" />
                <x-input-error class="mt-1" :messages="$errors->get('name')" />
            </div>

            <!-- Email -->
            <div class="flex flex-col gap-1.5">
                <label for="email" class="text-gray-600 dark:text-gray-400 font-medium">Email</label>
                <x-text-input id="email" name="email" type="email" 
                    class="w-full px-5 py-3 rounded-lg shadow border border-gray-200 dark:border-gray-700" 
                    :value="old('email', $user->email)" required autocomplete="username" />
                <x-input-error class="mt-1" :messages="$errors->get('email')" />

                @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                    <p class="text-sm mt-2 text-gray-800 dark:text-gray-200">
                        Your email address is unverified.
                        <button form="send-verification" 
                            class="underline text-indigo-600 hover:text-indigo-800 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800">
                            Click here to re-send the verification email.
                        </button>
                    </p>

                    @if (session('status') === 'verification-link-sent')
                        <p class="mt-2 font-medium text-sm text-green-600 dark:text-green-400">
                            A new verification link has been sent to your email address.
                        </p>
                    @endif
                @endif
            </div>

            <!-- Submit -->
            <div class="flex items-center gap-4">
                <x-primary-button class="px-6 py-3 rounded-lg shadow-lg">Save</x-primary-button>

                @if (session('status') === 'profile-updated')
                    <p x-data="{ show: true }" x-show="show" x-transition
                       x-init="setTimeout(() => show = false, 2000)"
                       class="text-sm text-gray-600 dark:text-gray-400">
                        Saved.
                    </p>
                @endif
            </div>
        </form>
    </div>
</section>
