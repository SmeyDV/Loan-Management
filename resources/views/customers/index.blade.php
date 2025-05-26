<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-gray-900 dark:text-white">All Customers</h2>
    </x-slot>

    <div class="p-6">
        <!-- Mobile Card View -->
        <div class="block md:hidden">
            @foreach ($customers as $customer)
            <div class="bg-white dark:bg-gray-800 rounded-lg shadow p-4 mb-4">
                <h3 class="font-medium text-gray-900 dark:text-white">{{ $customer->name }}</h3>
                <p class="text-sm text-gray-500 dark:text-gray-400">Khmer Name: {{ $customer->khmer_name }}</p>
                <p class="text-sm text-gray-500 dark:text-gray-400">Phone: {{ $customer->phone }}</p>
                <div class="mt-2">
                    <a href="{{ route('customers.show', $customer->id) }}" class="text-blue-500 hover:underline">View</a>
                    <a href="{{ route('customers.edit', $customer->id) }}" class="text-yellow-500 hover:underline">Edit</a>
                </div>
            </div>
            @endforeach
        </div>

        <!-- Desktop Table View -->
        <div class="hidden md:block overflow-x-auto">
            <table class="min-w-full bg-white dark:bg-gray-800 rounded shadow">
                <thead>
                    <tr>
                        <th class="px-4 py-2 text-left text-gray-900 dark:text-white">ID</th>
                        <th class="px-4 py-2 text-left text-gray-900 dark:text-white">Name</th>
                        <th class="px-4 py-2 text-left text-gray-900 dark:text-white">Khmer Name</th>
                        <th class="px-4 py-2 text-left text-gray-900 dark:text-white">Phone</th>
                        <th class="px-4 py-2 text-left text-gray-900 dark:text-white">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($customers as $customer)
                    <tr class="border-t dark:border-gray-600">
                        <td class="px-4 py-2 text-gray-900 dark:text-white">{{ $customer->id }}</td>
                        <td class="px-4 py-2 text-gray-900 dark:text-white">{{ $customer->name }}</td>
                        <td class="px-4 py-2 text-gray-900 dark:text-white">{{ $customer->khmer_name }}</td>
                        <td class="px-4 py-2 text-gray-900 dark:text-white">{{ $customer->phone }}</td>
                        <td class="px-4 py-2 flex gap-2">
                            <a href="{{ route('customers.show', $customer->id) }}" class="text-blue-500 hover:underline">View</a>
                            <a href="{{ route('customers.edit', $customer->id) }}" class="text-yellow-500 hover:underline">Edit</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
