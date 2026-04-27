<x-app-layout>
    <x-slot name="header">
        <h2>Dashboard</h2>
    </x-slot>

    <div class="p-6" style="background-color: #ffffff; border-radius: 20px; box-shadow: 0 10px 30px rgba(0, 0, 0, 0.06); margin: 30px; border: 1px solid rgba(0, 0, 0, 0.03); width: 35%;">
        <h3>Welcome {{ auth()->user()->name }}</h3>

        <p><strong>Role:</strong>
            {{ auth()->user()->roles->pluck('name')->implode(', ') }}
        </p>

        <p><strong>Company ID:</strong>
            {{ auth()->user()->company_id }}
        </p>
    </div>
</x-app-layout>
