<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold">Customer Details</h2>
    </x-slot>

    <div class="p-6 bg-white dark:bg-gray-800 rounded">
        <p><strong>ID:</strong> {{ $customer->id }}</p>
        <p><strong>Name:</strong> {{ $customer->name }}</p>
        <p><strong>Khmer Name:</strong> {{ $customer->khmer_name }}</p>
        <p><strong>Phone:</strong> {{ $customer->phone }}</p>
        <a href="{{ route('customers.edit', $customer->id) }}" class="text-yellow-500 hover:underline mt-4 inline-block">Edit Customer</a>
    </div>
</x-app-layout>
