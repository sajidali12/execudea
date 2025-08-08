@extends('admin.layout')

@section('title', 'Edit Expense')

@section('content')
<div class="max-w-4xl mx-auto">
    <div class="bg-white shadow rounded-lg">
        <div class="px-6 py-4 border-b border-gray-200">
            <div class="flex items-center justify-between">
                <div>
                    <h2 class="text-xl font-semibold text-gray-800">Edit Expense</h2>
                    <p class="text-sm text-gray-600 mt-1">Update expense details</p>
                </div>
                <div class="flex items-center space-x-3">
                    <a href="{{ route('admin.expenses.show', $expense) }}" 
                       class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600 transition duration-200">
                        <i class="fas fa-eye mr-2"></i>View
                    </a>
                    <a href="{{ route('admin.expenses.index') }}" 
                       class="bg-gray-500 text-white px-4 py-2 rounded-lg hover:bg-gray-600 transition duration-200">
                        <i class="fas fa-arrow-left mr-2"></i>Back to Expenses
                    </a>
                </div>
            </div>
        </div>

        <form action="{{ route('admin.expenses.update', $expense) }}" method="POST" enctype="multipart/form-data" class="p-6">
            @csrf
            @method('PUT')
            
            <!-- Expense Information -->
            <div class="mb-8">
                <h3 class="text-lg font-semibold text-gray-900 mb-4 flex items-center">
                    <i class="fas fa-receipt text-primary mr-2"></i>
                    Expense Information
                </h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Title -->
                    <div class="md:col-span-2">
                        <label for="title" class="block text-sm font-medium text-gray-700 mb-2">
                            Expense Title <span class="text-red-500">*</span>
                        </label>
                        <input type="text" 
                               id="title" 
                               name="title" 
                               value="{{ old('title', $expense->title) }}"
                               required
                               placeholder="Brief description of the expense"
                               class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary focus:border-primary @error('title') border-red-500 @enderror">
                        @error('title')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Category -->
                    <div>
                        <label for="category" class="block text-sm font-medium text-gray-700 mb-2">
                            Category <span class="text-red-500">*</span>
                        </label>
                        <select id="category" 
                                name="category" 
                                required
                                class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary focus:border-primary @error('category') border-red-500 @enderror">
                            <option value="">Select Category</option>
                            @foreach($categories as $category)
                                <option value="{{ $category }}" {{ old('category', $expense->category) == $category ? 'selected' : '' }}>
                                    {{ $category }}
                                </option>
                            @endforeach
                        </select>
                        @error('category')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Amount -->
                    <div>
                        <label for="amount" class="block text-sm font-medium text-gray-700 mb-2">
                            Amount (PKR) <span class="text-red-500">*</span>
                        </label>
                        <input type="number" 
                               id="amount" 
                               name="amount" 
                               min="0"
                               step="0.01"
                               value="{{ old('amount', $expense->amount) }}"
                               required
                               class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary focus:border-primary @error('amount') border-red-500 @enderror">
                        @error('amount')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Expense Date -->
                    <div>
                        <label for="expense_date" class="block text-sm font-medium text-gray-700 mb-2">
                            Expense Date <span class="text-red-500">*</span>
                        </label>
                        <input type="date" 
                               id="expense_date" 
                               name="expense_date" 
                               value="{{ old('expense_date', $expense->expense_date->format('Y-m-d')) }}"
                               required
                               class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary focus:border-primary @error('expense_date') border-red-500 @enderror">
                        @error('expense_date')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Status -->
                    <div>
                        <label for="status" class="block text-sm font-medium text-gray-700 mb-2">
                            Status <span class="text-red-500">*</span>
                        </label>
                        <select id="status" 
                                name="status" 
                                required
                                class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary focus:border-primary @error('status') border-red-500 @enderror">
                            <option value="pending" {{ old('status', $expense->status) == 'pending' ? 'selected' : '' }}>Pending</option>
                            <option value="approved" {{ old('status', $expense->status) == 'approved' ? 'selected' : '' }}>Approved</option>
                            <option value="paid" {{ old('status', $expense->status) == 'paid' ? 'selected' : '' }}>Paid</option>
                            <option value="rejected" {{ old('status', $expense->status) == 'rejected' ? 'selected' : '' }}>Rejected</option>
                        </select>
                        @error('status')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <!-- Description -->
                <div class="mt-6">
                    <label for="description" class="block text-sm font-medium text-gray-700 mb-2">
                        Description
                    </label>
                    <textarea id="description" 
                              name="description" 
                              rows="3"
                              placeholder="Additional details about this expense..."
                              class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary focus:border-primary @error('description') border-red-500 @enderror">{{ old('description', $expense->description) }}</textarea>
                    @error('description')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <!-- Receipt File -->
            <div class="mb-8">
                <label for="receipt_file" class="block text-sm font-medium text-gray-700 mb-2">
                    Receipt Attachment
                </label>
                @if($expense->receipt_file)
                    <div class="mb-2 p-2 bg-gray-50 rounded border">
                        <div class="flex items-center justify-between">
                            <span class="text-sm text-gray-600">Current file: {{ basename($expense->receipt_file) }}</span>
                            <a href="{{ asset('storage/' . $expense->receipt_file) }}" 
                               target="_blank" 
                               class="text-blue-600 hover:text-blue-800 text-sm">
                                <i class="fas fa-external-link-alt mr-1"></i>View
                            </a>
                        </div>
                    </div>
                @endif
                <input type="file" 
                       id="receipt_file" 
                       name="receipt_file" 
                       accept=".pdf,.jpg,.jpeg,.png"
                       class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary focus:border-primary @error('receipt_file') border-red-500 @enderror">
                <p class="text-xs text-gray-500 mt-1">Accepted formats: PDF, JPG, PNG (Max: 5MB). Leave empty to keep current file.</p>
                @error('receipt_file')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Additional Information -->
            <div class="mb-8">
                <h3 class="text-lg font-semibold text-gray-900 mb-4 flex items-center">
                    <i class="fas fa-sticky-note text-primary mr-2"></i>
                    Additional Notes
                </h3>
                <div>
                    <textarea id="notes" 
                              name="notes" 
                              rows="4"
                              placeholder="Any additional notes about this expense..."
                              class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary focus:border-primary @error('notes') border-red-500 @enderror">{{ old('notes', $expense->notes) }}</textarea>
                    @error('notes')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div class="flex justify-end space-x-4 pt-6 border-t">
                <a href="{{ route('admin.expenses.index') }}" 
                   class="px-6 py-2 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50 transition duration-200">
                    Cancel
                </a>
                <button type="submit" 
                        class="bg-primary text-white px-6 py-2 rounded-lg hover:bg-opacity-90 transition duration-200">
                    <i class="fas fa-save mr-2"></i>Update Expense
                </button>
            </div>
        </form>
    </div>
</div>
@endsection