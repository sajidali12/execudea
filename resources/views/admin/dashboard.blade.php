@extends('admin.layout')

@section('title', 'Admin Dashboard')
@section('page-title', 'Dashboard')

@section('content')
<!-- Key Statistics -->
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
    <!-- Total Clients -->
    <div class="bg-white rounded-lg shadow-sm p-6 border-l-4 border-blue-500">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-sm font-medium text-gray-600">Total Clients</p>
                <p class="text-2xl font-bold text-gray-900">{{ $stats['clients'] }}</p>
                <p class="text-xs text-gray-500 mt-1">Active business clients</p>
            </div>
            <div class="bg-blue-100 p-3 rounded-full">
                <i class="fas fa-users text-blue-500 text-xl"></i>
            </div>
        </div>
    </div>

    <!-- Active Projects -->
    <div class="bg-white rounded-lg shadow-sm p-6 border-l-4 border-green-500">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-sm font-medium text-gray-600">Active Projects</p>
                <p class="text-2xl font-bold text-gray-900">{{ $stats['active_projects'] }}</p>
                <p class="text-xs text-gray-500 mt-1">Currently ongoing</p>
            </div>
            <div class="bg-green-100 p-3 rounded-full">
                <i class="fas fa-project-diagram text-green-500 text-xl"></i>
            </div>
        </div>
    </div>

    <!-- Monthly Revenue -->
    <div class="bg-white rounded-lg shadow-sm p-6 border-l-4 border-primary">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-sm font-medium text-gray-600">Monthly Revenue</p>
                <p class="text-2xl font-bold text-gray-900">PKR {{ number_format($stats['monthly_revenue'], 2) }}</p>
                <p class="text-xs text-gray-500 mt-1">Paid invoices only</p>
            </div>
            <div class="bg-primary bg-opacity-20 p-3 rounded-full">
                <i class="fas fa-dollar-sign text-primary text-xl"></i>
            </div>
        </div>
    </div>

    <!-- Monthly Profit -->
    <div class="bg-white rounded-lg shadow-sm p-6 border-l-4 border-{{ $stats['monthly_profit'] >= 0 ? 'green' : 'red' }}-500">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-sm font-medium text-gray-600">Monthly Profit</p>
                <p class="text-2xl font-bold text-{{ $stats['monthly_profit'] >= 0 ? 'green' : 'red' }}-600">
                    PKR {{ number_format($stats['monthly_profit'], 2) }}
                </p>
                <p class="text-xs text-gray-500 mt-1">Revenue - All Expenses</p>
            </div>
            <div class="bg-{{ $stats['monthly_profit'] >= 0 ? 'green' : 'red' }}-100 p-3 rounded-full">
                <i class="fas fa-chart-{{ $stats['monthly_profit'] >= 0 ? 'line' : 'line-down' }} text-{{ $stats['monthly_profit'] >= 0 ? 'green' : 'red' }}-500 text-xl"></i>
            </div>
        </div>
    </div>
</div>

<!-- Additional Statistics -->
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-6 mb-8">
    <!-- Messages -->
    <div class="bg-white rounded-lg shadow-sm p-4">
        <div class="text-center">
            <div class="bg-purple-100 p-2 rounded-full inline-block mb-2">
                <i class="fas fa-envelope text-purple-500"></i>
            </div>
            <p class="text-lg font-bold text-gray-900">{{ $stats['messages'] }}</p>
            <p class="text-xs text-gray-600">Contact Messages</p>
        </div>
    </div>

    <!-- Posts -->
    <div class="bg-white rounded-lg shadow-sm p-4">
        <div class="text-center">
            <div class="bg-indigo-100 p-2 rounded-full inline-block mb-2">
                <i class="fas fa-blog text-indigo-500"></i>
            </div>
            <p class="text-lg font-bold text-gray-900">{{ $stats['posts'] }}</p>
            <p class="text-xs text-gray-600">Blog Posts</p>
        </div>
    </div>

    <!-- Courses -->
    <div class="bg-white rounded-lg shadow-sm p-4">
        <div class="text-center">
            <div class="bg-yellow-100 p-2 rounded-full inline-block mb-2">
                <i class="fas fa-graduation-cap text-yellow-500"></i>
            </div>
            <p class="text-lg font-bold text-gray-900">{{ $stats['courses'] }}</p>
            <p class="text-xs text-gray-600">Courses</p>
        </div>
    </div>

    <!-- Pending Invoices -->
    <div class="bg-white rounded-lg shadow-sm p-4">
        <div class="text-center">
            <div class="bg-orange-100 p-2 rounded-full inline-block mb-2">
                <i class="fas fa-clock text-orange-500"></i>
            </div>
            <p class="text-lg font-bold text-gray-900">{{ $stats['pending_invoices'] }}</p>
            <p class="text-xs text-gray-600">Pending Invoices</p>
        </div>
    </div>

    <!-- Team Salaries -->
    <div class="bg-white rounded-lg shadow-sm p-4">
        <div class="text-center">
            <div class="bg-red-100 p-2 rounded-full inline-block mb-2">
                <i class="fas fa-money-bill-wave text-red-500"></i>
            </div>
            <p class="text-lg font-bold text-gray-900">PKR {{ number_format($stats['team_salaries'], 0) }}</p>
            <p class="text-xs text-gray-600">Monthly Salaries</p>
        </div>
    </div>
