<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Analysis') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <section class="py-12">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <!-- Section Header -->
                <div class="mb-8 text-center">
                    <h2 class="text-3xl font-bold text-gray-900">Mood Analysis</h2>
                    <p class="text-gray-500 mt-2">Visualize your mood trends over time</p>
                </div>

                <!-- Summary Cards -->
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-10">
                    <!-- Total Entries -->
                    <div class="bg-white shadow rounded-lg p-5 flex flex-col items-center">
                        <div class="text-indigo-600 text-2xl mb-2">📊</div>
                        <div class="text-gray-900 font-semibold text-lg">Total Entries</div>
                        <div class="text-gray-500 text-xl mt-1">120</div>
                    </div>

                    <!-- Most Frequent Mood -->
                    <div class="bg-white shadow rounded-lg p-5 flex flex-col items-center">
                        <div class="text-yellow-400 text-2xl mb-2">😊</div>
                        <div class="text-gray-900 font-semibold text-lg">Most Frequent</div>
                        <div class="text-gray-500 text-xl mt-1">Happy</div>
                    </div>

                    <!-- Average Mood -->
                    <div class="bg-white shadow rounded-lg p-5 flex flex-col items-center">
                        <div class="text-green-400 text-2xl mb-2">😌</div>
                        <div class="text-gray-900 font-semibold text-lg">Average Mood</div>
                        <div class="text-gray-500 text-xl mt-1">Relaxed</div>
                    </div>

                    <!-- Longest Streak -->
                    <div class="bg-white shadow rounded-lg p-5 flex flex-col items-center">
                        <div class="text-pink-500 text-2xl mb-2">🔥</div>
                        <div class="text-gray-900 font-semibold text-lg">Longest Streak</div>
                        <div class="text-gray-500 text-xl mt-1">7 Days</div>
                    </div>
                </div>

                <!-- Charts -->
                <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-10">
                    <!-- Line / Area Chart -->
                    <div class="bg-white shadow rounded-lg p-5 col-span-2 h-80 flex items-center justify-center">
                        <p class="text-gray-400">[Line / Area Chart Placeholder]</p>
                    </div>

                    <!-- Pie / Donut Chart -->
                    <div class="bg-white shadow rounded-lg p-5 h-80 flex items-center justify-center">
                        <p class="text-gray-400">[Pie / Donut Chart Placeholder]</p>
                    </div>
                </div>

                <!-- Insights / Notes -->
                <div class="bg-white shadow rounded-lg p-6">
                    <h4 class="text-gray-900 font-semibold text-xl mb-4">Key Insights</h4>
                    <ul class="list-disc list-inside text-gray-600 space-y-2">
                        <li>You were happiest in March.</li>
                        <li>Sad days mostly on Mondays.</li>
                        <li>Relaxed mood increased during weekends.</li>
                        <li>Happy streak lasted 7 consecutive days in April.</li>
                    </ul>
                </div>
            </div>
        </section>
    </div>
</x-admin-layout>
