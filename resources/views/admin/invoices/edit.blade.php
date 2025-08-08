@extends('admin.layout')

@section('title', 'Edit Invoice')

@section('content')
<div class="max-w-4xl mx-auto">
    <div class="bg-white shadow rounded-lg">
        <div class="px-6 py-4 border-b border-gray-200">
            <div class="flex items-center justify-between">
                <div>
                    <h2 class="text-xl font-semibold text-gray-800">Edit Invoice</h2>
                    <p class="text-sm text-gray-600 mt-1">Update invoice {{ $invoice->invoice_number }}</p>
                </div>
                <a href="{{ route('admin.invoices.index') }}" 
                   class="bg-gray-500 text-white px-4 py-2 rounded-lg hover:bg-gray-600 transition duration-200">
                    <i class="fas fa-arrow-left mr-2"></i>Back to Invoices
                </a>
            </div>
        </div>

        <form action="{{ route('admin.invoices.update', $invoice) }}" method="POST" class="p-6">
            @csrf
            @method('PUT')
            
            <!-- Invoice Information -->
            <div class="mb-8">
                <h3 class="text-lg font-semibold text-gray-900 mb-4 flex items-center">
                    <i class="fas fa-file-invoice text-primary mr-2"></i>
                    Invoice Information
                </h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Invoice Number -->
                    <div>
                        <label for="invoice_number" class="block text-sm font-medium text-gray-700 mb-2">
                            Invoice Number
                        </label>
                        <input type="text" 
                               id="invoice_number" 
                               name="invoice_number" 
                               value="{{ old('invoice_number', $invoice->invoice_number) }}"
                               readonly
                               class="w-full px-3 py-2 border border-gray-300 bg-gray-100 rounded-lg text-gray-600">
                        <p class="text-xs text-gray-500 mt-1">Invoice number cannot be changed</p>
                    </div>

                    <!-- Client -->
                    <div>
                        <label for="client_id" class="block text-sm font-medium text-gray-700 mb-2">
                            Client <span class="text-red-500">*</span>
                        </label>
                        <select id="client_id" 
                                name="client_id" 
                                required
                                onchange="loadClientProjects(this.value)"
                                class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary focus:border-primary @error('client_id') border-red-500 @enderror">
                            <option value="">Select Client</option>
                            @foreach($clients as $client)
                                <option value="{{ $client->id }}" {{ (old('client_id', $invoice->client_id) == $client->id) ? 'selected' : '' }}>
                                    {{ $client->name }} @if($client->company) - {{ $client->company }} @endif
                                </option>
                            @endforeach
                        </select>
                        @error('client_id')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Project -->
                    <div class="md:col-span-2">
                        <label for="project_id" class="block text-sm font-medium text-gray-700 mb-2">
                            Project (Optional)
                        </label>
                        <select id="project_id" 
                                name="project_id" 
                                class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary focus:border-primary @error('project_id') border-red-500 @enderror">
                            <option value="">Select Project (Optional)</option>
                            @foreach($projects as $project)
                                <option value="{{ $project->id }}" 
                                        data-client="{{ $project->client_id }}"
                                        {{ (old('project_id', $invoice->project_id) == $project->id) ? 'selected' : '' }}>
                                    {{ $project->name }} - {{ $project->type }} ({{ $project->client->name }})
                                </option>
                            @endforeach
                        </select>
                        @error('project_id')
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
                                onchange="handleStatusChange()"
                                class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary focus:border-primary @error('status') border-red-500 @enderror">
                            <option value="draft" {{ old('status', $invoice->status) == 'draft' ? 'selected' : '' }}>Draft</option>
                            <option value="pending" {{ old('status', $invoice->status) == 'pending' ? 'selected' : '' }}>Pending</option>
                            <option value="paid" {{ old('status', $invoice->status) == 'paid' ? 'selected' : '' }}>Paid</option>
                            <option value="overdue" {{ old('status', $invoice->status) == 'overdue' ? 'selected' : '' }}>Overdue</option>
                            <option value="cancelled" {{ old('status', $invoice->status) == 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                        </select>
                        @error('status')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Paid Date (shown when status is paid) -->
                    <div id="paid_date_field" style="display: {{ old('status', $invoice->status) == 'paid' ? 'block' : 'none' }}">
                        <label for="paid_date" class="block text-sm font-medium text-gray-700 mb-2">
                            Paid Date
                        </label>
                        <input type="date" 
                               id="paid_date" 
                               name="paid_date" 
                               value="{{ old('paid_date', $invoice->paid_date?->format('Y-m-d')) }}"
                               class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary focus:border-primary @error('paid_date') border-red-500 @enderror">
                        @error('paid_date')
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
                              placeholder="Describe the services or products being invoiced..."
                              class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary focus:border-primary @error('description') border-red-500 @enderror">{{ old('description', $invoice->description) }}</textarea>
                    @error('description')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <!-- Financial Information -->
            <div class="mb-8">
                <h3 class="text-lg font-semibold text-gray-900 mb-4 flex items-center">
                    <i class="fas fa-money-bill-wave text-primary mr-2"></i>
                    Financial Details
                </h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
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
                               value="{{ old('amount', $invoice->amount) }}"
                               required
                               oninput="calculateTotal()"
                               class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary focus:border-primary @error('amount') border-red-500 @enderror">
                        @error('amount')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Tax Amount -->
                    <div>
                        <label for="tax_amount" class="block text-sm font-medium text-gray-700 mb-2">
                            Tax Amount (PKR)
                        </label>
                        <input type="number" 
                               id="tax_amount" 
                               name="tax_amount" 
                               min="0"
                               step="0.01"
                               value="{{ old('tax_amount', $invoice->tax_amount) }}"
                               oninput="calculateTotal()"
                               class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary focus:border-primary @error('tax_amount') border-red-500 @enderror">
                        @error('tax_amount')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Total Amount (Read-only) -->
                    <div class="md:col-span-2">
                        <label for="total_display" class="block text-sm font-medium text-gray-700 mb-2">
                            Total Amount (PKR)
                        </label>
                        <input type="text" 
                               id="total_display" 
                               readonly
                               class="w-full px-3 py-2 border border-gray-300 bg-gray-100 rounded-lg text-gray-900 font-semibold">
                    </div>
                </div>
            </div>

            <!-- Timeline -->
            <div class="mb-8">
                <h3 class="text-lg font-semibold text-gray-900 mb-4 flex items-center">
                    <i class="fas fa-calendar text-primary mr-2"></i>
                    Timeline
                </h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Issue Date -->
                    <div>
                        <label for="issue_date" class="block text-sm font-medium text-gray-700 mb-2">
                            Issue Date <span class="text-red-500">*</span>
                        </label>
                        <input type="date" 
                               id="issue_date" 
                               name="issue_date" 
                               value="{{ old('issue_date', $invoice->issue_date->format('Y-m-d')) }}"
                               required
                               class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary focus:border-primary @error('issue_date') border-red-500 @enderror">
                        @error('issue_date')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Due Date -->
                    <div>
                        <label for="due_date" class="block text-sm font-medium text-gray-700 mb-2">
                            Due Date <span class="text-red-500">*</span>
                        </label>
                        <input type="date" 
                               id="due_date" 
                               name="due_date" 
                               value="{{ old('due_date', $invoice->due_date->format('Y-m-d')) }}"
                               required
                               class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary focus:border-primary @error('due_date') border-red-500 @enderror">
                        @error('due_date')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>

            <!-- Additional Information -->
            <div class="mb-8">
                <h3 class="text-lg font-semibold text-gray-900 mb-4 flex items-center">
                    <i class="fas fa-info-circle text-primary mr-2"></i>
                    Additional Information
                </h3>
                <div class="grid grid-cols-1 gap-6">
                    <!-- Payment Terms -->
                    <div>
                        <label for="payment_terms" class="block text-sm font-medium text-gray-700 mb-2">
                            Payment Terms
                        </label>
                        <input type="text" 
                               id="payment_terms" 
                               name="payment_terms" 
                               value="{{ old('payment_terms', $invoice->payment_terms) }}"
                               placeholder="e.g., Net 30 days, Cash on delivery, etc."
                               class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary focus:border-primary @error('payment_terms') border-red-500 @enderror">
                        @error('payment_terms')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Notes -->
                    <div>
                        <label for="notes" class="block text-sm font-medium text-gray-700 mb-2">
                            Notes
                        </label>
                        <textarea id="notes" 
                                  name="notes" 
                                  rows="3"
                                  placeholder="Add any additional notes for this invoice..."
                                  class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary focus:border-primary @error('notes') border-red-500 @enderror">{{ old('notes', $invoice->notes) }}</textarea>
                        @error('notes')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="flex justify-end space-x-4 pt-6 border-t">
                <a href="{{ route('admin.invoices.index') }}" 
                   class="px-6 py-2 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50 transition duration-200">
                    Cancel
                </a>
                <button type="submit" 
                        class="bg-primary text-white px-6 py-2 rounded-lg hover:bg-opacity-90 transition duration-200">
                    <i class="fas fa-save mr-2"></i>Update Invoice
                </button>
            </div>
        </form>
    </div>
</div>

@push('scripts')
<script>
function loadClientProjects(clientId) {
    const projectSelect = document.getElementById('project_id');
    const options = projectSelect.getElementsByTagName('option');
    
    // Hide all project options first
    for (let i = 1; i < options.length; i++) {
        options[i].style.display = 'none';
        options[i].selected = false;
    }
    
    // Show projects for selected client
    if (clientId) {
        for (let i = 1; i < options.length; i++) {
            if (options[i].getAttribute('data-client') === clientId) {
                options[i].style.display = 'block';
            }
        }
    }
}

function calculateTotal() {
    const amount = parseFloat(document.getElementById('amount').value) || 0;
    const taxAmount = parseFloat(document.getElementById('tax_amount').value) || 0;
    const total = amount + taxAmount;
    
    document.getElementById('total_display').value = 'PKR ' + total.toLocaleString('en-US', {
        minimumFractionDigits: 2,
        maximumFractionDigits: 2
    });
}

function handleStatusChange() {
    const status = document.getElementById('status').value;
    const paidDateField = document.getElementById('paid_date_field');
    const paidDateInput = document.getElementById('paid_date');
    
    if (status === 'paid') {
        paidDateField.style.display = 'block';
        if (!paidDateInput.value) {
            paidDateInput.value = new Date().toISOString().split('T')[0];
        }
    } else {
        paidDateField.style.display = 'none';
        paidDateInput.value = '';
    }
}

// Initialize
document.addEventListener('DOMContentLoaded', function() {
    calculateTotal();
    const clientId = document.getElementById('client_id').value;
    if (clientId) {
        loadClientProjects(clientId);
    }
    handleStatusChange();
});
</script>
@endpush
@endsection