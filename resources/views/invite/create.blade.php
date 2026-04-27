<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Invite User
        </h2>
    </x-slot>
    <div class="py-8 mt-4">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow rounded-lg p-6">
                @if($errors->any())
                    <div class="mb-4 text-red-600">
                        {{ $errors->first() }}
                    </div>
                @endif
                @if(session('success'))
                    <div class="mb-4 text-green-600">
                        {{ session('success') }}
                    </div>
                @endif
                <form method="POST" action="{{ route('invite.store') }}" class="space-y-4">
                    @csrf
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">
                            Email
                        </label>
                        <input type="email" name="email"
                            class="w-full border-gray-300 rounded-md shadow-sm"
                            placeholder="Enter email" required>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">
                            Role
                        </label>
                        <select name="role"
                            class="w-full border-gray-300 rounded-md shadow-sm">

                            <option value="Admin">Admin</option>
                            @if(!$authUser->hasRole('SuperAdmin'))
                            <option value="Member">Member</option>
                            @endif
                        </select>
                    </div>

                    <div class="mt-4 mb-4">
                        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                            Invite User
                        </button>
                    </div>

                </form>


                <hr class="my-6">

                <h3 class="text-lg font-semibold mt-4">Invited Users</h3>

                <table class="w-full border border-gray-300">
                    <thead>
                        <tr class="bg-gray-100">
                            <th class="p-2 border">Email</th>
                            <th class="p-2 border">Role</th>
                            <th class="p-2 border">Company ID</th>
                            <th class="p-2 border">Date</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse($invitations as $invite)
                            <tr>
                                <td class="p-2 border text-center">{{ $invite->email }}</td>
                                <td class="p-2 border text-center">{{ $invite->role }}</td>
                                <td class="p-2 border text-center">{{ $invite->company_id }}</td>
                                <td class="p-2 border text-center">{{ $invite->created_at }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center p-4">No invitations found</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
