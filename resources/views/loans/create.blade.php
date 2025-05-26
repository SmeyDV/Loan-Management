<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-gray-800 dark:text-gray-200 leading-tight">
            Create New Loan
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
                <form method="POST" action="{{ route('loans.store') }}">
                    @csrf

                    {{-- Customer Name (English) --}}
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Borrower Name (English)</label>
                        <input type="text" name="customer_name" required class="mt-1 block w-full rounded-md shadow-sm border-gray-300 dark:bg-gray-900 dark:text-white" placeholder="">
                    </div>

                    {{-- Customer Name (Khmer) --}}
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Borrower Name (Khmer)</label>
                        <input type="text" name="customer_khmer_name" required class="mt-1 block w-full rounded-md shadow-sm border-gray-300 dark:bg-gray-900 dark:text-white" placeholder="">
                    </div>

                    {{-- Loan Amount --}}
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Loan Amount ($)</label>
                        <input type="number" name="loan_amount" step="0.01" required class="mt-1 block w-full rounded-md shadow-sm border-gray-300 dark:bg-gray-900 dark:text-white">
                    </div>

                    {{-- Interest Rate --}}
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Interest Rate (%)</label>
                        <input type="number" name="interest_rate" step="0.01" required class="mt-1 block w-full rounded-md shadow-sm border-gray-300 dark:bg-gray-900 dark:text-white">
                    </div>

                    {{-- Loan Term --}}
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Loan Term (Months)</label>
                        <input type="number" name="loan_term" required class="mt-1 block w-full rounded-md shadow-sm border-gray-300 dark:bg-gray-900 dark:text-white">
                    </div>

                    {{-- Starting Date --}}
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Start Date</label>
                        <input type="date" name="starting_date" required class="mt-1 block w-full rounded-md shadow-sm border-gray-300 dark:bg-gray-900 dark:text-white">
                    </div>

                    {{-- Currency --}}
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Currency</label>
                        <select name="currency" class="mt-1 block w-full rounded-md shadow-sm border-gray-300 dark:bg-gray-900 dark:text-white">
                            <option value="USD">USD</option>
                            <option value="KHR">KHR</option>
                        </select>
                    </div>

                    {{-- Status --}}
                    <div class="mb-6">
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Status</label>
                        <select name="status" class="mt-1 block w-full rounded-md shadow-sm border-gray-300 dark:bg-gray-900 dark:text-white">
                            <option value="pending">Pending</option>
                            <option value="active">Active</option>
                            <option value="overdue">Overdue</option>
                            <option value="completed">Completed</option>
                        </select>
                    </div>

                    <div class="flex justify-end">
                        <a href="{{ route('loans.index') }}" class="mr-4 text-sm text-gray-600 dark:text-gray-400 hover:underline">Cancel</a>
                        <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded">
                            Save Loan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
