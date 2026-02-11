<x-admin-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 w-full max-w-md mx-auto rounded-lg shadow-lg p-6">
                <h2 class="text-xl font-semibold mb-4 text-gray-800 dark:text-gray-100">
                    Add New
                </h2>

                <form method="POST" action="{{ route('admin.lists.store') }}">
                    @csrf
                    <div>
                        <label class="block text-sm font-medium dark:text-gray-200">Name</label>
                        <input type="text" name="name" value="{{ old('name') }}" required
                            class="w-full border rounded p-2 dark:bg-gray-700 dark:text-white">
                    </div>

                    <div>
                        <label class="block text-sm font-medium dark:text-gray-200">Email</label>
                        <input type="email" name="email" value="{{ old('email') }}" required
                            class="w-full border rounded p-2 dark:bg-gray-700 dark:text-white">
                    </div>

                    <div class="mt-4">
                        <label class="block text-sm font-medium dark:text-gray-200">Password</label>
                        <input type="password" name="password" required
                            class="w-full border rounded p-2 dark:bg-gray-700 dark:text-white">
                    </div>

                    <div class="mt-4">
                        <label class="block text-sm font-medium dark:text-gray-200">Confirm Password</label>
                        <input type="password" name="password_confirmation" required
                            class="w-full border rounded p-2 dark:bg-gray-700 dark:text-white">
                    </div>

                    <div class="mt-4">
                        <label class="block text-sm font-medium dark:text-gray-200">Role</label>
                        <select name="role" class="w-full border rounded p-2 dark:bg-gray-700 dark:text-white">
                            <option value="0">User</option>
                            <option value="1">Admin</option>
                            <option value="2">Blog Manager</option>
                        </select>
                    </div>

                    <div class="mt-4">
                        <label class="block text-sm font-medium dark:text-gray-200">Status</label>
                        <select name="status" class="w-full border rounded p-2 dark:bg-gray-700 dark:text-white">
                            <option value="1">Active</option>
                            <option value="0">Deactive</option>
                        </select>
                    </div>

                    <div class="flex justify-end gap-2 pt-4">
                        <a href="{{ route('admin.lists.index') }}" 
                        class="px-4 py-2 bg-gray-300 dark:bg-gray-600 rounded text-black dark:text-white text-center">
                            Cancel
                        </a>

                        <button type="submit"
                            class="px-4 py-2 bg-indigo-600 text-white rounded hover:bg-indigo-700">
                            Create User
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-admin-layout>
