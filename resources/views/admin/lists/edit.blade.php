<x-admin-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 w-full max-w-md mx-auto rounded-lg shadow-lg p-6">
                <h2 class="text-xl font-semibold mb-4 text-gray-800 dark:text-gray-100">
                    Edit Detail
                </h2>

                <form method="POST" action="{{ route('admin.lists.update', $list->id) }}">
                    @csrf
                    @method('PATCH')

                    <input type="hidden" name="role" value="{{ $list->role }}">
                    
                    <div>
                        <label class="block text-sm font-medium dark:text-gray-200">Name</label>
                        <input type="text" name="name" value="{{ $list->name }}" 
                            class="w-full border rounded p-2 bg-gray-100 dark:bg-gray-700 cursor-not-allowed" readonly>
                    </div>

                    <div>
                        <label class="block text-sm font-medium dark:text-gray-200">Email</label>
                        <input type="email" name="email" value="{{ $list->email }}" 
                            class="w-full border rounded p-2 bg-gray-100 dark:bg-gray-700 cursor-not-allowed" readonly>
                    </div>

                    <div>
                        <label class="block text-sm font-medium dark:text-gray-200">Role</label>
                        <select name="role" class="w-full border rounded p-2 dark:bg-gray-700" disabled>
                            <option value="0" {{ $list->role === 0 ? 'selected' : '' }}>User</option>
                            <option value="1" {{ $list->role === 1 ? 'selected' : '' }}>Admin</option>
                            <option value="2" {{ $list->role === 2 ? 'selected' : '' }}>Blog Manager</option>
                        </select>
                    </div>

                    <div>
                        <label class="block text-sm font-medium dark:text-gray-200">Status</label>
                        <select name="status" class="w-full border rounded p-2 dark:bg-gray-700">
                            <option value="1" {{ $list->status === 1 ? 'selected' : '' }}>Active</option>
                            <option value="0" {{ $list->status === 0 ? 'selected' : '' }}>Deactive</option>
                        </select>
                    </div>

                    <div class="flex justify-end gap-2 pt-4">
                        <a href="{{ route('admin.lists.index') }}" 
                           class="px-4 py-2 bg-gray-300 dark:bg-gray-600 rounded text-black dark:text-white text-center">
                            Cancel
                        </a>

                        <button type="submit"
                            class="px-4 py-2 bg-indigo-600 text-white rounded hover:bg-indigo-700">
                            Save Changes
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-admin-layout>