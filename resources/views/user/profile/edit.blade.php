<x-user-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-900 dark:text-gray-100 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-8">

            <!-- Update Profile Information -->
            <div class="bg-white dark:bg-gray-800 shadow rounded-2xl p-6 sm:p-8 space-y-6">
                <h3 class="text-2xl font-bold text-gray-900 dark:text-gray-100">
                    {{ __('Update Profile Information') }}
                </h3>

                <form id="send-verification" method="post" action="{{ route('verification.send') }}">
                    @csrf
                </form>

                <form method="post" action="{{ route('profile.update') }}" class="space-y-6">
                    @csrf
                    @method('patch')

                    <div class="space-y-4">
                        <div class="flex flex-col">
                            <label for="name" class="text-gray-600 dark:text-gray-400 text-base font-medium">Name</label>
                            <input 
                                id="name" 
                                name="name" 
                                type="text" 
                                class="w-full px-5 py-3 rounded-lg border border-gray-200 shadow-sm focus:ring-2 focus:ring-indigo-500 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-100" 
                                value="{{ old('name', $user->name) }}" 
                                required 
                                autofocus 
                                autocomplete="name">
                            <x-input-error class="mt-2" :messages="$errors->get('name')" />
                        </div>

                        <div class="flex flex-col">
                            <label for="email" class="text-gray-600 dark:text-gray-400 text-base font-medium">Email</label>
                            <input 
                                id="email" 
                                name="email" 
                                type="email" 
                                class="w-full px-5 py-3 rounded-lg border border-gray-200 shadow-sm focus:ring-2 focus:ring-indigo-500 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-100" 
                                value="{{ old('email', $user->email) }}" 
                                required 
                                autocomplete="username">
                            <x-input-error class="mt-2" :messages="$errors->get('email')" />

                            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                                <p class="mt-2 text-sm text-gray-800 dark:text-gray-200">
                                    {{ __('Your email address is unverified.') }}
                                    <button form="send-verification" class="underline text-sm text-indigo-600 dark:text-indigo-400 hover:text-indigo-800 dark:hover:text-indigo-200 ml-1">
                                        {{ __('Click here to re-send the verification email.') }}
                                    </button>
                                </p>

                                @if (session('status') === 'verification-link-sent')
                                    <p class="mt-2 text-sm text-green-600 dark:text-green-400">
                                        {{ __('A new verification link has been sent to your email address.') }}
                                    </p>
                                @endif
                            @endif
                        </div>
                    </div>

                    <button type="submit" class="w-full sm:w-auto px-6 py-3 bg-indigo-600 hover:bg-indigo-700 text-white font-semibold rounded-xl shadow transition-all duration-300">
                        {{ __('Save') }}
                    </button>
                </form>
            </div>

            <!-- Update Password -->
            <div class="bg-white dark:bg-gray-800 shadow rounded-2xl p-6 sm:p-8 space-y-6">
                <h3 class="text-2xl font-bold text-gray-900 dark:text-gray-100">
                    {{ __('Update Password') }}
                </h3>

                <form method="post" action="{{ route('password.update') }}" class="space-y-6">
                    @csrf
                    @method('put')

                    <div class="space-y-4">
                        <div class="flex flex-col">
                            <label for="update_password_current_password" class="text-gray-600 dark:text-gray-400 text-base font-medium">Current Password</label>
                            <input id="update_password_current_password" name="current_password" type="password" class="w-full px-5 py-3 rounded-lg border border-gray-200 shadow-sm focus:ring-2 focus:ring-indigo-500 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-100" autocomplete="current-password">
                            <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2" />
                        </div>

                        <div class="flex flex-col">
                            <label for="update_password_password" class="text-gray-600 dark:text-gray-400 text-base font-medium">New Password</label>
                            <input id="update_password_password" name="password" type="password" class="w-full px-5 py-3 rounded-lg border border-gray-200 shadow-sm focus:ring-2 focus:ring-indigo-500 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-100" autocomplete="new-password">
                            <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2" />
                        </div>

                        <div class="flex flex-col">
                            <label for="update_password_password_confirmation" class="text-gray-600 dark:text-gray-400 text-base font-medium">Confirm Password</label>
                            <input id="update_password_password_confirmation" name="password_confirmation" type="password" class="w-full px-5 py-3 rounded-lg border border-gray-200 shadow-sm focus:ring-2 focus:ring-indigo-500 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-100" autocomplete="new-password">
                            <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2" />
                        </div>
                    </div>

                    <button type="submit" class="w-full sm:w-auto px-6 py-3 bg-indigo-600 hover:bg-indigo-700 text-white font-semibold rounded-xl shadow transition-all duration-300">
                        {{ __('Save') }}
                    </button>
                </form>
            </div>

            
            <!-- Delete Account -->
            <div class="bg-white dark:bg-gray-800 shadow rounded-2xl p-6 sm:p-8 space-y-6">
                <h3 class="text-2xl font-bold text-gray-900 dark:text-gray-100">
                    {{ __('Delete Account') }}
                </h3>

                <x-danger-button
                    x-data=""
                    x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')"
                    class="w-full sm:w-auto px-6 py-3 bg-red-600 hover:bg-red-700 text-white font-semibold rounded-xl shadow transition-all duration-300"
                >
                    {{ __('Delete Account') }}
                </x-danger-button>

                <x-modal name="confirm-user-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable>
                    <form method="post" action="{{ route('profile.destroy') }}" class="space-y-4 p-6">
                        @csrf
                        @method('delete')

                        <h4 class="text-lg font-semibold text-gray-900 dark:text-gray-100">
                            {{ __('Are you sure you want to delete your account?') }}
                        </h4>

                        <p class="text-gray-600 dark:text-gray-400 text-sm">
                            {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Please enter your password to confirm.') }}
                        </p>

                        <input id="password" name="password" type="password" placeholder="{{ __('Password') }}" class="w-full px-5 py-3 rounded-lg border border-gray-200 shadow-sm focus:ring-2 focus:ring-red-500 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-100">
                        <x-input-error :messages="$errors->userDeletion->get('password')" class="mt-2" />

                        <div class="flex justify-end gap-3 mt-4">
                            <x-secondary-button x-on:click="$dispatch('close')">Cancel</x-secondary-button>
                            <x-danger-button class="bg-red-600 hover:bg-red-700">Delete Account</x-danger-button>
                        </div>
                    </form>
                </x-modal>
            </div>

        </div>
    </div>
</x-user-layout>
