<x-admin-layout>
    <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-8">

        <!-- Stats Section -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            <div class="bg-white p-6 rounded-lg shadow">
                <p class="text-gray-500 text-sm">Total Users</p>
                <h2 class="text-2xl font-bold">{{ $totalUsers }}</h2>
            </div>

            <div class="bg-white p-6 rounded-lg shadow">
                <p class="text-gray-500 text-sm">Active Users</p>
                <h2 class="text-2xl font-bold text-green-600">{{ $activeUsers }}</h2>
            </div>

            <div class="bg-white p-6 rounded-lg shadow">
                <p class="text-gray-500 text-sm">Inactive Users</p>
                <h2 class="text-2xl font-bold text-red-600">{{ $inactiveUsers }}</h2>
            </div>

            <div class="bg-white p-6 rounded-lg shadow">
                <p class="text-gray-500 text-sm">Admins</p>
                <h2 class="text-2xl font-bold">{{ $admins }}</h2>
            </div>

            <div class="bg-white p-6 rounded-lg shadow">
                <p class="text-gray-500 text-sm">Blog Managers</p>
                <h2 class="text-2xl font-bold">{{ $blogManagers }}</h2>
            </div>

            <div class="bg-white p-6 rounded-lg shadow">
                <p class="text-gray-500 text-sm">Normal Users</p>
                <h2 class="text-2xl font-bold">{{ $normalUsers }}</h2>
            </div>
        </div>


        <!-- Charts Section -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
            <div class="bg-white p-6 rounded-lg shadow">
                <h3 class="mb-4 font-semibold">Users by Role</h3>
                <canvas id="roleChart"></canvas>
            </div>

            <div class="bg-white p-6 rounded-lg shadow">
                <h3 class="mb-4 font-semibold">User Status</h3>
                <canvas id="statusChart"></canvas>
            </div>
        </div>




        @push('scripts')
            <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
            <script>
                const roleData = @json($roleCounts);
                const statusData = @json($statusCounts);

                // Role Pie Chart
                new Chart(document.getElementById('roleChart'), {
                    type: 'pie',
                    data: {
                        labels: Object.keys(roleData),
                        datasets: [{
                            data: Object.values(roleData),
                        }]
                    }
                });

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
                
            </script>
        @endpush
    </div>
</x-admin-layout>
