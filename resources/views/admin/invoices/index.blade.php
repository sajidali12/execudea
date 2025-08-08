@extends('admin.layout')

@section('title', 'Invoices Management')

@section('content')
<div class="max-w-7xl mx-auto">
    <div class="bg-white shadow rounded-lg">
        <div class="px-6 py-4 border-b border-gray-200">
            <div class="flex justify-between items-center">
                <div>
                    <h2 class="text-xl font-semibold text-gray-800">Invoices Management</h2>
                    <p class="text-sm text-gray-600 mt-1">Manage client invoices and payments</p>
                </div>
                <div class="flex items-center space-x-4">
                    <div class="text-sm text-gray-600">
                        Total: <span class="font-semibold">{{ $invoices->total() }}</span> invoices
                    </div>
                    <a href="{{ route('admin.invoices.create') }}" 
                       class="bg-primary text-white px-4 py-2 rounded-lg hover:bg-opacity-90 transition duration-200">
                        <i class="fas fa-plus mr-2"></i>Create Invoice
                    </a>
                </div>
            </div>
        </div>

        <!-- Filters -->
        <div class="p-6 bg-gray-50 border-b">
            <form method="GET" class="flex flex-col sm:flex-row gap-4">
                <!-- Search -->
                <div class="flex-1">
                    <input type="text" 
                           name="search" 
                           value="{{ request('search') }}" 
                           placeholder="Search by invoice number, description, or client..." 
                           class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary focus:border-primary">
                </div>
                
                <!-- Status Filter -->
                <div class="sm:w-48">
                    <select name="status" 
                            class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary focus:border-primary">
                        <option value="">All Status</option>
                        <option value="draft" {{ request('status') == 'draft' ? 'selected' : '' }}>Draft</option>
                        <option value="pending" {{ request('status') == 'pending' ? 'selected' : '' }}>Pending</option>
                        <option value="paid" {{ request('status') == 'paid' ? 'selected' : '' }}>Paid</option>
                        <option value="overdue" {{ request('status') == 'overdue' ? 'selected' : '' }}>Overdue</option>
                        <option value="cancelled" {{ request('status') == 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                    </select>
                </div>

                <!-- Client Filter -->
                <div class="sm:w-56">
                    <select name="client_id" 
                            class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary focus:border-primary">
                        <option value="">All Clients</option>
                        @foreach($clients as $client)
                            <option value="{{ $client->id }}" {{ request('client_id') == $client->id ? 'selected' : '' }}>
                                {{ $client->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                
                <!-- Filter Button -->
                <button type="submit" 
                        class="px-4 py-2 bg-primary text-white rounded-lg hover:bg-opacity-90 transition duration-200">
                    <i class="fas fa-search mr-2"></i>Filter
                </button>
                
                <!-- Clear Filters -->
                @if(request('search') || request('status') || request('client_id'))
                    <a href="{{ route('admin.invoices.index') }}" 
                       class="px-4 py-2 bg-gray-500 text-white rounded-lg hover:bg-gray-600 transition duration-200">
                        <i class="fas fa-times mr-2"></i>Clear
                    </a>
                @endif
            </form>
        </div>

        <div class="p-6">
            @if($invoices->count() > 0)
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Invoice Details
                                </th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Client
                                </th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Project
                                </th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Amount
                                </th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Status
                                </th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Due Date
                                </th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Actions
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach($invoices as $invoice)
                                <tr class="hover:bg-gray-50">
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div>
                                            <div class="text-sm font-medium text-gray-900">{{ $invoice->invoice_number }}</div>
                                            <div class="text-sm text-gray-500">{{ $invoice->issue_date->format('M d, Y') }}</div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm font-medium text-gray-900">{{ $invoice->client->name }}</div>
                                        <div class="text-sm text-gray-500">{{ $invoice->client->email }}</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        @if($invoice->project)
                                            <div class="text-sm font-medium text-gray-900">{{ $invoice->project->name }}</div>
                                            <div class="text-sm text-gray-500">{{ $invoice->project->type }}</div>
                                        @else
                                            <span class="text-gray-400">No project</span>
                                        @endif
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm font-medium text-gray-900">PKR {{ number_format($invoice->total_amount) }}</div>
                                        @if($invoice->tax_amount > 0)
                                            <div class="text-sm text-gray-500">
                                                PKR {{ number_format($invoice->amount) }} + {{ number_format($invoice->tax_amount) }} tax
                                            </div>
                                        @endif
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <span class="inline-flex px-2 py-1 text-xs font-semibold rounded-full 
                                            @if($invoice->status === 'paid') bg-green-100 text-green-800
                                            @elseif($invoice->status === 'pending') bg-yellow-100 text-yellow-800
                                            @elseif($invoice->status === 'overdue') bg-red-100 text-red-800
                                            @elseif($invoice->status === 'draft') bg-gray-100 text-gray-800
                                            @else bg-gray-100 text-gray-800 @endif">
                                            {{ ucfirst($invoice->status) }}
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-900">{{ $invoice->due_date->format('M d, Y') }}</div>
                                        @if($invoice->is_overdue)
                                            <div class="text-xs text-red-600">Overdue</div>
                                        @endif
                                        @if($invoice->paid_date)
                                            <div class="text-xs text-green-600">Paid: {{ $invoice->paid_date->format('M d') }}</div>
                                        @endif
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium space-x-2">
                                        <a href="{{ route('admin.invoices.show', $invoice) }}" 
                                           class="text-blue-600 hover:text-blue-900" 
                                           title="View Invoice">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        <a href="{{ route('admin.invoices.pdf.download', $invoice) }}" 
                                           class="text-green-600 hover:text-green-900"
                                           title="Download PDF">
                                            <i class="fas fa-download"></i>
                                        </a>
                                        <a href="{{ route('admin.invoices.pdf.view', $invoice) }}" 
                                           target="_blank"
                                           class="text-purple-600 hover:text-purple-900"
                                           title="View PDF">
                                            <i class="fas fa-file-pdf"></i>
                                        </a>
                                        <a href="{{ route('admin.invoices.edit', $invoice) }}" 
                                           class="text-indigo-600 hover:text-indigo-900"
                                           title="Edit Invoice">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <form action="{{ route('admin.invoices.destroy', $invoice) }}" 
                                              method="POST" 
                                              class="inline"
                                              onsubmit="return confirm('Are you sure you want to delete this invoice?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" 
                                                    class="text-red-600 hover:text-red-900"
                                                    title="Delete Invoice">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <!-- Pagination -->
                <div class="mt-6">
                    {{ $invoices->withQueryString()->links() }}
                </div>
            @else
                <div class="text-center py-12">
                    <i class="fas fa-file-invoice-dollar text-6xl text-gray-300 mb-4"></i>
                    <h3 class="text-lg font-medium text-gray-900 mb-2">No Invoices Found</h3>
                    @if(request('search') || request('status') || request('client_id'))
                        <p class="text-gray-500 mb-6">Try adjusting your search filters.</p>
                        <a href="{{ route('admin.invoices.index') }}" 
                           class="bg-primary text-white px-6 py-3 rounded-lg hover:bg-opacity-90 transition duration-200">
                            <i class="fas fa-times mr-2"></i>Clear Filters
                        </a>
                    @else
                        <p class="text-gray-500 mb-6">No invoices have been created yet.</p>
                        <a href="{{ route('admin.invoices.create') }}" 
                           class="bg-primary text-white px-6 py-3 rounded-lg hover:bg-opacity-90 transition duration-200">
                            <i class="fas fa-plus mr-2"></i>Create First Invoice
                        </a>
                    @endif
                </div>
            @endif
        </div>
    </div>
</div>

@push('scripts')
<script>
document.querySelector('select[name="status"]').addEventListener('change', function() {
    this.form.submit();
});

document.querySelector('select[name="client_id"]').addEventListener('change', function() {
    this.form.submit();
});
</script>
@endpush
@endsection