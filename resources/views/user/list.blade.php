<x-admin-layout>
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
                    <h2 class="text-4xl font-bold text-gray-900 font-manrope text-center">Your Mood History</h2>
                    <p class="text-center text-gray-500 text-base max-w-2xl">
                        Track all your past moods. Use the filter to view specific moods.
                    </p>
                </div>

                <!-- Mood Filter -->
                <div class="w-full flex flex-wrap gap-3 mb-8">
                    <button class="px-4 py-2 bg-yellow-400 hover:bg-yellow-500 text-white rounded-full font-semibold">😊 Happy</button>
                    <button class="px-4 py-2 bg-blue-400 hover:bg-blue-500 text-white rounded-full font-semibold">😢 Sad</button>
                    <button class="px-4 py-2 bg-red-400 hover:bg-red-500 text-white rounded-full font-semibold">😡 Angry</button>
                    <button class="px-4 py-2 bg-green-400 hover:bg-green-500 text-white rounded-full font-semibold">😌 Relaxed</button>
                </div>

                <!-- Scrollable Timeline -->
                <div class="w-full max-h-[500px] overflow-y-auto space-y-6">
                    
                    <!-- Mood Entry -->
                    <div class="bg-white dark:bg-gray-800 shadow-sm rounded-xl p-5 flex flex-col gap-2">
                        <div class="flex items-center gap-3">
                            <span class="text-2xl">😊</span>
                            <h4 class="font-semibold text-gray-900 dark:text-gray-100">Happy</h4>
                            <p class="text-gray-500 text-sm ml-auto">March 15, 2026</p>
                        </div>
                        <p class="text-gray-700 dark:text-gray-200">Had a productive day and finished all my tasks on time!</p>
                    </div>

                    <div class="bg-white dark:bg-gray-800 shadow-sm rounded-xl p-5 flex flex-col gap-2">
                        <div class="flex items-center gap-3">
                            <span class="text-2xl">😢</span>
                            <h4 class="font-semibold text-gray-900 dark:text-gray-100">Sad</h4>
                            <p class="text-gray-500 text-sm ml-auto">March 14, 2026</p>
                        </div>
                        <p class="text-gray-700 dark:text-gray-200">Feeling a bit down because of unexpected changes at work.</p>
                    </div>

                    <div class="bg-white dark:bg-gray-800 shadow-sm rounded-xl p-5 flex flex-col gap-2">
                        <div class="flex items-center gap-3">
                            <span class="text-2xl">😌</span>
                            <h4 class="font-semibold text-gray-900 dark:text-gray-100">Relaxed</h4>
                            <p class="text-gray-500 text-sm ml-auto">March 13, 2026</p>
                        </div>
                        <p class="text-gray-700 dark:text-gray-200">Went for a long walk in the park, feeling calm and refreshed.</p>
                    </div>

                </div>
            </div>
        </section>
    </div>
</x-admin-layout>
