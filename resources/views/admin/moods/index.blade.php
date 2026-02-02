<x-admin-layout>

    <div class="max-w-7xl mx-auto py-10">

        <div class="flex justify-between mb-6">
            <h1 class="text-2xl font-bold">Mood Management</h1>
            <a href="{{ route('admin.moods.create') }}"
            class="px-4 py-2 bg-indigo-600 text-white rounded">
                Add Mood
            </a>
        </div>

        <table class="w-full bg-white rounded shadow">
            <thead class="bg-gray-100">
                <tr>
                    <th class="p-3 text-left">Name</th>
                    <th class="p-3">Icon</th>
                    <th class="p-3">Color</th>
                    <th class="p-3">Status</th>
                    <th class="p-3">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($moods as $mood)
                <tr class="border-t">
                    <td class="p-3">{{ $mood->name }}</td>
                    <td class="p-3 text-center">{{ $mood->icon }}</td>
                    <td class="p-3 text-center">{{ $mood->color }}</td>
                    <td class="p-3 text-center">
                        {{ $mood->is_active ? 'Active' : 'Disabled' }}
                    </td>
                    <td class="p-3 flex gap-2 justify-center">
                        <a href="{{ route('admin.moods.edit', $mood) }}"
                        class="px-3 py-1 bg-blue-500 text-white rounded">
                            Edit
                        </a>

                        <form method="POST"
                            action="{{ route('admin.moods.destroy', $mood) }}">
                            @csrf
                            @method('DELETE')
                            <button class="px-3 py-1 bg-red-500 text-white rounded">
                                Delete
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

    </div>
</x-admin-layout>
