<x-admin-layout>

    @php
        $status = [
            0 => 'Deactive',
            1 => 'Active',
        ];
    @endphp

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
            <button
                class="px-4 py-2 font-medium text-gray-700 dark:text-gray-300"
                data-tab="blogs"
                onclick="openTab(event, 'blogs')"
            >
                Blog Manager
            </button>
        </div>

        <!-- Users Tab -->
        <div id="users" class="tab-content">
            {{-- <button class="px-4 py-2 bg-green-500 text-white rounded hover:bg-green-600 mb-4" onclick="openAddUserModal()">
                Add User
            </button> --}}

            <table id="usersTable" class="display w-full">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $status[$user->status] }}</td>
                        <td>
                            <button class="px-2 py-1 bg-blue-500 text-white rounded hover:bg-blue-600" onclick="openEditUserModal()">Edit</button>
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
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($admins as $admin)
                    <tr>
                        <td>{{ $admin->name }}</td>
                        <td>{{ $admin->email }}</td>
                        <td>{{ $status[$admin->status] }}</td>
                        <td>
                            <button class="px-2 py-1 bg-blue-500 text-white rounded hover:bg-blue-600" onclick="openEditAdminModal()">Edit</button>
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

        <!-- Blog Manager Tab -->
        <div id="blogs" class="tab-content hidden">
            <button class="px-4 py-2 bg-green-500 text-white rounded hover:bg-green-600 mb-4" onclick="openAddBlogModal()">
                Add Blog Manager
            </button>

            <table id="blogManagerTable" class="display w-full">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($blogs as $blog)
                    <tr>
                        <td>{{ $blog->name }}</td>
                        <td>{{ $blog->email }}</td>
                        <td>{{ $status[$blog->status] }}</td>
                        <td>
                            <button class="px-2 py-1 bg-blue-500 text-white rounded hover:bg-blue-600">Edit</button>
                            <form method="POST" action="{{ route('admin.lists.destroy', $blog->id) }}" class="inline">
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


    <!-- Add Admin Modal -->
    <div id="addAdminModal"
        class="fixed inset-0 bg-black bg-opacity-50 hidden items-center justify-center z-50">

        <div class="bg-white dark:bg-gray-800 w-full max-w-md rounded-lg shadow-lg p-6">
            <h2 class="text-xl font-semibold mb-4 text-gray-800 dark:text-gray-100">
                Add New Admin
            </h2>

            <form method="POST" action="{{ route('admin.lists.store') }}" class="space-y-4">
                @csrf

                <div>
                    <label class="block text-sm font-medium">Name</label>
                    <input type="text" name="name" required
                        class="w-full border rounded p-2">
                </div>

                <div>
                    <label class="block text-sm font-medium">Email</label>
                    <input type="email" name="email" required
                        class="w-full border rounded p-2">
                </div>

                <div>
                    <label class="block text-sm font-medium">Password</label>
                    <input type="password" name="password" required
                        class="w-full border rounded p-2">
                </div>

                <div>
                    <label class="block text-sm font-medium">Re-enter Password</label>
                    <input type="password" name="password_confirmation" required
                        class="w-full border rounded p-2">
                </div>

                <div>
                    <label class="block text-sm font-medium">Role</label>
                    <select name="role" class="w-full border rounded p-2">
                        <option value="0">User</option>
                        <option value="1">Admin</option>
                        <option value="2">Blog Manager</option>
                    </select>
                </div>

                <div class="flex justify-end gap-2 pt-4">
                    <button type="button"
                        onclick="closeAddAdminModal()"
                        class="px-4 py-2 bg-gray-300 rounded">
                        Cancel
                    </button>

                    <button type="submit"
                        class="px-4 py-2 bg-indigo-600 text-white rounded">
                        Save
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Edit Admin Modal -->
    <div id="editAdminModal"
        class="fixed inset-0 bg-black bg-opacity-50 hidden items-center justify-center z-50">

        <div class="bg-white dark:bg-gray-800 w-full max-w-md rounded-lg shadow-lg p-6">
            <h2 class="text-xl font-semibold mb-4 text-gray-800 dark:text-gray-100">
                Edit Admin detail
            </h2>

            <form method="POST" action="{{ route('admin.lists.update',$user) }}" class="space-y-4">
                @csrf
                @method('PATCH')

                <div>
                    <label class="block text-sm font-medium">Name</label>
                    <input type="text" name="name" value="{{ $user->name }}" 
                        class="w-full border rounded p-2 bg-gray-100 cursor-not-allowed" readonly>
                </div>

                <div>
                    <label class="block text-sm font-medium">Email</label>
                    <input type="email" name="email" value="{{ $user->email }}" 
                        class="w-full border rounded p-2 bg-gray-100 cursor-not-allowed" readonly>
                </div>

                <div>
                    <label class="block text-sm font-medium">Role</label>
                    <select name="role" class="w-full border rounded p-2" disabled>
                        <option value="0" {{ $user->role === 0 ? 'selected' : '' }}>User</option>
                        <option value="1" {{ $user->role === 1 ? 'selected' : '' }}>Admin</option>
                        <option value="2" {{ $user->role === 2 ? 'selected' : '' }}>Blog Manager</option>
                    </select>
                </div>

                <div>
                    <label class="block text-sm font-medium">Status</label>
                    <select name="status" class="w-full border rounded p-2">
                        <option value="1" {{ $user->status === 1 ? 'selected' : '' }}>Active</option>
                        <option value="0" {{ $user->status === 0 ? 'selected' : '' }}>Deactive</option>
                    </select>
                </div>

                <div class="flex justify-end gap-2 pt-4">
                    <button type="button"
                        onclick="closeEditAdminModal()"
                        class="px-4 py-2 bg-gray-300 rounded">
                        Cancel
                    </button>

                    <button type="submit"
                        class="px-4 py-2 bg-indigo-600 text-white rounded">
                        Save
                    </button>
                </div>
            </form>
        </div>
    </div>

