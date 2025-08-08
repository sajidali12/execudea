@extends('admin.layout')

@section('title', 'Contact Messages')

@section('content')
<div class="max-w-7xl mx-auto">
    <div class="bg-white shadow rounded-lg">
        <div class="px-6 py-4 border-b border-gray-200">
            <div class="flex justify-between items-center">
                <div>
                    <h2 class="text-xl font-semibold text-gray-800">Contact Messages</h2>
                    <p class="text-sm text-gray-600 mt-1">Messages received from contact form</p>
                </div>
                <div class="flex items-center space-x-4">
                    <div class="text-sm text-gray-600">
                        Total: <span class="font-semibold">{{ $messages->total() }}</span> messages
                    </div>
                </div>
            </div>
        </div>

        <!-- Summary Cards -->
        <div class="p-6 bg-gray-50 border-b">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div class="bg-white p-4 rounded-lg shadow-sm border">
                    <div class="flex items-center">
                        <div class="p-2 bg-blue-100 rounded-lg">
                            <i class="fas fa-envelope text-blue-600"></i>
                        </div>
                        <div class="ml-4">
                            <p class="text-sm font-medium text-gray-600">Total Messages</p>
                            <p class="text-xl font-semibold text-gray-900">{{ $totalMessages }}</p>
                        </div>
                    </div>
                </div>
                <div class="bg-white p-4 rounded-lg shadow-sm border">
                    <div class="flex items-center">
                        <div class="p-2 bg-green-100 rounded-lg">
                            <i class="fas fa-calendar-day text-green-600"></i>
                        </div>
                        <div class="ml-4">
                            <p class="text-sm font-medium text-gray-600">Today</p>
                            <p class="text-xl font-semibold text-gray-900">{{ $todayMessages }}</p>
                        </div>
                    </div>
                </div>
                <div class="bg-white p-4 rounded-lg shadow-sm border">
                    <div class="flex items-center">
                        <div class="p-2 bg-purple-100 rounded-lg">
                            <i class="fas fa-calendar-week text-purple-600"></i>
                        </div>
                        <div class="ml-4">
                            <p class="text-sm font-medium text-gray-600">This Week</p>
                            <p class="text-xl font-semibold text-gray-900">{{ $thisWeekMessages }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Filters -->
        <div class="p-6 bg-gray-50 border-b">
            <form method="GET" class="grid grid-cols-1 md:grid-cols-4 gap-4">
                <!-- Search -->
                <div class="md:col-span-2">
                    <input type="text" 
                           name="search" 
                           value="{{ request('search') }}" 
                           placeholder="Search messages by name, email, subject..." 
                           class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary focus:border-primary">
                </div>
                
                <!-- Date Range -->
                <div>
                    <input type="date" 
                           name="start_date" 
                           value="{{ request('start_date') }}"
                           placeholder="Start Date"
                           class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary focus:border-primary">
                </div>

                <div class="flex items-center space-x-2">
                    <input type="date" 
                           name="end_date" 
                           value="{{ request('end_date') }}"
                           placeholder="End Date"
                           class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary focus:border-primary">
                    <button type="submit" 
                            class="px-4 py-2 bg-primary text-white rounded-lg hover:bg-opacity-90 transition duration-200 whitespace-nowrap">
                        <i class="fas fa-search mr-2"></i>Filter
                    </button>
                </div>
            </form>

            <!-- Clear Filters -->
            @if(request('search') || request('start_date') || request('end_date'))
                <div class="mt-4">
                    <a href="{{ route('admin.messages.index') }}" 
                       class="text-sm text-gray-600 hover:text-gray-900">
                        <i class="fas fa-times mr-1"></i>Clear all filters
                    </a>
                </div>
            @endif
        </div>

        <div class="p-6">
            @if($messages->count() > 0)
                <div class="space-y-4">
                    @foreach($messages as $message)
                        <div class="bg-white border border-gray-200 rounded-lg hover:shadow-md transition-shadow duration-200">
                            <div class="p-6">
                                <div class="flex items-start justify-between">
                                    <div class="flex-1">
                                        <!-- Header -->
                                        <div class="flex items-center justify-between mb-3">
                                            <div class="flex items-center space-x-3">
                                                <div class="w-10 h-10 bg-blue-100 rounded-full flex items-center justify-center">
                                                    <i class="fas fa-user text-blue-600"></i>
                                                </div>
                                                <div>
                                                    <h3 class="text-lg font-semibold text-gray-900">{{ $message->name }}</h3>
                                                    <p class="text-sm text-gray-500">{{ $message->email }}</p>
                                                </div>
                                            </div>
                                            <div class="text-right">
                                                <p class="text-sm text-gray-500">{{ $message->created_at->format('M d, Y') }}</p>
                                                <p class="text-sm text-gray-500">{{ $message->created_at->format('g:i A') }}</p>
                                            </div>
                                        </div>

                                        <!-- Subject -->
                                        <div class="mb-3">
                                            <div class="inline-flex items-center px-3 py-1 bg-blue-50 text-blue-700 rounded-full text-sm font-medium">
                                                <i class="fas fa-tag mr-2"></i>{{ $message->subject }}
                                            </div>
                                        </div>

                                        <!-- Message -->
                                        <div class="bg-gray-50 rounded-lg p-4 mb-4">
                                            <p class="text-gray-800 leading-relaxed">{{ $message->message }}</p>
                                        </div>

                                        <!-- Actions -->
                                        <div class="flex items-center justify-between">
                                            <div class="flex items-center space-x-4">
                                                <a href="mailto:{{ $message->email }}" 
                                                   class="inline-flex items-center px-3 py-2 text-sm font-medium text-blue-600 bg-blue-100 rounded-lg hover:bg-blue-200 transition duration-200">
                                                    <i class="fas fa-reply mr-2"></i>Reply
                                                </a>
                                                <a href="mailto:{{ $message->email }}?subject=Re: {{ $message->subject }}&body=Hi {{ $message->name }},%0D%0A%0D%0A" 
                                                   class="inline-flex items-center px-3 py-2 text-sm font-medium text-green-600 bg-green-100 rounded-lg hover:bg-green-200 transition duration-200">
                                                    <i class="fas fa-envelope mr-2"></i>Quick Reply
                                                </a>
                                            </div>
                                            <form action="{{ route('admin.messages.destroy', $message->id) }}" 
                                                  method="POST" 
                                                  class="inline"
                                                  onsubmit="return confirm('Are you sure you want to delete this message?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" 
                                                        class="inline-flex items-center px-3 py-2 text-sm font-medium text-red-600 bg-red-100 rounded-lg hover:bg-red-200 transition duration-200">
                                                    <i class="fas fa-trash mr-2"></i>Delete
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <!-- Pagination -->
                <div class="mt-6">
                    {{ $messages->withQueryString()->links() }}
                </div>
            @else
                <div class="text-center py-12">
                    <i class="fas fa-envelope-open text-6xl text-gray-300 mb-4"></i>
                    <h3 class="text-lg font-medium text-gray-900 mb-2">No Messages Found</h3>
                    @if(request('search') || request('start_date') || request('end_date'))
                        <p class="text-gray-500 mb-6">Try adjusting your search filters.</p>
                        <a href="{{ route('admin.messages.index') }}" 
                           class="bg-primary text-white px-6 py-3 rounded-lg hover:bg-opacity-90 transition duration-200">
                            <i class="fas fa-times mr-2"></i>Clear Filters
                        </a>
                    @else
                        <p class="text-gray-500 mb-6">No contact messages have been received yet.</p>
                        <div class="text-sm text-gray-500">
                            Messages will appear here when visitors use the contact form on your website.
                        </div>
                    @endif
                </div>
            @endif
        </div>
    </div>
</div>

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Auto-submit form when date inputs change
    const dateInputs = document.querySelectorAll('input[type="date"]');
    dateInputs.forEach(input => {
        input.addEventListener('change', function() {
            // Only auto-submit if both dates are filled or both are empty
            const startDate = document.querySelector('input[name="start_date"]').value;
            const endDate = document.querySelector('input[name="end_date"]').value;
            
            if ((startDate && endDate) || (!startDate && !endDate)) {
                this.form.submit();
            }
        });
    });
});
</script>
@endpush
@endsection