<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('List') }}
        </h2>
    </x-slot>

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
            <button
                class="px-4 py-2 bg-green-500 text-white rounded hover:bg-green-600 mb-4"
                onclick="openAddUserModal()"
            >
                Add User
            </button>

            <table class="w-full border border-gray-200 dark:border-gray-700 rounded-lg overflow-hidden">
                <thead class="bg-gray-100 dark:bg-gray-800">
                    <tr>
                        <th class="px-4 py-2 text-left">ID</th>
                        <th class="px-4 py-2 text-left">Name</th>
                        <th class="px-4 py-2 text-left">Email</th>
                        <th class="px-4 py-2 text-left">Role</th>
                        <th class="px-4 py-2">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="border-t border-gray-200 dark:border-gray-700">
                        <td class="px-4 py-2">1</td>
                        <td class="px-4 py-2">John Doe</td>
                        <td class="px-4 py-2">john@example.com</td>
                        <td class="px-4 py-2">User</td>
                        <td class="px-4 py-2 space-x-2">
                            <button class="px-2 py-1 bg-blue-500 text-white rounded hover:bg-blue-600">Edit</button>
                            <button class="px-2 py-1 bg-red-500 text-white rounded hover:bg-red-600">Delete</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <!-- Admins Tab -->
        <div id="admins" class="tab-content hidden">
            <button
                class="px-4 py-2 bg-green-500 text-white rounded hover:bg-green-600 mb-4"
                onclick="openAddAdminModal()"
            >
                Add Admin
            </button>

            <table class="w-full border border-gray-200 dark:border-gray-700 rounded-lg overflow-hidden">
                <thead class="bg-gray-100 dark:bg-gray-800">
                    <tr>
                        <th class="px-4 py-2 text-left">ID</th>
                        <th class="px-4 py-2 text-left">Name</th>
                        <th class="px-4 py-2 text-left">Email</th>
                        <th class="px-4 py-2">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="border-t border-gray-200 dark:border-gray-700">
                        <td class="px-4 py-2">1</td>
                        <td class="px-4 py-2">Admin Jane</td>
                        <td class="px-4 py-2">admin@example.com</td>
                        <td class="px-4 py-2 space-x-2">
                            <button class="px-2 py-1 bg-blue-500 text-white rounded hover:bg-blue-600">Edit</button>
                            <button class="px-2 py-1 bg-red-500 text-white rounded hover:bg-red-600">Delete</button>
                        </td>
                    </tr>
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
    </script>

</x-admin-layout>
