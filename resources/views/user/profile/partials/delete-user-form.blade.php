<section class="py-12">
    <div class="w-full max-w-3xl mx-auto bg-white dark:bg-gray-800 shadow rounded-xl p-8 space-y-6">
        <!-- Header -->
        <header class="space-y-1">
            <h2 class="text-2xl font-bold text-gray-900 dark:text-gray-100">Delete Account</h2>
            <p class="text-sm text-gray-500 dark:text-gray-400">
                Once your account is deleted, all of its resources and data will be permanently deleted. 
                Before deleting your account, please download any data or information that you wish to retain.
            </p>
        </header>

        <!-- Delete Button -->
        <x-danger-button
            x-data=""
            x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')"
            class="px-6 py-3 rounded-lg shadow-lg w-full sm:w-auto"
        >
            Delete Account
        </x-danger-button>

        <!-- Confirmation Modal -->
        <x-modal name="confirm-user-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable>
            <form method="post" action="{{ route('profile.destroy') }}" class="p-6 space-y-4">
                @csrf
                @method('delete')

                <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                    Are you sure you want to delete your account?
                </h2>

                <p class="text-sm text-gray-600 dark:text-gray-400">
                    Once your account is deleted, all of its resources and data will be permanently deleted. 
                    Please enter your password to confirm you would like to permanently delete your account.
                </p>

                <!-- Password -->
                <div class="flex flex-col gap-1.5">
                    <x-input-label for="password" value="Password" class="sr-only" />
                    <x-text-input
                        id="password"
                        name="password"
                        type="password"
                        class="w-full px-5 py-3 rounded-lg shadow border border-gray-200 dark:border-gray-700"
                        placeholder="Password"
                    />
                    <x-input-error :messages="$errors->userDeletion->get('password')" class="mt-1" />
                </div>

                <!-- Actions -->
                <div class="flex justify-end gap-3 mt-4">
                    <x-secondary-button x-on:click="$dispatch('close')" class="px-6 py-3 rounded-lg shadow">
                        Cancel
                    </x-secondary-button>

                    <x-danger-button class="px-6 py-3 rounded-lg shadow">
                        Delete Account
                    </x-danger-button>
                </div>
            </form>
        </x-modal>
    </div>
</section>

