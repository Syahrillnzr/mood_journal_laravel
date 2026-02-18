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


<x-user-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <section class="py-12 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">            
            <!-- Greeting Card -->
            <div class="bg-white shadow rounded-lg p-6 mb-8 flex flex-col md:flex-row md:justify-between md:items-center">
            <div>
                <h2 class="text-2xl font-bold text-gray-900 dark:text-gray-100">
                    @php
                        $hour = now()->hour;
                        if ($hour < 12) $greeting = 'Good Morning';
                        elseif ($hour < 18) $greeting = 'Good Afternoon';
                        elseif ($hour < 21) $greeting = 'Good Evening';
                        else $greeting = 'Good Night';
                    @endphp
                    {{ $greeting }}, {{ Auth::user()->name }}!
                </h2>
                <p class="text-gray-600 dark:text-gray-400 mt-1">Here’s an overview of your platform.</p>
            </div>
            <div class="mt-4 md:mt-0 flex items-center gap-4">
                <span class="text-4xl">😊</span>
                <span class="text-gray-700 font-medium">Happy</span>
            </div>
            </div>

            <!-- Mood Summary Cards -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 mb-8">
                <div class="bg-white shadow rounded-lg p-4 text-center">
                    <p class="text-gray-500">Total Entries</p>
                    <h4 class="text-2xl font-bold text-gray-900 mt-2">{{ $totalEntries }}</h4>
                </div>

                <div class="bg-white shadow rounded-lg p-4 text-center">
                    <p class="text-gray-500">Most Frequent Mood</p>
                    <h4 class="text-2xl font-bold text-gray-900 mt-2">
                        @if($mostFrequent)
                            {{ $mostFrequent->mood->icon }} {{ $mostFrequent->mood->name }}
                        @else
                            —
                        @endif
                    </h4>
                </div>

                <div class="bg-white shadow rounded-lg p-4 text-center">
                    <p class="text-gray-500">Current Streak</p>
                    <h4 class="text-2xl font-bold text-gray-900 mt-2">{{ $streak }} {{ Str::plural('Day', $streak) }}</h4>
                </div>
            </div>

            <!-- Recent Entries -->
            <div class="bg-white shadow rounded-lg p-6 mb-8">
                <h3 class="text-xl font-semibold text-gray-900 mb-4">Recent Entries</h3>
                <div class="divide-y divide-gray-200">
                    @forelse($recentEntries as $entry)
                    <div class="py-4 flex justify-between items-center">
                        <div class="flex items-center gap-4">
                            <span class="text-2xl">{{ $entry->mood->icon }}</span>
                            <p class="text-gray-700">{{ $entry->description ?? 'No description' }}</p>
                        </div>
                        <span class="text-gray-500 text-sm">{{ $entry->created_at->format('M d, Y') }}</span>
                    </div>
                    @empty
                    <div class="py-4 text-center text-gray-400">
                        No entries yet. <a href="{{ route('mood-entries.create') }}" class="text-indigo-600 hover:underline">Add your first mood →</a>
                    </div>
                    @endforelse
                </div>
            </div>

            <!-- Quick Stats -->
            <div class="bg-white shadow rounded-lg p-6">
                <h3 class="text-xl font-semibold text-gray-900 mb-4">Mood Insights</h3>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                    <!-- Mood Distribution -->
                    <div class="bg-white shadow rounded-lg p-6">
                        <h3 class="text-xl font-semibold text-gray-900 mb-4">Mood Distribution</h3>
                        <canvas id="moodDistributionChart"></canvas>
                    </div>
                    <!-- Mood Over Time -->
                    <div class="bg-white shadow rounded-lg p-6">
                        <h3 class="text-xl font-semibold text-gray-900 mb-4">Last 7 Days</h3>
                        <canvas id="moodOverTimeChart"></canvas>
                    </div>
                </div>
            </div>

        </div>
        </section>

    </div>


        @push('scripts')
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script>
            const distribution = @json($moodDistribution);
            const overTime = @json($moodOverTime);

            // Doughnut chart
            new Chart(document.getElementById('moodDistributionChart'), {
                type: 'doughnut',
                data: {
                    labels: distribution.map(d => d.icon + ' ' + d.name),
                    datasets: [{
                        data: distribution.map(d => d.count),
                        backgroundColor: distribution.map(d => d.color),
                    }]
                },
                options: {
                    plugins: {
                        legend: { position: 'bottom' }
                    }
                }
            });

            // Line chart
            new Chart(document.getElementById('moodOverTimeChart'), {
                type: 'line',
                data: {
                    labels: overTime.map(d => d.date),
                    datasets: [{
                        label: 'Entries',
                        data: overTime.map(d => d.count),
                        tension: 0.3,
                        fill: true,
                        borderColor: '#6366f1',
                        backgroundColor: 'rgba(99, 102, 241, 0.1)',
                    }]
                },
                options: {
                    scales: {
                        y: { beginAtZero: true, ticks: { stepSize: 1 } }
                    }
                }
            });
        </script>
        @endpush

</x-user-layout>
