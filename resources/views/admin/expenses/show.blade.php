@extends('admin.layout')

@section('title', 'Expense Details')

@section('content')
<div class="max-w-4xl mx-auto">
    <div class="bg-white shadow rounded-lg">
        <div class="px-6 py-4 border-b border-gray-200">
            <div class="flex items-center justify-between">
                <div>
                    <h2 class="text-xl font-semibold text-gray-800">Expense Details</h2>
                    <p class="text-sm text-gray-600 mt-1">{{ $expense->title }}</p>
                </div>
                <div class="flex items-center space-x-3">
                    <a href="{{ route('admin.expenses.edit', $expense) }}" 
                       class="bg-primary text-white px-4 py-2 rounded-lg hover:bg-opacity-90 transition duration-200">
                        <i class="fas fa-edit mr-2"></i>Edit
                    </a>
                    <a href="{{ route('admin.expenses.index') }}" 
                       class="bg-gray-500 text-white px-4 py-2 rounded-lg hover:bg-gray-600 transition duration-200">
                        <i class="fas fa-arrow-left mr-2"></i>Back to Expenses
                    </a>
                </div>
            </div>
        </div>

        <div class="p-6">
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                <!-- Main Information -->
                <div class="lg:col-span-2 space-y-8">
                    <!-- Expense Information -->
                    <div>
                        <h3 class="text-lg font-semibold text-gray-900 mb-4 flex items-center">
                            <i class="fas fa-receipt text-primary mr-2"></i>
                            Expense Information
                        </h3>
                        <div class="bg-gray-50 rounded-lg p-6">
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div>
                                    <label class="block text-sm font-medium text-gray-500 mb-1">Title</label>
                                    <p class="text-gray-900 font-medium">{{ $expense->title }}</p>
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-500 mb-1">Category</label>
                                    <span class="inline-flex px-3 py-1 text-sm font-medium bg-blue-100 text-blue-800 rounded-full">
                                        {{ $expense->category }}
                                    </span>
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-500 mb-1">Amount</label>
                                    <p class="text-2xl font-bold text-gray-900">PKR {{ number_format($expense->amount, 2) }}</p>
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-500 mb-1">Status</label>
                                    <span class="inline-flex px-3 py-1 text-sm font-semibold rounded-full 
                                        @if($expense->status === 'paid') bg-green-100 text-green-800
                                        @elseif($expense->status === 'approved') bg-blue-100 text-blue-800
                                        @elseif($expense->status === 'pending') bg-yellow-100 text-yellow-800
                                        @elseif($expense->status === 'rejected') bg-red-100 text-red-800
                                        @else bg-gray-100 text-gray-800 @endif">
                                        {{ ucfirst($expense->status) }}
                                    </span>
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-500 mb-1">Expense Date</label>
                                    <p class="text-gray-900">{{ $expense->expense_date->format('F d, Y') }}</p>
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-500 mb-1">Created By</label>
                                    <p class="text-gray-900">{{ $expense->creator->name }}</p>
                                </div>
                            </div>

                            @if($expense->description)
                                <div class="mt-6 pt-6 border-t border-gray-200">
                                    <label class="block text-sm font-medium text-gray-500 mb-2">Description</label>
                                    <p class="text-gray-900 leading-relaxed">{{ $expense->description }}</p>
                                </div>
                            @endif
                        </div>
                    </div>

                    @if($expense->receipt_file)
                        <!-- Receipt File -->
                        <div>
                            <h3 class="text-lg font-semibold text-gray-900 mb-4 flex items-center">
                                <i class="fas fa-paperclip text-primary mr-2"></i>
                                Receipt Attachment
                            </h3>
                            <div class="bg-gray-50 rounded-lg p-6">
                                <div class="flex items-center space-x-2">
                                    <a href="{{ asset('storage/' . $expense->receipt_file) }}" 
                                       target="_blank" 
                                       class="inline-flex items-center px-3 py-2 bg-blue-100 text-blue-700 rounded-lg hover:bg-blue-200 transition duration-200">
                                        <i class="fas fa-file mr-2"></i>
                                        View Receipt
                                    </a>
                                    <span class="text-sm text-gray-500">{{ basename($expense->receipt_file) }}</span>
                                </div>
                            </div>
                        </div>
                    @endif

                    @if($expense->notes)
                        <!-- Additional Notes -->
                        <div>
                            <h3 class="text-lg font-semibold text-gray-900 mb-4 flex items-center">
                                <i class="fas fa-sticky-note text-primary mr-2"></i>
                                Additional Notes
                            </h3>
                            <div class="bg-yellow-50 border-l-4 border-yellow-400 p-4">
                                <p class="text-gray-900 leading-relaxed">{{ $expense->notes }}</p>
                            </div>
                        </div>
                    @endif
                </div>

                <!-- Sidebar -->
                <div class="space-y-6">
                    <!-- Quick Actions -->
                    <div class="bg-gray-50 rounded-lg p-4">
                        <h4 class="font-medium text-gray-900 mb-3">Quick Actions</h4>
                        <div class="space-y-2">
                            <a href="{{ route('admin.expenses.edit', $expense) }}" 
                               class="w-full flex items-center px-3 py-2 text-sm text-blue-600 hover:bg-blue-50 rounded-lg transition duration-200">
                                <i class="fas fa-edit mr-2"></i>
                                Edit Expense
                            </a>
                            @if($expense->receipt_file)
                                <a href="{{ asset('storage/' . $expense->receipt_file) }}" 
                                   target="_blank"
                                   class="w-full flex items-center px-3 py-2 text-sm text-green-600 hover:bg-green-50 rounded-lg transition duration-200">
                                    <i class="fas fa-download mr-2"></i>
                                    Download Receipt
                                </a>
                            @endif
                            <form action="{{ route('admin.expenses.destroy', $expense) }}" 
                                  method="POST" 
                                  onsubmit="return confirm('Are you sure you want to delete this expense? This action cannot be undone.')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" 
                                        class="w-full flex items-center px-3 py-2 text-sm text-red-600 hover:bg-red-50 rounded-lg transition duration-200">
                                    <i class="fas fa-trash mr-2"></i>
                                    Delete Expense
                                </button>
                            </form>
                        </div>
                    </div>

                    <!-- Summary -->
                    <div class="bg-blue-50 rounded-lg p-4">
                        <h4 class="font-medium text-gray-900 mb-3">Summary</h4>
                        <div class="space-y-3">
                            <div class="flex justify-between">
                                <span class="text-sm text-gray-600">Amount:</span>
                                <span class="text-sm font-medium text-gray-900">PKR {{ number_format($expense->amount, 2) }}</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-sm text-gray-600">Status:</span>
                                <span class="text-sm font-medium text-gray-900">{{ ucfirst($expense->status) }}</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-sm text-gray-600">Date:</span>
                                <span class="text-sm font-medium text-gray-900">{{ $expense->expense_date->format('M d, Y') }}</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-sm text-gray-600">Category:</span>
                                <span class="text-sm font-medium text-gray-900">{{ $expense->category }}</span>
                            </div>
                        </div>
                    </div>

                    <!-- Timestamps -->
                    <div class="bg-gray-50 rounded-lg p-4">
                        <h4 class="font-medium text-gray-900 mb-3">Record Information</h4>
                        <div class="space-y-2 text-sm text-gray-600">
                            <div>
                                <span class="font-medium">Created:</span><br>
                                {{ $expense->created_at->format('F d, Y g:i A') }}
                            </div>
                            <div>
                                <span class="font-medium">Last Updated:</span><br>
                                {{ $expense->updated_at->format('F d, Y g:i A') }}
                            </div>
                            <div>
                                <span class="font-medium">Created By:</span><br>
                                {{ $expense->creator->name }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection