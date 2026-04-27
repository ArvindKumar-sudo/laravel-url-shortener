<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            URLs
        </h2>
    </x-slot>

    <div class="py-8 mt-4">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white shadow rounded-lg p-6">

                {{-- Create Form --}}
                @if(!auth()->user()->hasRole('SuperAdmin'))
                    <form method="POST" action="{{ route('urls.store') }}" class="flex gap-3 mb-6">
                        @csrf

                        <input type="url" name="url"
                            class="flex-1 border-gray-300 rounded-md shadow-sm"
                            placeholder="Enter URL" required>

                        <button type="submit"
                            class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                            Create
                        </button>
                    </form>
                @endif

                <hr class="my-6">

                <h3 class="text-lg font-semibold mt-4">URL List</h3>

                <table class="w-full border border-gray-300">
                    <thead>
                        <tr class="bg-gray-100">
                            <th class="p-2 border">S.NO.</th>
                            <th class="p-2 border">Company Name</th>
                            <th class="p-2 border">Original URL</th>
                            <th class="p-2 border">Short Code</th>
                            <th class="p-2 border">Hits</th>
                            <th class="p-2 border">Date</th>
                            <th class="p-2 border">Create By</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse($urls as $key=>$url)
                            <tr>
                                <td class="p-2 border text-center"> {{ $key+1 }}</td>
                                <td class="p-2 border text-center"> {{ $url->company->name }}</td>
                                <td class="p-2 border text-center">
                                    <a href="{{ $url->original_url }}" target="_blank"> {{ $url->original_url }} </a>
                                </td>
                                <td class="p-2 border text-center">
                                    <a href="{{ url('/short/'.$url->short_code) }}" class="text-indigo-600 hover:underline"> {{ $url->short_code }} </a>
                                </td>
                                <td class="p-2 border text-center">{{ $url->hits }}</td>
                                <td class="p-2 border text-center">{{ $url->created_at }}</td>
                                <td class="p-2 border text-center"> {{ $url->user->name }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="8" class="text-center p-4">No URL found</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</x-app-layout>
