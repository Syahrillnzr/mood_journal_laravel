<x-admin-layout>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <h1 class="text-3xl font-bold text-gray-900 dark:text-gray-100 mb-6">User Management</h1>

        <!-- Tabs -->
        <div class="flex border-b border-gray-200 dark:border-gray-700 mb-6">
            <button
                class="px-4 py-2 font-medium text-gray-700 dark:text-gray-300 border-b-2 border-indigo-500 dark:border-indigo-400"
                data-tab="users"
                onclick="openTab(event, 'users')"
            >
                Users
            </button>
            <button
                class="px-4 py-2 font-medium text-gray-700 dark:text-gray-300"
                data-tab="admins"
                onclick="openTab(event, 'admins')"
            >
                Admins
            </button>
        </div>

        <!-- Users Tab -->
        <div id="users" class="tab-content">
            <button class="px-4 py-2 bg-green-500 text-white rounded hover:bg-green-600 mb-4" onclick="openAddUserModal()">
                Add User
            </button>

            <table id="usersTable" class="display w-full">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->role === 1 ? 'Admin' : 'User' }}</td>
                        <td>
                            <button class="px-2 py-1 bg-blue-500 text-white rounded hover:bg-blue-600">Edit</button>
                            <!-- Delete button -->
                            <form method="POST" action="{{ route('admin.lists.destroy', $user->id) }}" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    class="px-2 py-1 bg-red-500 text-white rounded hover:bg-red-600"
                                    onclick="return confirm('Are you sure you want to delete this user?')">
                                    Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Admins Tab -->
        <div id="admins" class="tab-content hidden">
            <button class="px-4 py-2 bg-green-500 text-white rounded hover:bg-green-600 mb-4" onclick="openAddAdminModal()">
                Add Admin
            </button>

            <table id="adminsTable" class="display w-full">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($admins as $admin)
                    <tr>
                        <td>{{ $admin->name }}</td>
                        <td>{{ $admin->email }}</td>
                        <td>{{ $admin->role === 1 ? 'Admin' : 'User' }}</td>
                        <td>
                            <button class="px-2 py-1 bg-blue-500 text-white rounded hover:bg-blue-600">Edit</button>
                            <form method="POST" action="{{ route('admin.lists.destroy', $admin->id) }}" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    class="px-2 py-1 bg-red-500 text-white rounded hover:bg-red-600"
                                    onclick="return confirm('Are you sure you want to delete this admin?')">
                                    Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>

    <!-- Scripts for Tabs -->
    <script>
        function openTab(evt, tabName) {
            const tabs = document.querySelectorAll('.tab-content');
            tabs.forEach(tab => tab.classList.add('hidden'));

            const buttons = evt.currentTarget.parentNode.querySelectorAll('button');
            buttons.forEach(btn => btn.classList.remove('border-b-2', 'border-indigo-500', 'dark:border-indigo-400'));

            document.getElementById(tabName).classList.remove('hidden');
            evt.currentTarget.classList.add('border-b-2', 'border-indigo-500', 'dark:border-indigo-400');
        }

        function openAddUserModal() {
            alert('Open Add User Modal (implement form here)');
        }

        function openAddAdminModal() {
            alert('Open Add Admin Modal (implement form here)');
        }

        $('#usersTable').DataTable({
            paging: true,
            searching: true,
            info: false,
            responsive: true,
            language: {
                search: "_INPUT_",
                searchPlaceholder: "Search users..."
            },
            columnDefs: [
                {
                    targets: 0,
                    searchable: false,
                    orderable: false,
                }
            ],
            order: [[1, 'asc']], // order by Name initially
        });

        $('#adminsTable').DataTable({
            paging: true,
            searching: true,
            info: false,
            responsive: true,
            language: {
                search: "_INPUT_",
                searchPlaceholder: "Search admin..."
            },
            columnDefs: [
                {
                    targets: 0,
                    searchable: false,
                    orderable: false,
                }
            ],
            order: [[1, 'asc']], // order by Name initially
        });
        
    </script>

</x-admin-layout>
