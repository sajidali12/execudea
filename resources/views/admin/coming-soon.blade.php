@extends('admin.layout')

@section('title', $title)
@section('page-title', $title)

@section('content')
<div class="text-center py-12">
    <div class="max-w-md mx-auto">
        <div class="mb-8">
            <i class="fas fa-tools text-6xl text-gray-300"></i>
        </div>
        <h2 class="text-2xl font-bold text-gray-800 mb-4">{{ $title }}</h2>
        <p class="text-gray-600 mb-6">This feature is currently under development and will be available soon.</p>
        
        <div class="bg-blue-50 border border-blue-200 rounded-lg p-4 mb-6">
            <h3 class="font-semibold text-blue-800 mb-2">Coming Features:</h3>
            <ul class="text-sm text-blue-700 text-left space-y-1">
                @if($title === 'Clients Management')
                    <li>• Add and manage client information</li>
                    <li>• Track client contact details</li>
                    <li>• Monitor client project history</li>
                    <li>• Client communication logs</li>
                @elseif($title === 'Projects Management')
                    <li>• Create and track web development projects</li>
                    <li>• Monitor project progress and budgets</li>
                    <li>• Set deadlines and milestones</li>
                    <li>• Link projects to clients and invoices</li>
                @elseif($title === 'Invoices Management')
                    <li>• Generate professional invoices</li>
                    <li>• Track payment status</li>
                    <li>• Automated invoice numbering</li>
                    <li>• Payment reminders and overdue tracking</li>
                @elseif($title === 'Expenses Management')
                    <li>• Record office expenses (salary, courses, software)</li>
                    <li>• Categorize expenses by type</li>
                    <li>• Upload receipt attachments</li>
                    <li>• Track project-specific costs</li>
                @elseif($title === 'Financial Reports')
                    <li>• Monthly income vs expenses</li>
                    <li>• Profit and loss statements</li>
                    <li>• Client revenue analysis</li>
                    <li>• Expense category breakdowns</li>
                @endif
            </ul>
        </div>
        
        <a href="{{ route('admin-dashboard') }}" 
           class="bg-primary hover:bg-primary text-white px-6 py-2 rounded-lg transition duration-200">
            <i class="fas fa-arrow-left mr-2"></i>Back to Dashboard
        </a>
    </div>
</div>
@endsection