<!-- 

    ada problem dengan update status , kena fix
-->

    <!-- Add Blog Manager Modal -->
    <div id="addBlogModal"
        class="fixed inset-0 bg-black bg-opacity-50 hidden items-center justify-center z-50">

        <div class="bg-white dark:bg-gray-800 w-full max-w-md rounded-lg shadow-lg p-6">
            <h2 class="text-xl font-semibold mb-4 text-gray-800 dark:text-gray-100">
                Add New Blog Manager
            </h2>

            <form method="POST" action="{{ route('admin.lists.store') }}" class="space-y-4">
                @csrf

                <div>
                    <label class="block text-sm font-medium">Name</label>
                    <input type="text" name="name" required
                        class="w-full border rounded p-2">
                </div>

                <div>
                    <label class="block text-sm font-medium">Email</label>
                    <input type="email" name="email" required
                        class="w-full border rounded p-2">
                </div>

                <div>
                    <label class="block text-sm font-medium">Password</label>
                    <input type="password" name="password" required
                        class="w-full border rounded p-2">
                </div>

                <div>
                    <label class="block text-sm font-medium">Re-enter Password</label>
                    <input type="password" name="password_confirmation" required
                        class="w-full border rounded p-2">
                </div>

                <div>
                    <label class="block text-sm font-medium">Role</label>
                    <select name="role" class="w-full border rounded p-2">
                        <option value="1">Admin</option>
                        <option value="2">Blog Manager</option>
                    </select>
                </div>

                <div class="flex justify-end gap-2 pt-4">
                    <button type="button"
                        onclick="closeAddBlogModal()"
                        class="px-4 py-2 bg-gray-300 rounded">
                        Cancel
                    </button>

                    <button type="submit"
                        class="px-4 py-2 bg-indigo-600 text-white rounded">
                        Save
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Edit User Modal -->
    <div id="editUserModal"
        class="fixed inset-0 bg-black bg-opacity-50 hidden items-center justify-center z-50">

        <div class="bg-white dark:bg-gray-800 w-full max-w-md rounded-lg shadow-lg p-6">
            <h2 class="text-xl font-semibold mb-4 text-gray-800 dark:text-gray-100">
                Edit User Detail
            </h2>

            <form method="POST" action="{{ route('admin.lists.store') }}" class="space-y-4">
                @csrf

                <div>
                    <label class="block text-sm font-medium">Name</label>
                    <input type="text" name="name" value="{{ $user->name }}" 
                        class="w-full border rounded p-2 bg-gray-100 cursor-not-allowed" 
                        readonly>
                </div>

                <div>
                    <label class="block text-sm font-medium">Email</label>
                    <input type="email" name="email" value="{{ $user->email }}" 
                        class="w-full border rounded p-2 bg-gray-100 cursor-not-allowed" 
                        readonly>
                </div>

                <div>
                    <label class="block text-sm font-medium">Password</label>
                    <input type="password" name="password" value="********" 
                        class="w-full border rounded p-2 bg-gray-100 cursor-not-allowed" 
                        readonly>
                </div>


                <div>
                    <label class="block text-sm font-medium">Status</label>
                    <select name="role" class="w-full border rounded p-2">
                        <option value="#">Active</option>
                        <option value="#">Deactive</option>
                    </select>
                </div>

                <div class="flex justify-end gap-2 pt-4">
                    <button type="button"
                        onclick="closeEditUserModal()"
                        class="px-4 py-2 bg-gray-300 rounded">
                        Cancel
                    </button>

                    <button type="submit"
                        class="px-4 py-2 bg-indigo-600 text-white rounded">
                        Save
                    </button>
                </div>
            </form>
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


        //User
        function openEditUserModal() {
            document.getElementById('editUserModal').classList.remove('hidden');
            document.getElementById('editUserModal').classList.add('flex');
        }

        function closeEditUserModal() {
            document.getElementById('editUserModal').classList.add('hidden');
            document.getElementById('editUserModal').classList.remove('flex');
        }

        //Admin
        function openAddAdminModal() {
            document.getElementById('addAdminModal').classList.remove('hidden');
            document.getElementById('addAdminModal').classList.add('flex');
        }

        function closeAddAdminModal() {
            document.getElementById('addAdminModal').classList.add('hidden');
            document.getElementById('addAdminModal').classList.remove('flex');
        }

        function openEditAdminModal() {
            document.getElementById('editAdminModal').classList.remove('hidden');
            document.getElementById('editAdminModal').classList.add('flex');
        }

        function closeEditAdminModal() {
            document.getElementById('editAdminModal').classList.add('hidden');
            document.getElementById('editAdminModal').classList.remove('flex');
        }

        //Blog Manager
        function openAddBlogModal() {
            document.getElementById('addBlogModal').classList.remove('hidden');
            document.getElementById('addBlogModal').classList.add('flex');
        }

        function closeAddBlogModal() {
            document.getElementById('addBlogModal').classList.add('hidden');
            document.getElementById('addBlogModal').classList.remove('flex');
        }

        function openEditBlogModal() {
            document.getElementById('editBlogModal').classList.remove('hidden');
            document.getElementById('editBlogModal').classList.add('flex');
        }

        function closeEditBlogModal() {
            document.getElementById('editBlogModal').classList.add('hidden');
            document.getElementById('editBlogModal').classList.remove('flex');
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

        $('#blogManagerTable').DataTable({
            paging: true,
            searching: true,
            info: false,
            responsive: true,
            language: {
                search: "_INPUT_",
                searchPlaceholder: "Search blog manager..."
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
