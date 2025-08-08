@extends('admin.layout')

@section('title', 'Invoice Details')

@section('content')
<div class="max-w-6xl mx-auto">
    <div class="bg-white shadow rounded-lg">
        <!-- Header -->
        <div class="px-6 py-4 border-b border-gray-200">
            <div class="flex items-center justify-between">
                <div>
                    <h2 class="text-xl font-semibold text-gray-800">{{ $invoice->invoice_number }}</h2>
                    <p class="text-sm text-gray-600 mt-1">Invoice for {{ $invoice->client->name }}</p>
                </div>
                <div class="flex space-x-2">
                    <a href="{{ route('admin.invoices.pdf.download', $invoice) }}" 
                       class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-lg transition duration-200 font-medium">
                        <i class="fas fa-download mr-2"></i>Download PDF
                    </a>
                    <a href="{{ route('admin.invoices.pdf.view', $invoice) }}" 
                       target="_blank"
                       class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg transition duration-200 font-medium">
                        <i class="fas fa-eye mr-2"></i>View PDF
                    </a>
                    <a href="{{ route('admin.invoices.edit', $invoice) }}" 
                       class="bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2 rounded-lg transition duration-200 font-medium">
                        <i class="fas fa-edit mr-2"></i>Edit Invoice
                    </a>
                    <a href="{{ route('admin.invoices.index') }}" 
                       class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded-lg transition duration-200 font-medium">
                        <i class="fas fa-arrow-left mr-2"></i>Back to Invoices
                    </a>
                </div>
            </div>
        </div>

        <div class="p-6">
            <!-- Invoice Overview -->
            <div class="grid grid-cols-1 lg:grid-cols-4 gap-6 mb-8">
                <!-- Status Card -->
                <div class="bg-gray-50 p-4 rounded-lg">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm font-medium text-gray-600">Status</p>
                            <span class="inline-flex px-3 py-1 text-sm font-semibold rounded-full mt-1
                                @if($invoice->status === 'paid') bg-green-100 text-green-800
                                @elseif($invoice->status === 'pending') bg-yellow-100 text-yellow-800
                                @elseif($invoice->status === 'overdue') bg-red-100 text-red-800
                                @elseif($invoice->status === 'draft') bg-gray-100 text-gray-800
                                @else bg-gray-100 text-gray-800 @endif">
                                {{ ucfirst($invoice->status) }}
                            </span>
                        </div>
                        <i class="fas fa-flag text-2xl text-gray-400"></i>
                    </div>
                </div>

                <!-- Amount Card -->
                <div class="bg-gray-50 p-4 rounded-lg">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm font-medium text-gray-600">Amount</p>
                            <p class="text-lg font-semibold text-gray-900 mt-1">PKR {{ number_format($invoice->amount) }}</p>
                        </div>
                        <i class="fas fa-money-bill text-2xl text-gray-400"></i>
                    </div>
                </div>

                <!-- Tax Card -->
                <div class="bg-gray-50 p-4 rounded-lg">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm font-medium text-gray-600">Tax</p>
                            <p class="text-lg font-semibold text-gray-900 mt-1">PKR {{ number_format($invoice->tax_amount) }}</p>
                        </div>
                        <i class="fas fa-percentage text-2xl text-gray-400"></i>
                    </div>
                </div>

                <!-- Total Card -->
                <div class="bg-primary/10 p-4 rounded-lg border border-primary/20">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm font-medium text-primary">Total Amount</p>
                            <p class="text-lg font-bold text-primary mt-1">PKR {{ number_format($invoice->total_amount) }}</p>
                        </div>
                        <i class="fas fa-calculator text-2xl text-primary/60"></i>
                    </div>
                </div>
            </div>

            <!-- Quick Actions -->
            <div class="mb-8 p-4 bg-gradient-to-r from-blue-50 to-green-50 rounded-lg border border-blue-200">
                <div class="flex items-center justify-between">
                    <div>
                        <h3 class="text-lg font-semibold text-gray-900 mb-1">Invoice Actions</h3>
                        <p class="text-sm text-gray-600">Download or view this invoice as PDF</p>
                    </div>
                    <div class="flex space-x-3">
                        <a href="{{ route('admin.invoices.pdf.download', $invoice) }}" 
                           class="bg-primary hover:bg-green-700 text-white px-6 py-3 rounded-lg transition duration-200 shadow-md font-medium">
                            <i class="fas fa-download mr-2"></i>Download PDF
                        </a>
                        <a href="{{ route('admin.invoices.pdf.view', $invoice) }}" 
                           target="_blank"
                           class="bg-blue-600 bg-primary hover:bg-blue-700 text-white px-6 py-3 rounded-lg transition duration-200 shadow-md font-medium">
                            <i class="fas fa-file-pdf mr-2"></i>View PDF
                        </a>
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                <!-- Invoice Details -->
                <div>
                    <h3 class="text-lg font-semibold text-gray-900 mb-4 flex items-center">
                        <i class="fas fa-info-circle text-primary mr-2"></i>
                        Invoice Details
                    </h3>
                    
                    <div class="space-y-4">
                        <!-- Client Information -->
                        <div class="flex items-start">
                            <div class="flex-shrink-0 w-28">
                                <p class="text-sm font-medium text-gray-600">Billed To:</p>
                            </div>
                            <div>
                                <p class="text-sm text-gray-900 font-medium">{{ $invoice->client->name }}</p>
                                @if($invoice->client->company)
                                    <p class="text-sm text-gray-600">{{ $invoice->client->company }}</p>
                                @endif
                                <p class="text-sm text-gray-600">{{ $invoice->client->email }}</p>
                                @if($invoice->client->phone)
                                    <p class="text-sm text-gray-600">{{ $invoice->client->phone }}</p>
                                @endif
                                @if($invoice->client->address)
                                    <p class="text-sm text-gray-600">{{ $invoice->client->address }}</p>
                                @endif
                            </div>
                        </div>

                        <!-- Project Information -->
                        @if($invoice->project)
                        <div class="flex items-start">
                            <div class="flex-shrink-0 w-28">
                                <p class="text-sm font-medium text-gray-600">Project:</p>
                            </div>
                            <div>
                                <p class="text-sm text-gray-900 font-medium">{{ $invoice->project->name }}</p>
                                <p class="text-sm text-gray-600">{{ $invoice->project->type }}</p>
                                <a href="{{ route('admin.projects.show', $invoice->project) }}" 
                                   class="text-sm text-primary hover:text-primary/80">
                                    View Project Details <i class="fas fa-external-link-alt ml-1"></i>
                                </a>
                            </div>
                        </div>
                        @endif

                        <!-- Timeline -->
                        <div class="flex items-start">
                            <div class="flex-shrink-0 w-28">
                                <p class="text-sm font-medium text-gray-600">Timeline:</p>
                            </div>
                            <div>
                                <p class="text-sm text-gray-900">Issue Date: {{ $invoice->issue_date->format('M d, Y') }}</p>
                                <p class="text-sm text-gray-900">Due Date: {{ $invoice->due_date->format('M d, Y') }}</p>
                                @if($invoice->paid_date)
                                    <p class="text-sm text-green-600">Paid Date: {{ $invoice->paid_date->format('M d, Y') }}</p>
                                @elseif($invoice->is_overdue)
                                    <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-red-100 text-red-800 mt-1">
                                        <i class="fas fa-exclamation-triangle mr-1"></i>
                                        {{ $invoice->due_date->diffForHumans() }}
                                    </span>
                                @endif
                            </div>
                        </div>

                        <!-- Payment Terms -->
                        @if($invoice->payment_terms)
                        <div class="flex items-start">
                            <div class="flex-shrink-0 w-28">
                                <p class="text-sm font-medium text-gray-600">Terms:</p>
                            </div>
                            <div>
                                <p class="text-sm text-gray-900">{{ $invoice->payment_terms }}</p>
                            </div>
                        </div>
                        @endif

                        <!-- Created/Updated -->
                        <div class="flex items-start">
                            <div class="flex-shrink-0 w-28">
                                <p class="text-sm font-medium text-gray-600">Created:</p>
                            </div>
                            <div>
                                <p class="text-sm text-gray-900">{{ $invoice->created_at->format('M d, Y g:i A') }}</p>
                                @if($invoice->updated_at->ne($invoice->created_at))
                                    <p class="text-sm text-gray-500">Updated: {{ $invoice->updated_at->format('M d, Y g:i A') }}</p>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Description and Notes -->
                <div>
                    @if($invoice->description)
                    <div class="mb-6">
                        <h3 class="text-lg font-semibold text-gray-900 mb-4 flex items-center">
                            <i class="fas fa-file-alt text-primary mr-2"></i>
                            Description
                        </h3>
                        <div class="bg-gray-50 p-4 rounded-lg">
                            <p class="text-sm text-gray-700 whitespace-pre-wrap">{{ $invoice->description }}</p>
                        </div>
                    </div>
                    @endif

                    @if($invoice->notes)
                    <div>
                        <h3 class="text-lg font-semibold text-gray-900 mb-4 flex items-center">
                            <i class="fas fa-sticky-note text-primary mr-2"></i>
                            Notes
                        </h3>
                        <div class="bg-gray-50 p-4 rounded-lg">
                            <p class="text-sm text-gray-700 whitespace-pre-wrap">{{ $invoice->notes }}</p>
                        </div>
                    </div>
                    @endif

                    <!-- Financial Breakdown -->
                    <div class="mt-6">
                        <h3 class="text-lg font-semibold text-gray-900 mb-4 flex items-center">
                            <i class="fas fa-calculator text-primary mr-2"></i>
                            Financial Breakdown
                        </h3>
                        <div class="bg-gray-50 p-4 rounded-lg space-y-2">
                            <div class="flex justify-between text-sm">
                                <span class="text-gray-600">Subtotal:</span>
                                <span class="text-gray-900 font-medium">PKR {{ number_format($invoice->amount) }}</span>
                            </div>
                            @if($invoice->tax_amount > 0)
                            <div class="flex justify-between text-sm">
                                <span class="text-gray-600">Tax:</span>
                                <span class="text-gray-900 font-medium">PKR {{ number_format($invoice->tax_amount) }}</span>
                            </div>
                            @endif
                            <hr class="border-gray-300">
                            <div class="flex justify-between text-base font-semibold">
                                <span class="text-gray-900">Total:</span>
                                <span class="text-primary">PKR {{ number_format($invoice->total_amount) }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Action Buttons -->
            <div class="mt-8 pt-6 border-t border-gray-200 flex justify-between items-center">
                <div class="flex space-x-2">
                    @if($invoice->status !== 'paid')
                    <form action="{{ route('admin.invoices.update', $invoice) }}" 
                          method="POST" 
                          class="inline"
                          onsubmit="return confirm('Are you sure you want to mark this invoice as paid?')">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="status" value="paid">
                        <input type="hidden" name="paid_date" value="{{ date('Y-m-d') }}">
                        <input type="hidden" name="client_id" value="{{ $invoice->client_id }}">
                        <input type="hidden" name="project_id" value="{{ $invoice->project_id }}">
                        <input type="hidden" name="amount" value="{{ $invoice->amount }}">
                        <input type="hidden" name="tax_amount" value="{{ $invoice->tax_amount }}">
                        <input type="hidden" name="issue_date" value="{{ $invoice->issue_date->format('Y-m-d') }}">
                        <input type="hidden" name="due_date" value="{{ $invoice->due_date->format('Y-m-d') }}">
                        <input type="hidden" name="description" value="{{ $invoice->description }}">
                        <input type="hidden" name="payment_terms" value="{{ $invoice->payment_terms }}">
                        <input type="hidden" name="notes" value="{{ $invoice->notes }}">
                        <button type="submit" 
                                class="bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700 transition duration-200">
                            <i class="fas fa-check-circle mr-2"></i>Mark as Paid
                        </button>
                    </form>
                    @endif

                    @if($invoice->project)
                    <a href="{{ route('admin.projects.show', $invoice->project) }}" 
                       class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition duration-200">
                        <i class="fas fa-project-diagram mr-2"></i>View Project
                    </a>
                    @endif
                </div>

                <div class="flex space-x-2">
                    <a href="{{ route('admin.invoices.pdf.download', $invoice) }}" 
                       class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-lg transition duration-200 font-medium">
                        <i class="fas fa-download mr-2"></i>Download PDF
                    </a>
                    
                    <a href="{{ route('admin.invoices.pdf.view', $invoice) }}" 
                       target="_blank"
                       class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg transition duration-200 font-medium">
                        <i class="fas fa-file-pdf mr-2"></i>View PDF
                    </a>

                    <button type="button" 
                            onclick="window.print()" 
                            class="bg-gray-600 hover:bg-gray-700 text-white px-4 py-2 rounded-lg transition duration-200 font-medium">
                        <i class="fas fa-print mr-2"></i>Print Page
                    </button>

                    <form action="{{ route('admin.invoices.destroy', $invoice) }}" 
                          method="POST" 
                          class="inline"
                          onsubmit="return confirm('Are you sure you want to delete this invoice? This action cannot be undone.')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" 
                                class="bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded-lg transition duration-200 font-medium">
                            <i class="fas fa-trash mr-2"></i>Delete
                        </button>
                    </form>
                </div>
            </div>

            <!-- Status History (if needed) -->
            @if($invoice->status_history ?? false)
            <div class="mt-8 pt-8 border-t border-gray-200">
                <h3 class="text-lg font-semibold text-gray-900 mb-4 flex items-center">
                    <i class="fas fa-history text-primary mr-2"></i>
                    Status History
                </h3>
                <!-- Status history implementation would go here -->
            </div>
            @endif
        </div>
    </div>
</div>

@push('styles')
<style>
@media print {
    body * {
        visibility: hidden;
    }
    .max-w-6xl, .max-w-6xl * {
        visibility: visible;
    }
    .max-w-6xl {
        position: absolute;
        left: 0;
        top: 0;
        width: 100% !important;
    }
    /* Hide navigation and action buttons when printing */
    .bg-gray-500, .bg-indigo-600, .bg-red-600, .bg-green-600, .bg-blue-600, .bg-gray-600 {
        display: none !important;
    }
}
</style>
@endpush
@endsection