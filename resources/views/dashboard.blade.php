<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            {{-- Welcome Section --}}
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <p class="text-xl font-semibold mb-4">Welcome, {{ Auth::user()->name }}!</p>

                    {{-- Horizontal Stat Cards --}}
                    <div class="flex flex-wrap gap-4 overflow-x-auto">
                        {{-- Total Loan Amount --}}
                        <div class="min-w-[220px] bg-white dark:bg-gray-900 p-6 rounded-lg shadow-md transition duration-300 hover:shadow-lg">
                            <h3 class="text-lg font-semibold mb-2 flex items-center gap-2">
                                <span class="text-2xl">💰</span> Total Loan Amount
                            </h3>
                            <p class="text-2xl font-bold text-indigo-600 dark:text-indigo-400">
                                ${{ number_format($totalLoanAmount, 2) }}
                            </p>
                        </div>

                        {{-- Active Loans --}}
                        <div class="min-w-[220px] bg-white dark:bg-gray-900 p-6 rounded-lg shadow-md transition duration-300 hover:shadow-lg">
                            <h3 class="text-lg font-semibold mb-2 flex items-center gap-2">
                                <span class="text-2xl">✅</span> Active Loans
                            </h3>
                            <p class="text-2xl font-bold text-green-500">
                                {{ $activeLoans }}
                            </p>
                        </div>

                        {{-- Pending Loans --}}
                        <div class="min-w-[220px] bg-white dark:bg-gray-900 p-6 rounded-lg shadow-md transition duration-300 hover:shadow-lg">
                            <h3 class="text-lg font-semibold mb-2 flex items-center gap-2">
                                <span class="text-2xl">🕒</span> Pending Loans
                            </h3>
                            <p class="text-2xl font-bold text-yellow-400">
                                {{ $pendingLoans }}
                            </p>
                        </div>

                        {{-- Overdue Loans --}}
                        <div class="min-w-[220px] bg-white dark:bg-gray-900 p-6 rounded-lg shadow-md transition duration-300 hover:shadow-lg">
                            <h3 class="text-lg font-semibold mb-2 flex items-center gap-2">
                                <span class="text-2xl">⚠️</span> Overdue Loans
                            </h3>
                            <p class="text-2xl font-bold text-red-500">
                                {{ $overdueLoans }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>


            {{-- Recent Loans Table --}}
            <div class="bg-white dark:bg-gray-800 shadow rounded-lg overflow-hidden ">
                <div class="p-6 border-b border-gray-200 dark:border-gray-700">
                    <h3 class="text-lg font-semibold text-gray-800 dark:text-gray-200 flex items-center gap-2">
                        <span class="text-xl">📋</span> Recent Loan Applications
                    </h3>
                </div>
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                        <thead class="bg-gray-50 dark:bg-gray-700">
                            <tr>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Loan ID</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Borrower</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Amount</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Interest Rate</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Status</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Created At</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white dark:bg-gray-900 divide-y divide-gray-200 dark:divide-gray-700">
                            @forelse ($recentLoans as $loan)
                            <tr class="hover:bg-gray-50 dark:hover:bg-gray-800 transition duration-150">
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 dark:text-gray-200">
                                    #LN{{ str_pad($loan->id, 3, '0', STR_PAD_LEFT) }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200">
                                    {{ $loan->customer->name ?? 'N/A' }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-green-600 dark:text-green-400">
                                    ${{ number_format($loan->loan_amount, 2) }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200">
                                    {{ $loan->interest_rate }}%
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm">
                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full 
                                        {{ $loan->status === 'active' ? 'bg-green-100 text-green-800' : 
                                           ($loan->status === 'pending' ? 'bg-yellow-100 text-yellow-800' : 
                                           'bg-red-100 text-red-800') }}">
                                        {{ ucfirst($loan->status) }}
                                    </span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-400">
                                    {{ $loan->created_at->format('M d, Y') }}
                                </td>
                                <td>
                                <td class="flex gap-2">
                                    <a href="{{ route('loans.show', $loan->id) }}"
                                        class="inline-flex items-center px-3 py-1 text-xs font-semibold text-white bg-blue-600 rounded hover:bg-blue-700">
                                        <i class="fas fa-eye mr-1"></i> View
                                    </a>

                                    <a href="{{ route('loans.edit', $loan->id) }}"
                                        class="inline-flex items-center px-3 py-1 text-xs font-semibold text-white bg-yellow-500 rounded hover:bg-yellow-600">
                                        <i class="fas fa-edit mr-1"></i> Edit
                                    </a>
                                </td>

                            </tr>
                            @empty
                            <tr>
                                <td colspan="6" class="px-6 py-4 text-center text-sm text-gray-500 dark:text-gray-400">
                                    No recent loans found.
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>