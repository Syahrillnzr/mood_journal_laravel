<x-admin-layout>
    <div class="max-w-xl mx-auto py-10">

        <h1 class="text-xl font-bold mb-6">Edit Mood</h1>

        <form method="POST" action="{{ route('admin.lists.update', $list->id) }}" class="space-y-4">
            @csrf
            @method('PUT')

            <!-- Mood Name -->
            <div>
                <label class="block text-sm font-medium text-gray-700">Mood Name</label>
                <input
                    name="name"
                    value="{{ old('name', $list->name) }}"
                    class="w-full border p-2 rounded"
                    required
                >
                @error('name')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Icon -->
            <div>
                <label class="block text-sm font-medium text-gray-700">Icon (Emoji)</label>
                <input
                    name="icon"
                    value="{{ old('icon', $list->icon) }}"
                    class="w-full border p-2 rounded"
                    placeholder="😊"
                    required
                >
                @error('icon')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- <!-- Color -->
            <div>
                <label class="block text-sm font-medium text-gray-700">Tailwind Color</label>
                <input
                    name="color"
                    value="{{ old('color', $list->color) }}"
                    class="w-full border p-2 rounded"
                    placeholder="bg-yellow-400"
                    required
                >
                @error('color')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div> --}}

            {{-- <!-- Active Status -->
            <div>
                <label class="block text-sm font-medium text-gray-700">Active Status</label>
                <select name="is_active" class="w-full border p-2 rounded">
                    <option value="1" {{ old('is_active', $mood->is_active) == 1 ? 'selected' : '' }}>Active</option>
                    <option value="0" {{ old('is_active', $mood->is_active) == 0 ? 'selected' : '' }}>Inactive</option>
                </select>

                @error('is_active')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div> --}}


            <!-- Actions -->
            <div class="flex gap-3">
                <button class="px-4 py-2 bg-indigo-600 text-white rounded">
                    Update
                </button>

                <a href="{{ route('admin.moods.index') }}"
                class="px-4 py-2 bg-gray-200 rounded">
                    Cancel
                </a>
            </div>
        </form>


    </div>
</x-admin-layout>