</div>

<div class="grid grid-cols-1 lg:grid-cols-2 gap-8 mb-8">
    <!-- Recent Projects -->
    <div class="bg-white rounded-lg shadow-sm">
        <div class="px-6 py-4 border-b border-gray-200">
            <div class="flex items-center justify-between">
                <h3 class="text-lg font-semibold text-gray-800">Recent Projects</h3>
                <a href="{{ route('admin.projects.index') }}" class="text-sm text-primary hover:text-primary-dark">View All</a>
            </div>
        </div>
        <div class="p-6">
            @if(isset($recentProjects) && $recentProjects->count() > 0)
                <div class="space-y-4">
                    @foreach($recentProjects as $project)
                        <div class="flex items-center justify-between p-3 bg-gray-50 rounded hover:bg-gray-100 transition-colors">
                            <div>
                                <h4 class="font-medium text-gray-800">{{ $project->name }}</h4>
                                <p class="text-sm text-gray-600">{{ $project->client->name ?? 'Unknown Client' }}</p>
                                <p class="text-xs text-gray-500 mt-1">{{ $project->created_at->diffForHumans() }}</p>
                            </div>
                            <div class="text-right">
                                <span class="inline-block px-2 py-1 text-xs font-medium rounded-full
                                    {{ $project->status === 'completed' ? 'bg-green-100 text-green-800' : 
                                       ($project->status === 'active' ? 'bg-blue-100 text-blue-800' : 'bg-yellow-100 text-yellow-800') }}">
                                    {{ ucfirst($project->status) }}
                                </span>
                                <p class="text-sm text-gray-600 mt-1">PKR {{ number_format($project->budget, 2) }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="text-center py-8">
                    <i class="fas fa-project-diagram text-4xl text-gray-300 mb-4"></i>
                    <p class="text-gray-500">No recent projects</p>
                    <a href="{{ route('admin.projects.create') }}" class="text-primary text-sm hover:underline">Create your first project</a>
                </div>
            @endif
        </div>
    </div>

    <!-- Recent Invoices -->
    <div class="bg-white rounded-lg shadow-sm">
        <div class="px-6 py-4 border-b border-gray-200">
            <div class="flex items-center justify-between">
                <h3 class="text-lg font-semibold text-gray-800">Recent Invoices</h3>
                <a href="{{ route('admin.invoices.index') }}" class="text-sm text-primary hover:text-primary-dark">View All</a>
            </div>
        </div>
        <div class="p-6">
            @if(isset($recentInvoices) && $recentInvoices->count() > 0)
                <div class="space-y-4">
                    @foreach($recentInvoices as $invoice)
                        <div class="flex items-center justify-between p-3 bg-gray-50 rounded hover:bg-gray-100 transition-colors">
                            <div>
                                <h4 class="font-medium text-gray-800">#{{ $invoice->invoice_number }}</h4>
                                <p class="text-sm text-gray-600">{{ $invoice->client->name ?? 'Unknown Client' }}</p>
                                <p class="text-xs text-gray-500 mt-1">{{ $invoice->created_at->diffForHumans() }}</p>
                            </div>
                            <div class="text-right">
                                <span class="inline-block px-2 py-1 text-xs font-medium rounded-full
                                    {{ $invoice->status === 'paid' ? 'bg-green-100 text-green-800' : 
                                       ($invoice->status === 'pending' ? 'bg-yellow-100 text-yellow-800' : 'bg-red-100 text-red-800') }}">
                                    {{ ucfirst($invoice->status) }}
                                </span>
                                <p class="text-sm text-gray-600 mt-1">PKR {{ number_format($invoice->total_amount, 2) }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="text-center py-8">
                    <i class="fas fa-file-invoice text-4xl text-gray-300 mb-4"></i>
                    <p class="text-gray-500">No recent invoices</p>
                    <a href="{{ route('admin.invoices.create') }}" class="text-primary text-sm hover:underline">Create your first invoice</a>
                </div>
            @endif
        </div>
    </div>
</div>

<!-- Recent Activity Row -->
<div class="grid grid-cols-1 lg:grid-cols-2 gap-8 mb-8">
    <!-- Recent Messages -->
    <div class="bg-white rounded-lg shadow-sm">
        <div class="px-6 py-4 border-b border-gray-200">
            <div class="flex items-center justify-between">
                <h3 class="text-lg font-semibold text-gray-800">Recent Messages</h3>
                <a href="{{ route('admin.messages.index') }}" class="text-sm text-primary hover:text-primary-dark">View All</a>
            </div>
        </div>
        <div class="p-6">
            @if(isset($recentMessages) && $recentMessages->count() > 0)
                <div class="space-y-4">
                    @foreach($recentMessages as $message)
                        <div class="flex items-start space-x-3 p-3 bg-gray-50 rounded hover:bg-gray-100 transition-colors">
                            <div class="bg-purple-100 p-2 rounded-full flex-shrink-0">
                                <i class="fas fa-envelope text-purple-500 text-sm"></i>
                            </div>
                            <div class="flex-1 min-w-0">
                                <h4 class="font-medium text-gray-800 truncate">{{ $message->name }}</h4>
                                <p class="text-sm text-gray-600 truncate">{{ $message->subject }}</p>
                                <p class="text-xs text-gray-500 mt-1">{{ $message->created_at->diffForHumans() }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="text-center py-8">
                    <i class="fas fa-envelope-open text-4xl text-gray-300 mb-4"></i>
                    <p class="text-gray-500">No recent messages</p>
                </div>
            @endif
        </div>
    </div>

    <!-- Recent Expenses -->
    <div class="bg-white rounded-lg shadow-sm">
        <div class="px-6 py-4 border-b border-gray-200">
            <div class="flex items-center justify-between">
                <h3 class="text-lg font-semibold text-gray-800">Recent Expenses</h3>
                <a href="{{ route('admin.expenses.index') }}" class="text-sm text-primary hover:text-primary-dark">View All</a>
            </div>
        </div>
        <div class="p-6">
            @if(isset($recentExpenses) && $recentExpenses->count() > 0)
                <div class="space-y-4">
                    @foreach($recentExpenses as $expense)
                        <div class="flex items-center justify-between p-3 bg-gray-50 rounded hover:bg-gray-100 transition-colors">
                            <div>
                                <h4 class="font-medium text-gray-800">{{ $expense->title }}</h4>
                                <p class="text-sm text-gray-600">{{ $expense->category }}</p>
                                <p class="text-xs text-gray-500 mt-1">{{ $expense->created_at->diffForHumans() }}</p>
                            </div>
                            <div class="text-right">
                                <span class="inline-block px-2 py-1 text-xs font-medium rounded-full
                                    {{ $expense->status === 'paid' ? 'bg-green-100 text-green-800' : 
                                       ($expense->status === 'pending' ? 'bg-yellow-100 text-yellow-800' : 'bg-red-100 text-red-800') }}">
                                    {{ ucfirst($expense->status) }}
                                </span>
                                <p class="text-sm text-gray-600 mt-1">PKR {{ number_format($expense->amount, 2) }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="text-center py-8">
                    <i class="fas fa-receipt text-4xl text-gray-300 mb-4"></i>
                    <p class="text-gray-500">No recent expenses</p>
                    <a href="{{ route('admin.expenses.create') }}" class="text-primary text-sm hover:underline">Record your first expense</a>
                </div>
            @endif
        </div>
    </div>
</div>

<!-- Financial Overview & Trends -->
<div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
    <!-- Monthly Financial Summary -->
    <div class="lg:col-span-2 bg-white rounded-lg shadow-sm">
        <div class="px-6 py-4 border-b border-gray-200">
            <div class="flex items-center justify-between">
                <h3 class="text-lg font-semibold text-gray-800">6-Month Financial Trend</h3>
                <a href="{{ route('admin.reports') }}" class="text-sm text-primary hover:text-primary-dark">Detailed Reports</a>
            </div>
        </div>
        <div class="p-6">
            @if(isset($monthlyData) && count($monthlyData) > 0)
                <div class="h-64 flex items-end justify-between space-x-2">
                    @foreach($monthlyData as $month)
                        @php
                            $maxRevenue = collect($monthlyData)->max('revenue') ?: 1;
                            $maxExpenses = collect($monthlyData)->max('expenses') ?: 1;
                            $revenueHeight = ($month['revenue'] / $maxRevenue) * 200;
                            $expenseHeight = ($month['expenses'] / $maxRevenue) * 200;
                        @endphp
                        <div class="flex flex-col items-center flex-1">
                            <div class="w-full flex items-end space-x-1">
                                <!-- Revenue Bar -->
                                <div class="w-full bg-green-500 rounded-t hover:bg-green-600 transition-colors relative group" 
                                     style="height: {{ $revenueHeight }}px; min-height: 4px;">
                                    <div class="opacity-0 group-hover:opacity-100 absolute -top-8 left-1/2 transform -translate-x-1/2 bg-gray-800 text-white text-xs px-2 py-1 rounded">
                                        PKR {{ number_format($month['revenue'], 0) }}
                                    </div>
                                </div>
                                <!-- Expenses Bar -->
                                <div class="w-full bg-red-500 rounded-t hover:bg-red-600 transition-colors relative group" 
                                     style="height: {{ $expenseHeight }}px; min-height: 4px;">
                                    <div class="opacity-0 group-hover:opacity-100 absolute -top-8 left-1/2 transform -translate-x-1/2 bg-gray-800 text-white text-xs px-2 py-1 rounded">
                                        PKR {{ number_format($month['expenses'], 0) }}
                                    </div>
                                </div>
                            </div>
                            <span class="text-xs text-gray-500 mt-2 font-medium">{{ $month['month'] }}</span>
                        </div>
                    @endforeach
                </div>
                <div class="flex justify-center mt-4 space-x-6">
                    <div class="flex items-center">
                        <div class="w-3 h-3 bg-green-500 rounded mr-2"></div>
                        <span class="text-sm text-gray-600">Revenue</span>
                    </div>
                    <div class="flex items-center">
                        <div class="w-3 h-3 bg-red-500 rounded mr-2"></div>
                        <span class="text-sm text-gray-600">Expenses</span>
                    </div>
                </div>
            @else
                <div class="text-center py-16">
                    <i class="fas fa-chart-bar text-4xl text-gray-300 mb-4"></i>
                    <p class="text-gray-500">No financial data available</p>
                </div>
            @endif
        </div>
    </div>

    <!-- This Month Summary -->
    <div class="bg-white rounded-lg shadow-sm">
        <div class="px-6 py-4 border-b border-gray-200">
            <h3 class="text-lg font-semibold text-gray-800">This Month</h3>
        </div>
        <div class="p-6">
            <div class="space-y-6">
                <!-- Revenue -->
                <div class="text-center p-4 bg-green-50 rounded-lg">
                    <div class="text-2xl font-bold text-green-600">PKR {{ number_format($stats['monthly_revenue'], 2) }}</div>
                    <div class="text-sm text-green-700 font-medium">Revenue</div>
                    <div class="text-xs text-green-600 mt-1">From paid invoices</div>
                </div>

                <!-- Expenses -->
                <div class="text-center p-4 bg-red-50 rounded-lg">
                    <div class="text-2xl font-bold text-red-600">PKR {{ number_format($stats['total_monthly_expenses'], 2) }}</div>
                    <div class="text-sm text-red-700 font-medium">Total Expenses</div>
                    <div class="text-xs text-red-600 mt-1">
                        <div>Regular: PKR {{ number_format($stats['monthly_expenses'], 0) }}</div>
                        <div>Salaries: PKR {{ number_format($stats['team_salaries'], 0) }}</div>
                    </div>
                </div>

                <!-- Net Profit -->
                <div class="text-center p-4 bg-{{ $stats['monthly_profit'] >= 0 ? 'green' : 'red' }}-50 rounded-lg border-2 border-{{ $stats['monthly_profit'] >= 0 ? 'green' : 'red' }}-200">
                    <div class="text-2xl font-bold text-{{ $stats['monthly_profit'] >= 0 ? 'green' : 'red' }}-600">
                        PKR {{ number_format($stats['monthly_profit'], 2) }}
                    </div>
                    <div class="text-sm text-{{ $stats['monthly_profit'] >= 0 ? 'green' : 'red' }}-700 font-medium">
                        {{ $stats['monthly_profit'] >= 0 ? 'Profit' : 'Loss' }}
                    </div>
                    <div class="text-xs text-{{ $stats['monthly_profit'] >= 0 ? 'green' : 'red' }}-600 mt-1">
                        {{ $stats['monthly_revenue'] > 0 ? number_format(($stats['monthly_profit'] / $stats['monthly_revenue']) * 100, 1) : 0 }}% margin
                    </div>
                </div>

                <!-- Quick Stats -->
                <div class="space-y-3 pt-4 border-t border-gray-200">
                    <div class="flex justify-between items-center">
                        <span class="text-sm text-gray-600">Paid Invoices:</span>
                        <span class="text-sm font-medium text-gray-900">{{ $stats['paid_invoices'] }}</span>
                    </div>
                    <div class="flex justify-between items-center">
                        <span class="text-sm text-gray-600">Pending Invoices:</span>
                        <span class="text-sm font-medium text-yellow-600">{{ $stats['pending_invoices'] }}</span>
                    </div>
                    <div class="flex justify-between items-center">
                        <span class="text-sm text-gray-600">New Messages:</span>
                        <span class="text-sm font-medium text-purple-600">{{ $stats['recent_messages'] }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Quick Actions -->
<div class="mt-8 bg-white rounded-lg shadow-sm">
    <div class="px-6 py-4 border-b border-gray-200">
        <h3 class="text-lg font-semibold text-gray-800">Quick Actions</h3>
    </div>
    <div class="p-6">
        <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
            <a href="{{ route('admin.invoices.create') }}" 
               class="flex items-center justify-center p-4 bg-blue-50 hover:bg-blue-100 rounded-lg transition-colors group">
                <div class="text-center">
                    <i class="fas fa-plus-circle text-blue-500 text-2xl group-hover:scale-110 transition-transform"></i>
                    <p class="text-sm font-medium text-blue-700 mt-2">New Invoice</p>
                </div>
            </a>
            
            <a href="{{ route('admin.expenses.create') }}" 
               class="flex items-center justify-center p-4 bg-red-50 hover:bg-red-100 rounded-lg transition-colors group">
                <div class="text-center">
                    <i class="fas fa-receipt text-red-500 text-2xl group-hover:scale-110 transition-transform"></i>
                    <p class="text-sm font-medium text-red-700 mt-2">Add Expense</p>
                </div>
            </a>
            
            <a href="{{ route('admin.projects.create') }}" 
               class="flex items-center justify-center p-4 bg-green-50 hover:bg-green-100 rounded-lg transition-colors group">
                <div class="text-center">
                    <i class="fas fa-project-diagram text-green-500 text-2xl group-hover:scale-110 transition-transform"></i>
                    <p class="text-sm font-medium text-green-700 mt-2">New Project</p>
                </div>
            </a>
            
            <a href="{{ route('admin.clients.create') }}" 
               class="flex items-center justify-center p-4 bg-purple-50 hover:bg-purple-100 rounded-lg transition-colors group">
                <div class="text-center">
                    <i class="fas fa-user-plus text-purple-500 text-2xl group-hover:scale-110 transition-transform"></i>
                    <p class="text-sm font-medium text-purple-700 mt-2">Add Client</p>
                </div>
            </a>
        </div>
    </div>
</div>
@endsection