@extends('admin.layout')

@section('title', 'Financial Reports')

@section('content')
<div class="max-w-7xl mx-auto">
    <!-- Header -->
    <div class="bg-white shadow rounded-lg mb-6">
        <div class="px-6 py-4 border-b border-gray-200">
            <div class="flex justify-between items-center">
                <div>
                    <h2 class="text-xl font-semibold text-gray-800">Financial Reports</h2>
                    <p class="text-sm text-gray-600 mt-1">Comprehensive financial analysis and insights</p>
                </div>
                <div class="flex items-center space-x-4">
                    <form action="{{ route('admin.reports.export') }}" method="POST" class="inline">
                        @csrf
                        <button type="submit" 
                                class="bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700 transition duration-200">
                            <i class="fas fa-download mr-2"></i>Export Report
                        </button>
                    </form>
                </div>
            </div>
        </div>

        <!-- Date Range Filter -->
        <div class="p-6 bg-gray-50">
            <form method="GET" class="flex items-center space-x-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Start Date</label>
                    <input type="date" 
                           name="start_date" 
                           value="{{ request('start_date', $startDate->format('Y-m-d')) }}"
                           class="px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary focus:border-primary">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">End Date</label>
                    <input type="date" 
                           name="end_date" 
                           value="{{ request('end_date', $endDate->format('Y-m-d')) }}"
                           class="px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary focus:border-primary">
                </div>
                <div class="pt-6">
                    <button type="submit" 
                            class="px-4 py-2 bg-primary text-white rounded-lg hover:bg-opacity-90 transition duration-200">
                        <i class="fas fa-filter mr-2"></i>Apply Filter
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Key Metrics -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-6 mb-6">
        <!-- Total Revenue -->
        <div class="bg-white p-6 rounded-lg shadow border-l-4 border-blue-500">
            <div class="flex items-center">
                <div class="p-2 bg-blue-100 rounded-lg">
                    <i class="fas fa-chart-line text-blue-600 text-xl"></i>
                </div>
                <div class="ml-4">
                    <p class="text-sm font-medium text-gray-600">Total Revenue</p>
                    <p class="text-2xl font-bold text-gray-900">PKR {{ number_format($totalRevenue, 2) }}</p>
                </div>
            </div>
        </div>

        <!-- Total Expenses -->
        <div class="bg-white p-6 rounded-lg shadow border-l-4 border-red-500">
            <div class="flex items-center">
                <div class="p-2 bg-red-100 rounded-lg">
                    <i class="fas fa-receipt text-red-600 text-xl"></i>
                </div>
                <div class="ml-4">
                    <p class="text-sm font-medium text-gray-600">Total Expenses</p>
                    <p class="text-2xl font-bold text-gray-900">PKR {{ number_format($totalExpensesWithSalaries, 2) }}</p>
                    <p class="text-xs text-gray-500">Including team salaries</p>
                </div>
            </div>
        </div>

        <!-- Net Profit -->
        <div class="bg-white p-6 rounded-lg shadow border-l-4 {{ $netProfit >= 0 ? 'border-green-500' : 'border-red-500' }}">
            <div class="flex items-center">
                <div class="p-2 {{ $netProfit >= 0 ? 'bg-green-100' : 'bg-red-100' }} rounded-lg">
                    <i class="fas fa-{{ $netProfit >= 0 ? 'arrow-up' : 'arrow-down' }} {{ $netProfit >= 0 ? 'text-green-600' : 'text-red-600' }} text-xl"></i>
                </div>
                <div class="ml-4">
                    <p class="text-sm font-medium text-gray-600">Net Profit</p>
                    <p class="text-2xl font-bold {{ $netProfit >= 0 ? 'text-green-900' : 'text-red-900' }}">
                        PKR {{ number_format(abs($netProfit), 2) }}
                    </p>
                </div>
            </div>
        </div>

        <!-- Paid Revenue -->
        <div class="bg-white p-6 rounded-lg shadow border-l-4 border-green-500">
            <div class="flex items-center">
                <div class="p-2 bg-green-100 rounded-lg">
                    <i class="fas fa-check-circle text-green-600 text-xl"></i>
                </div>
                <div class="ml-4">
                    <p class="text-sm font-medium text-gray-600">Paid Revenue</p>
                    <p class="text-2xl font-bold text-gray-900">PKR {{ number_format($paidRevenue, 2) }}</p>
                </div>
            </div>
        </div>

        <!-- Team Salaries -->
        <div class="bg-white p-6 rounded-lg shadow border-l-4 border-purple-500">
            <div class="flex items-center">
                <div class="p-2 bg-purple-100 rounded-lg">
                    <i class="fas fa-users text-purple-600 text-xl"></i>
                </div>
                <div class="ml-4">
                    <p class="text-sm font-medium text-gray-600">Team Salaries</p>
                    <p class="text-2xl font-bold text-gray-900">PKR {{ number_format($totalTeamSalaryCost, 2) }}</p>
                    <p class="text-xs text-gray-500">{{ $monthsInRange }} month{{ $monthsInRange > 1 ? 's' : '' }}</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Charts Row -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-6">
        <!-- Revenue vs Expenses Trend -->
        <div class="bg-white shadow rounded-lg">
            <div class="px-6 py-4 border-b border-gray-200">
                <h3 class="text-lg font-semibold text-gray-800">Revenue vs Expenses (Last 12 Months)</h3>
            </div>
            <div class="p-6">
                <div class="h-64 flex items-end justify-between space-x-1">
                    @foreach($monthlyRevenue->take(6) as $month)
                        @php
                            $maxValue = max($monthlyRevenue->max('revenue'), $monthlyExpenses->max('expenses'));
                            $revenueHeight = ($month['revenue'] / ($maxValue ?: 1)) * 200;
                            $expenseHeight = (($monthlyExpenses->where('period', $month['period'])->first()['expenses'] ?? 0) / ($maxValue ?: 1)) * 200;
                        @endphp
                        <div class="flex flex-col items-center flex-1">
                            <div class="w-full flex items-end justify-center space-x-1 h-52">
                                <!-- Revenue Bar -->
                                <div class="w-1/2 bg-green-500 rounded-t hover:bg-green-600 transition-colors relative group" 
                                     style="height: {{ $revenueHeight }}px; min-height: 4px;">
                                    <div class="opacity-0 group-hover:opacity-100 absolute -top-8 left-1/2 transform -translate-x-1/2 bg-gray-800 text-white text-xs px-2 py-1 rounded">
                                        PKR {{ number_format($month['revenue'], 0) }}
                                    </div>
                                </div>
                                <!-- Expenses Bar -->
                                <div class="w-1/2 bg-red-500 rounded-t hover:bg-red-600 transition-colors relative group" 
                                     style="height: {{ $expenseHeight }}px; min-height: 4px;">
                                    <div class="opacity-0 group-hover:opacity-100 absolute -top-8 left-1/2 transform -translate-x-1/2 bg-gray-800 text-white text-xs px-2 py-1 rounded">
                                        PKR {{ number_format($monthlyExpenses->where('period', $month['period'])->first()['expenses'] ?? 0, 0) }}
                                    </div>
                                </div>
                            </div>
                            <span class="text-xs text-gray-500 mt-2">{{ $month['period'] }}</span>
                        </div>
                    @endforeach
                </div>
                <div class="flex justify-center mt-4 space-x-4">
                    <div class="flex items-center">
                        <div class="w-3 h-3 bg-green-500 rounded mr-2"></div>
                        <span class="text-sm text-gray-600">Revenue</span>
                    </div>
                    <div class="flex items-center">
                        <div class="w-3 h-3 bg-red-500 rounded mr-2"></div>
                        <span class="text-sm text-gray-600">Expenses</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Invoice Status Distribution -->
        <div class="bg-white shadow rounded-lg">
            <div class="px-6 py-4 border-b border-gray-200">
                <h3 class="text-lg font-semibold text-gray-800">Invoice Status Distribution</h3>
            </div>
            <div class="p-6">
                <div class="space-y-4">
                    @foreach($invoiceStatusStats as $status)
                        <div class="flex items-center justify-between">
                            <div class="flex items-center">
                                <span class="inline-flex px-2 py-1 text-xs font-semibold rounded-full 
                                    @if($status->status === 'paid') bg-green-100 text-green-800
                                    @elseif($status->status === 'pending') bg-yellow-100 text-yellow-800
                                    @else bg-gray-100 text-gray-800 @endif">
                                    {{ ucfirst($status->status) }}
                                </span>
                                <span class="ml-3 text-sm text-gray-600">{{ $status->count }} invoices</span>
                            </div>
                            <span class="text-sm font-medium text-gray-900">PKR {{ number_format($status->total, 2) }}</span>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <!-- Tables Row -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-6">
        <!-- Top Expense Categories -->
        <div class="bg-white shadow rounded-lg">
            <div class="px-6 py-4 border-b border-gray-200">
                <h3 class="text-lg font-semibold text-gray-800">Top Expense Categories</h3>
            </div>
            <div class="p-6">
                <div class="space-y-3">
                    @forelse($topExpenseCategories as $index => $category)
                        <div class="flex items-center justify-between">
                            <div class="flex items-center">
                                @if($category->category === 'Team Salaries')
                                    <div class="w-3 h-3 bg-purple-500 rounded-full mr-3"></div>
                                @else
                                    <div class="w-3 h-3 bg-red-500 rounded-full mr-3"></div>
                                @endif
                                <span class="text-sm text-gray-700">{{ $category->category }}</span>
                            </div>
                            <span class="text-sm font-medium text-gray-900">PKR {{ number_format($category->total, 2) }}</span>
                        </div>
                    @empty
                        <p class="text-gray-500 text-center py-4">No expense data available</p>
                    @endforelse
                </div>
            </div>
        </div>

        <!-- Revenue by Client -->
        <div class="bg-white shadow rounded-lg">
            <div class="px-6 py-4 border-b border-gray-200">
                <h3 class="text-lg font-semibold text-gray-800">Top Revenue Clients</h3>
            </div>
            <div class="p-6">
                <div class="space-y-3">
                    @forelse($revenueByClient as $clientRevenue)
                        <div class="flex items-center justify-between">
                            <div class="flex items-center">
                                <div class="w-3 h-3 bg-blue-400 rounded-full mr-3"></div>
                                <span class="text-sm text-gray-700">{{ $clientRevenue->client->name ?? 'Unknown Client' }}</span>
                            </div>
                            <span class="text-sm font-medium text-gray-900">PKR {{ number_format($clientRevenue->total, 2) }}</span>
                        </div>
                    @empty
                        <p class="text-gray-500 text-center py-4">No revenue data available</p>
                    @endforelse
                </div>
            </div>
        </div>
    </div>

    <!-- Detailed Breakdown -->
    <div class="bg-white shadow rounded-lg">
        <div class="px-6 py-4 border-b border-gray-200">
            <h3 class="text-lg font-semibold text-gray-800">Financial Summary</h3>
        </div>
        <div class="p-6">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Revenue Breakdown -->
                <div>
                    <h4 class="font-medium text-gray-900 mb-4">Revenue Breakdown</h4>
                    <div class="space-y-3">
                        <div class="flex justify-between">
                            <span class="text-sm text-gray-600">Total Revenue:</span>
                            <span class="text-sm font-medium text-gray-900">PKR {{ number_format($totalRevenue, 2) }}</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-sm text-gray-600">Paid Revenue:</span>
                            <span class="text-sm font-medium text-green-600">PKR {{ number_format($paidRevenue, 2) }}</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-sm text-gray-600">Pending Revenue:</span>
                            <span class="text-sm font-medium text-yellow-600">PKR {{ number_format($pendingRevenue, 2) }}</span>
                        </div>
                    </div>
                </div>

                <!-- Expenses Breakdown -->
                <div>
                    <h4 class="font-medium text-gray-900 mb-4">Expenses Breakdown</h4>
                    <div class="space-y-3">
                        <div class="flex justify-between">
                            <span class="text-sm text-gray-600">Regular Expenses:</span>
                            <span class="text-sm font-medium text-gray-900">PKR {{ number_format($totalExpenses, 2) }}</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-sm text-gray-600">Team Salaries ({{ $monthsInRange }} month{{ $monthsInRange > 1 ? 's' : '' }}):</span>
                            <span class="text-sm font-medium text-purple-600">PKR {{ number_format($totalTeamSalaryCost, 2) }}</span>
                        </div>
                        <div class="flex justify-between border-t pt-2">
                            <span class="text-sm font-medium text-gray-900">Total Expenses:</span>
                            <span class="text-sm font-bold text-gray-900">PKR {{ number_format($totalExpensesWithSalaries, 2) }}</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-sm text-gray-600">Paid (Regular):</span>
                            <span class="text-sm font-medium text-red-600">PKR {{ number_format($paidExpenses, 2) }}</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-sm text-gray-600">Pending (Regular):</span>
                            <span class="text-sm font-medium text-yellow-600">PKR {{ number_format($pendingExpenses, 2) }}</span>
                        </div>
                    </div>
                </div>

                <!-- Profit Analysis -->
                <div>
                    <h4 class="font-medium text-gray-900 mb-4">Profit Analysis</h4>
                    <div class="space-y-3">
                        <div class="flex justify-between">
                            <span class="text-sm text-gray-600">Gross Profit:</span>
                            <span class="text-sm font-medium {{ $netProfit >= 0 ? 'text-green-600' : 'text-red-600' }}">
                                PKR {{ number_format($netProfit, 2) }}
                            </span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-sm text-gray-600">Profit Margin:</span>
                            <span class="text-sm font-medium {{ ($totalRevenue > 0 && ($netProfit / $totalRevenue) >= 0.1) ? 'text-green-600' : 'text-red-600' }}">
                                {{ $totalRevenue > 0 ? number_format(($netProfit / $totalRevenue) * 100, 1) : 0 }}%
                            </span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-sm text-gray-600">Expense Ratio:</span>
                            <span class="text-sm font-medium text-gray-900">
                                {{ $totalRevenue > 0 ? number_format(($totalExpenses / $totalRevenue) * 100, 1) : 0 }}%
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Add any interactive chart functionality here if needed
    console.log('Financial Reports loaded');
});
</script>
@endpush