{{-- <x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("You're logged in!") }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout> --}}


<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("You're logged in!") }}
                </div>
            </div>
        </div>

        <section class="py-12 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            
            <!-- Greeting Card -->
            <div class="bg-white shadow rounded-lg p-6 mb-8 flex flex-col md:flex-row md:justify-between md:items-center">
            <div>
                <h2 class="text-2xl font-bold text-gray-900">Good Morning, John!</h2>
                <p class="text-gray-600 mt-1">Here’s your mood overview for today.</p>
            </div>
            <div class="mt-4 md:mt-0 flex items-center gap-4">
                <span class="text-4xl">😊</span>
                <span class="text-gray-700 font-medium">Happy</span>
            </div>
            </div>

            <!-- Quick Mood Entry -->
            <div class="bg-white shadow rounded-lg p-6 mb-8">
            <h3 class="text-xl font-semibold text-gray-900 mb-4">Add Your Mood</h3>
            <div class="flex flex-wrap gap-4">
                <button class="px-5 py-2.5 bg-yellow-400 hover:bg-yellow-500 text-white font-semibold rounded-full shadow transition">😊 Happy</button>
                <button class="px-5 py-2.5 bg-blue-400 hover:bg-blue-500 text-white font-semibold rounded-full shadow transition">😢 Sad</button>
                <button class="px-5 py-2.5 bg-red-400 hover:bg-red-500 text-white font-semibold rounded-full shadow transition">😡 Angry</button>
                <button class="px-5 py-2.5 bg-green-400 hover:bg-green-500 text-white font-semibold rounded-full shadow transition">😌 Relaxed</button>
            </div>
            </div>

            <!-- Mood Summary Cards -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
            <div class="bg-white shadow rounded-lg p-4 text-center">
                <p class="text-gray-500">Total Entries</p>
                <h4 class="text-2xl font-bold text-gray-900 mt-2">42</h4>
            </div>
            <div class="bg-white shadow rounded-lg p-4 text-center">
                <p class="text-gray-500">Most Frequent Mood</p>
                <h4 class="text-2xl font-bold text-gray-900 mt-2">😊 Happy</h4>
            </div>
            <div class="bg-white shadow rounded-lg p-4 text-center">
                <p class="text-gray-500">Average Mood</p>
                <h4 class="text-2xl font-bold text-gray-900 mt-2">😌 Relaxed</h4>
            </div>
            <div class="bg-white shadow rounded-lg p-4 text-center">
                <p class="text-gray-500">Current Streak</p>
                <h4 class="text-2xl font-bold text-gray-900 mt-2">5 Days</h4>
            </div>
            </div>

            <!-- Recent Entries -->
            <div class="bg-white shadow rounded-lg p-6 mb-8">
            <h3 class="text-xl font-semibold text-gray-900 mb-4">Recent Entries</h3>
            <div class="divide-y divide-gray-200">
                <div class="py-4 flex justify-between items-center">
                <div class="flex items-center gap-4">
                    <span class="text-2xl">😊</span>
                    <p class="text-gray-700">Feeling happy after meeting friends</p>
                </div>
                <span class="text-gray-500 text-sm">Jan 29, 2026</span>
                </div>
                <div class="py-4 flex justify-between items-center">
                <div class="flex items-center gap-4">
                    <span class="text-2xl">😢</span>
                    <p class="text-gray-700">Feeling sad because of missed deadlines</p>
                </div>
                <span class="text-gray-500 text-sm">Jan 28, 2026</span>
                </div>
                <div class="py-4 flex justify-between items-center">
                <div class="flex items-center gap-4">
                    <span class="text-2xl">😌</span>
                    <p class="text-gray-700">Relaxed after meditation session</p>
                </div>
                <span class="text-gray-500 text-sm">Jan 27, 2026</span>
                </div>
            </div>
            </div>

            <!-- Quick Stats -->
            <div class="bg-white shadow rounded-lg p-6">
            <h3 class="text-xl font-semibold text-gray-900 mb-4">Mood Insights</h3>
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                <div class="bg-gray-100 rounded-lg p-4">
                <p class="text-gray-500 mb-2">Last 7 Days</p>
                <div class="h-24 bg-white rounded-lg shadow flex items-center justify-center text-gray-400">[Bar Chart Placeholder]</div>
                </div>
                <div class="bg-gray-100 rounded-lg p-4">
                <p class="text-gray-500 mb-2">Last Month</p>
                <div class="h-24 bg-white rounded-lg shadow flex items-center justify-center text-gray-400">[Pie Chart Placeholder]</div>
                </div>
            </div>
            </div>

        </div>
        </section>

    </div>
</x-admin-layout>
