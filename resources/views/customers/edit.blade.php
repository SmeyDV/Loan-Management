<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold">Edit Customer</h2>
    </x-slot>

    <div class="p-6 bg-white dark:bg-gray-800 rounded">
        <form method="POST" action="{{ route('customers.update', $customer->id) }}">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label>Name</label>
                <input type="text" name="name" value="{{ $customer->name }}" required class="w-full rounded border-gray-300 dark:bg-gray-900 dark:text-white" />
            </div>

            <div class="mb-4">
                <label>Khmer Name</label>
                <input type="text" name="khmer_name" value="{{ $customer->khmer_name }}" class="w-full rounded border-gray-300 dark:bg-gray-900 dark:text-white" />
            </div>

            <div class="mb-4">
                <label>Phone</label>
                <input type="text" name="phone" value="{{ $customer->phone }}" class="w-full rounded border-gray-300 dark:bg-gray-900 dark:text-white" />
            </div>

            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Save Changes</button>
        </form>
    </div>
</x-app-layout>
