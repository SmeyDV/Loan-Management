<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold dark:text-white">Loan Details</h2>
    </x-slot>

    <div class="p-6">
        <div class="bg-white dark:bg-gray-800 p-6 rounded shadow">
            <h3 class="text-lg font-bold mb-4 dark:text-white">Loan #{{ $loan->id }}</h3>

            <p class="dark:text-gray-200 mb-2"><strong class="dark:text-white">Borrower:</strong> {{ $loan->customer->name }} ({{ $loan->customer->khmer_name }})</p>
            <p class="dark:text-gray-200 mb-2"><strong class="dark:text-white">Amount:</strong> ${{ number_format($loan->loan_amount, 2) }}</p>
            <p class="dark:text-gray-200 mb-2"><strong class="dark:text-white">Interest Rate:</strong> {{ $loan->interest_rate }}%</p>
            <p class="dark:text-gray-200 mb-2"><strong class="dark:text-white">Start Date:</strong> {{ $loan->starting_date }}</p>
            <p class="dark:text-gray-200 mb-2"><strong class="dark:text-white">Status:</strong> {{ ucfirst($loan->status) }}</p>

            <div class="mt-4">
                <a href="{{ route('loans.edit', $loan->id) }}" class="text-blue-600 dark:text-blue-400 hover:underline">Edit Loan</a>
            </div>
        </div>
    </div>
</x-app-layout>