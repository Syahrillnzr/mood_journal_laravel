<x-user-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('List') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <section class="py-24">
            <div class="w-full max-w-7xl px-4 md:px-5 lg:px-5 mx-auto">
                <!-- Section Header -->
                <div class="w-full flex-col justify-center items-center gap-4 flex mb-10">
                    <h2 class="text-4xl font-bold text-gray-900 text-center">Your Mood History</h2>
                    <p class="text-center text-gray-500 text-base max-w-2xl">
                        Track all your past moods. Use the filter to view specific moods.
                    </p>
                </div>

                <!-- Mood Filter -->
                <div class="w-full flex flex-wrap gap-3 mb-8">
                    <a href="{{ route('entries-list.index') }}" 
                        class="px-4 py-2 bg-gray-400 hover:opacity-80 text-white rounded-full font-semibold">
                        All
                    </a>
                    @foreach($moods as $mood)
                        <a href="{{ route('entries-list.index', ['mood' => $mood->id]) }}"
                            style="background-color: {{ $mood->color }}"
                            class="px-4 py-2 hover:opacity-80 text-white rounded-full font-semibold">
                            {{ $mood->icon }} {{ $mood->name }}
                        </a>
                    @endforeach
                </div>

                <!-- Scrollable Timeline -->
                <div class="w-full max-h-[500px] overflow-y-auto space-y-6">

                    @forelse($entries as $entry)
                    <div class="bg-white dark:bg-gray-800 shadow-sm rounded-xl p-5 flex flex-col gap-2">
                        <div class="flex items-center gap-3">
                            <span class="text-2xl">{{ $entry->mood->icon }}</span>
                            <h4 class="font-semibold text-gray-900 dark:text-gray-100">{{ $entry->mood->name }}</h4>
                            <p class="text-gray-500 text-sm ml-auto">{{ $entry->created_at->format('F d, Y') }}</p>
                        </div>
                        @if($entry->description)
                            <p class="text-gray-700 dark:text-gray-200">{{ $entry->description }}</p>
                        @endif
                        @if($entry->highlight_1 || $entry->highlight_2)
                            <div class="flex flex-wrap gap-2 mt-1">
                                @if($entry->highlight_1)
                                    <span class="px-3 py-1 bg-gray-100 text-gray-600 rounded-full text-sm">{{ $entry->highlight_1 }}</span>
                                @endif
                                @if($entry->highlight_2)
                                    <span class="px-3 py-1 bg-gray-100 text-gray-600 rounded-full text-sm">{{ $entry->highlight_2 }}</span>
                                @endif
                            </div>
                        @endif

                            {{-- Delete button outside mood column --}}
                            <div class="flex justify-end mt-2">
                                <form method="POST" action="{{ route('entries-list.destroy', $entry) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" onclick="return confirm('Delete this entry?')"
                                        class="flex items-center gap-1 px-3 py-1 text-red-500 hover:bg-red-50 rounded-lg transition text-sm">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6M9 7h6m2 0H7m2 0V5a1 1 0 011-1h4a1 1 0 011 1v2" />
                                        </svg>
                                        Delete
                                    </button>
                                </form>
                            </div>
                    </div>
                    @empty
                        <div class="text-center text-gray-400 py-12">
                            <p class="text-lg">No mood entries yet.</p>
                            <a href="{{ route('mood-entries.create') }}" class="text-indigo-600 hover:underline text-sm mt-2 inline-block">Add your first mood →</a>
                        </div>
                    @endforelse

                </div>
            </div>
        </section>
    </div>

</x-user-layout>
