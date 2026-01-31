<section class="py-12">
    <div class="w-full max-w-3xl mx-auto bg-white dark:bg-gray-800 shadow rounded-xl p-8 space-y-6">
        <!-- Header -->
        <header class="space-y-1">
            <h2 class="text-2xl font-bold text-gray-900 dark:text-gray-100">Update Password</h2>
            <p class="text-sm text-gray-500 dark:text-gray-400">
                Ensure your account is using a long, random password to stay secure.
            </p>
        </header>

        <!-- Password Update Form -->
        <form method="post" action="{{ route('password.update') }}" class="space-y-6">
            @csrf
            @method('put')

            <!-- Current Password -->
            <div class="flex flex-col gap-1.5">
                <label for="update_password_current_password" class="text-gray-600 dark:text-gray-400 font-medium">
                    Current Password
                </label>
                <x-text-input id="update_password_current_password" name="current_password" type="password"
                    class="w-full px-5 py-3 rounded-lg shadow border border-gray-200 dark:border-gray-700"
                    autocomplete="current-password" />
                <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-1" />
            </div>

            <!-- New Password -->
            <div class="flex flex-col gap-1.5">
                <label for="update_password_password" class="text-gray-600 dark:text-gray-400 font-medium">
                    New Password
                </label>
                <x-text-input id="update_password_password" name="password" type="password"
                    class="w-full px-5 py-3 rounded-lg shadow border border-gray-200 dark:border-gray-700"
                    autocomplete="new-password" />
                <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-1" />
            </div>

            <!-- Confirm Password -->
            <div class="flex flex-col gap-1.5">
                <label for="update_password_password_confirmation" class="text-gray-600 dark:text-gray-400 font-medium">
                    Confirm Password
                </label>
                <x-text-input id="update_password_password_confirmation" name="password_confirmation" type="password"
                    class="w-full px-5 py-3 rounded-lg shadow border border-gray-200 dark:border-gray-700"
                    autocomplete="new-password" />
                <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-1" />
            </div>

            <!-- Submit -->
            <div class="flex items-center gap-4">
                <x-primary-button class="px-6 py-3 rounded-lg shadow-lg">Save</x-primary-button>

                @if (session('status') === 'password-updated')
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

