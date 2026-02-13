<x-admin-layout>
    {{-- <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot> --}}

<div class="py-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        <!-- Greeting / Overview -->
        <div class="bg-white dark:bg-gray-800 shadow rounded-lg p-6 mb-8 flex flex-col md:flex-row md:justify-between md:items-center">
            <div>
                <h2 class="text-2xl font-bold text-gray-900 dark:text-gray-100">Good Morning, {{ Auth::user()->name }}!</h2>
                <p class="text-gray-600 dark:text-gray-400 mt-1">Here’s an overview of your platform.</p>
            </div>
            <div class="mt-4 md:mt-0 flex items-center gap-4">
                <span class="text-4xl">👑</span>
                <span class="text-gray-700 font-medium">Admin</span>
            </div>
        </div>

        <!-- Quick Stats -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
            <div class="bg-white shadow rounded-lg p-4 text-center">
                <p class="text-gray-500">Total Users</p>
                <h4 class="text-2xl font-bold text-gray-900 mt-2">{{ $totalUsers ?? 0 }}</h4>
            </div>
            <div class="bg-white shadow rounded-lg p-4 text-center">
                <p class="text-gray-500">Active Users</p>
                <h4 class="text-2xl font-bold text-gray-900 mt-2">{{ $activeUsers ?? 0 }}</h4>
            </div>
            <div class="bg-white shadow rounded-lg p-4 text-center">
                <p class="text-gray-500">New Signups (This Month)</p>
                <h4 class="text-2xl font-bold text-gray-900 mt-2">{{ $newSignups ?? 0 }}</h4>
            </div>
            <div class="bg-white shadow rounded-lg p-4 text-center">
                <p class="text-gray-500">Pending Verifications</p>
                <h4 class="text-2xl font-bold text-gray-900 mt-2">{{ $pendingVerifications ?? 0 }}</h4>
            </div>
        </div>

        <!-- Recent Users -->
        <div class="bg-white shadow rounded-lg p-6 mb-8">
            <h3 class="text-xl font-semibold text-gray-900 mb-4">Recent Users</h3>
            <div class="divide-y divide-gray-200">
                @forelse($recentUsers as $user)
                    <div class="py-4 flex justify-between items-center">
                        <div class="flex items-center gap-4">
                            {{-- <img src="{{ $user->profile_photo_url ?? 'https://via.placeholder.com/40' }}" class="w-10 h-10 rounded-full"> --}}
                            <p class="text-gray-700">{{ $user->name }} ({{ $user->email }})</p>
                        </div>
                        <span class="text-gray-500 text-sm">{{ $user->created_at->format('d-M-Y') }}</span>
                    </div>
                @empty
                    <p class="text-gray-500">No recent users found.</p>
                @endforelse
            </div>
        </div>

        <!-- Recent Mood Update -->
        <div class="bg-white shadow rounded-lg p-6 mb-8">
            <h3 class="text-xl font-semibold text-gray-900 mb-4">Recent Mood Added</h3>
            <div class="divide-y divide-gray-200">
                @forelse($recentMood as $mood)
                    <div class="py-4 flex justify-between items-center">
                        <div class="flex items-center gap-4">
                            <p class="text-gray-700">{{ $mood->name }} ({{ $mood->icon }})</p>
                        </div>
                        <span class="text-gray-500 text-sm">{{ $mood->created_at->format('d-M-Y') }}</span>
                    </div>
                @empty
                    <p class="text-gray-500">No recent mood found.</p>
                @endforelse
            </div>
        </div>

        <!-- Analytics Placeholder -->
        <div class="bg-white shadow rounded-lg p-6">
            <h3 class="text-xl font-semibold text-gray-900 mb-4">Platform Analytics</h3>
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                <div class="bg-gray-100 rounded-lg p-4">
                    <p class="text-gray-500 mb-2">User Growth (Last 30 Days)</p>
                    <div class="bg-white p-6 rounded-lg shadow">
                        <h3 class="mb-4 font-semibold">User Status</h3>
                        <canvas id="growthChart"></canvas>
                    </div>
                </div>
                <div class="bg-gray-100 rounded-lg p-4">
                    <p class="text-gray-500 mb-2">Active vs Inactive Users</p>
                        <div class="bg-white p-6 rounded-lg shadow">
                            <h3 class="mb-4 font-semibold">User Status</h3>
                            <canvas id="statusChart"></canvas>
                        </div>
                </div>
            </div>
        </div>

    </div>
</div>

        @push('scripts')
            <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
            <script>

                const statusData = @json($statusCounts);

                // Status Bar Chart
                new Chart(document.getElementById('statusChart'), {
                    type: 'bar',
                    data: {
                        labels: Object.keys(statusData),
                        datasets: [{
                            data: Object.values(statusData),
                        }]
                    }
                });

                const growthChart = new Chart(document.getElementById('growthChart'), {
                    type: 'line',
                    data: {
                        labels: @json($growthLabels),
                        datasets: [{
                            label: 'New Users',
                            data: @json($growthData),
                            tension: 0.3,
                            fill: true
                        }]
                    }
                });
                
            </script>
        @endpush

</x-admin-layout>
