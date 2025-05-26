<x-app-layout>
  <x-slot name="header">
    <h2 class="text-xl font-semibold dark:text-white">Edit Loan #{{ $loan->id }}</h2>
  </x-slot>

  <div class="p-6">
    <form method="POST" action="{{ route('loans.update', $loan->id) }}">
      @csrf
      @method('PUT')

      <div class="mb-4">
        <label class="block dark:text-gray-200">Loan Amount ($)</label>
        <input type="number" name="loan_amount" value="{{ $loan->loan_amount }}" step="0.01" required class="w-full rounded border-gray-300 dark:bg-gray-900 dark:text-white dark:border-gray-700">
      </div>

      <div class="mb-4">
        <label class="block dark:text-gray-200">Interest Rate (%)</label>
        <input type="number" name="interest_rate" value="{{ $loan->interest_rate }}" step="0.01" required class="w-full rounded border-gray-300 dark:bg-gray-900 dark:text-white dark:border-gray-700">
      </div>

      <div class="mb-4">
        <label class="block dark:text-gray-200">Starting Date</label>
        <input type="date" name="starting_date" value="{{ $loan->starting_date }}" required class="w-full rounded border-gray-300 dark:bg-gray-900 dark:text-white dark:border-gray-700">
      </div>

      <div class="mb-4">
        <label class="block dark:text-gray-200">Status</label>
        <select name="status" class="w-full rounded border-gray-300 dark:bg-gray-900 dark:text-white dark:border-gray-700">
          @foreach (['pending', 'active', 'overdue', 'completed'] as $status)
          <option value="{{ $status }}" @selected($loan->status === $status)>
            {{ ucfirst($status) }}
          </option>
          @endforeach
        </select>
      </div>

      <div class="mt-4">
        <a href="{{ route('loans.show', $loan->id) }}" class="text-gray-600 dark:text-gray-400 hover:underline mr-4">Cancel</a>
        <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded transition duration-150 ease-in-out">Save Changes</button>
      </div>
    </form>
  </div>
</x-app-layout>