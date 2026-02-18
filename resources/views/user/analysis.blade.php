<x-user-layout>
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
                    <div class="bg-white shadow rounded-lg p-5 flex flex-col items-center">
                        <div class="text-indigo-600 text-2xl mb-2">📊</div>
                        <div class="text-gray-900 font-semibold text-lg">Total Entries</div>
                        <div class="text-gray-500 text-xl mt-1">{{ $totalEntries }}</div>
                    </div>
                    <div class="bg-white shadow rounded-lg p-5 flex flex-col items-center">
                        @if($mostFrequent)
                            <div class="text-2xl mb-2">{{ $mostFrequent->mood->icon }}</div>
                            <div class="text-gray-900 font-semibold text-lg">Most Frequent</div>
                            <div class="text-gray-500 text-xl mt-1">{{ $mostFrequent->mood->name }}</div>
                        @else
                            <div class="text-2xl mb-2">—</div>
                            <div class="text-gray-900 font-semibold text-lg">Most Frequent</div>
                            <div class="text-gray-500 text-xl mt-1">No data</div>
                        @endif
                    </div>
                    <div class="bg-white shadow rounded-lg p-5 flex flex-col items-center">
                        <div class="text-pink-500 text-2xl mb-2">🔥</div>
                        <div class="text-gray-900 font-semibold text-lg">Current Streak</div>
                        <div class="text-gray-500 text-xl mt-1">{{ $streak }} {{ Str::plural('Day', $streak) }}</div>
                    </div>
                    <div class="bg-white shadow rounded-lg p-5 flex flex-col items-center">
                        <div class="text-yellow-500 text-2xl mb-2">🏆</div>
                        <div class="text-gray-900 font-semibold text-lg">Longest Streak</div>
                        <div class="text-gray-500 text-xl mt-1">{{ $longestStreak }} {{ Str::plural('Day', $longestStreak) }}</div>
                    </div>
                </div>

                <!-- This Month vs Last Month -->
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 mb-10">
                    <div class="bg-white shadow rounded-lg p-6">
                        <h4 class="text-gray-900 font-semibold text-lg mb-3">This Month</h4>
                        <p class="text-3xl font-bold text-indigo-600">{{ $thisMonth }} entries</p>
                        <p class="text-gray-500 mt-1">
                            Most frequent: 
                            @if($thisMonthFrequent)
                                {{ $thisMonthFrequent->mood->icon }} {{ $thisMonthFrequent->mood->name }}
                            @else
                                —
                            @endif
                        </p>
                    </div>
                    <div class="bg-white shadow rounded-lg p-6">
                        <h4 class="text-gray-900 font-semibold text-lg mb-3">Last Month</h4>
                        <p class="text-3xl font-bold text-gray-400">{{ $lastMonth }} entries</p>
                        <p class="text-gray-500 mt-1">
                            Most frequent:
                            @if($lastMonthFrequent)
                                {{ $lastMonthFrequent->mood->icon }} {{ $lastMonthFrequent->mood->name }}
                            @else
                                —
                            @endif
                        </p>
                    </div>
                </div>

                <!-- Charts -->
                <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-10">
                    <div class="bg-white shadow rounded-lg p-5 col-span-2">
                        <h4 class="text-gray-900 font-semibold text-lg mb-4">Mood Over Last 30 Days</h4>
                        <canvas id="moodOverTimeChart"></canvas>
                    </div>
                    <div class="bg-white shadow rounded-lg p-5">
                        <h4 class="text-gray-900 font-semibold text-lg mb-4">Mood Distribution</h4>
                        <canvas id="moodDistributionChart"></canvas>
                    </div>
                </div>

                <!-- Day of Week Pattern -->
                <div class="bg-white shadow rounded-lg p-5 mb-10">
                    <h4 class="text-gray-900 font-semibold text-lg mb-4">Day of Week Pattern</h4>
                    <canvas id="dayOfWeekChart"></canvas>
                </div>

                <!-- Mood Calendar -->
                <div class="bg-white shadow rounded-lg p-6 mb-10">
                    <h4 class="text-gray-900 font-semibold text-lg mb-4">
                        Mood Calendar — {{ Carbon\Carbon::now()->format('F Y') }}
                    </h4>
                    <div class="grid grid-cols-7 gap-2 text-center text-sm font-medium text-gray-500 mb-2">
                        @foreach(['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'] as $day)
                            <div>{{ $day }}</div>
                        @endforeach
                    </div>
                    <div class="grid grid-cols-7 gap-2">
                        @php
                            $startDay = Carbon\Carbon::now()->startOfMonth()->dayOfWeek;
                            $daysInMonth = Carbon\Carbon::now()->daysInMonth;
                        @endphp

                        {{-- Empty cells before first day --}}
                        @for($i = 0; $i < $startDay; $i++)
                            <div></div>
                        @endfor

                        {{-- Days --}}
                        @for($day = 1; $day <= $daysInMonth; $day++)
                            <div class="rounded-lg p-2 text-center text-sm
                                {{ isset($calendarEntries[$day]) ? 'text-white' : 'bg-gray-100 text-gray-400' }}"
                                @if(isset($calendarEntries[$day]))
                                    style="background-color: {{ $calendarEntries[$day]->color }}"
                                @endif
                                title="{{ isset($calendarEntries[$day]) ? $calendarEntries[$day]->icon . ' ' . $calendarEntries[$day]->name : 'No entry' }}">
                                {{ $day }}
                                @if(isset($calendarEntries[$day]))
                                    <div class="text-xs">{{ $calendarEntries[$day]->icon }}</div>
                                @endif
                            </div>
                        @endfor
                    </div>
                </div>

                <!-- Mood Breakdown Table -->
                <div class="bg-white shadow rounded-lg p-6 mb-10">
                    <h4 class="text-gray-900 font-semibold text-lg mb-4">Mood Breakdown</h4>
                    <table class="w-full text-sm">
                        <thead>
                            <tr class="text-left text-gray-500 border-b">
                                <th class="pb-3">Mood</th>
                                <th class="pb-3">Count</th>
                                <th class="pb-3">Percentage</th>
                                <th class="pb-3">Bar</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($moodDistribution as $mood)
                            <tr class="border-b last:border-0">
                                <td class="py-3 flex items-center gap-2">
                                    <span>{{ $mood['icon'] }}</span>
                                    <span class="font-medium text-gray-800">{{ $mood['name'] }}</span>
                                </td>
                                <td class="py-3 text-gray-600">{{ $mood['count'] }}</td>
                                <td class="py-3 text-gray-600">{{ $mood['percentage'] }}%</td>
                                <td class="py-3 w-40">
                                    <div class="w-full bg-gray-100 rounded-full h-2">
                                        <div class="h-2 rounded-full" 
                                            style="width: {{ $mood['percentage'] }}%; background-color: {{ $mood['color'] }}">
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

            </div>
        </section>
    </div>

    @push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const distribution = @json($moodDistribution);
        const overTime = @json($moodOverTime);
        const dayOfWeek = @json($dayOfWeek);

        // Donut chart
        new Chart(document.getElementById('moodDistributionChart'), {
            type: 'doughnut',
            data: {
                labels: distribution.map(d => d.icon + ' ' + d.name),
                datasets: [{
                    data: distribution.map(d => d.count),
                    backgroundColor: distribution.map(d => d.color),
                }]
            },
            options: { plugins: { legend: { position: 'bottom' } } }
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
            options: { scales: { y: { beginAtZero: true, ticks: { stepSize: 1 } } } }
        });

        // Day of week bar chart
        new Chart(document.getElementById('dayOfWeekChart'), {
            type: 'bar',
            data: {
                labels: dayOfWeek.map(d => d.day),
                datasets: [{
                    label: 'Entries',
                    data: dayOfWeek.map(d => d.count),
                    backgroundColor: 'rgba(99, 102, 241, 0.7)',
                    borderRadius: 6,
                }]
            },
            options: { scales: { y: { beginAtZero: true, ticks: { stepSize: 1 } } } }
        });
    </script>
    @endpush

</x-user-layout>
