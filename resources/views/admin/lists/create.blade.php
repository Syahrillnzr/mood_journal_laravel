<x-admin-layout>
<div class="max-w-xl mx-auto py-10">

    <h1 class="text-xl font-bold mb-6">Add Mood</h1>

        <form method="POST" action="{{ route('admin.moods.store') }}" class="space-y-6">
            @csrf

            <!-- Mood Name -->
            <div>
                <label class="block text-sm font-medium mb-1">Mood Name</label>
                <input id="name" name="name" placeholder="Happy"
                    class="w-full border p-2 rounded"
                    required>
            </div>

            <!-- Icon -->
            <div>
                <label class="block text-sm font-medium mb-1">Emoji</label>
                <input id="icon" name="icon" placeholder="😊"
                    class="w-full border p-2 rounded"
                    required>
            </div>

            <!-- Color -->
            <div>
                <label class="block text-sm font-medium mb-1">Tailwind Color</label>
                <input id="color" name="color" placeholder="bg-yellow-400"
                    class="w-full border p-2 rounded"
                    required>
            </div>

            <!-- 🔴 LIVE PREVIEW -->
            <div class="border rounded-lg p-4 bg-gray-50">
                <p class="text-sm text-gray-500 mb-2">Preview</p>

                <div id="preview"
                    class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-gray-200 transition">
                    <span id="preview-icon">😊</span>
                    <span id="preview-name">Mood</span>
                </div>
            </div>

            <!-- Submit -->
            <button class="px-4 py-2 bg-indigo-600 text-white rounded">
                Save
            </button>
        </form>

        <!-- Preview Script -->
        <script>
            const nameInput = document.getElementById('name');
            const iconInput = document.getElementById('icon');
            const colorInput = document.getElementById('color');

            const preview = document.getElementById('preview');
            const previewName = document.getElementById('preview-name');
            const previewIcon = document.getElementById('preview-icon');

            function updatePreview() {
                previewName.textContent = nameInput.value || 'Mood';
                previewIcon.textContent = iconInput.value || '😊';

                preview.className =
                    `inline-flex items-center gap-2 px-4 py-2 rounded-full transition ${colorInput.value || 'bg-gray-200'}`;
            }

            nameInput.addEventListener('input', updatePreview);
            iconInput.addEventListener('input', updatePreview);
            colorInput.addEventListener('input', updatePreview);
        </script>


</div>
</x-admin-layout>
