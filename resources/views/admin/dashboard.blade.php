@extends('admin.layout')

@section('title', 'Admin Dashboard')
@section('page-title', 'Dashboard')

@section('content')
<!-- Key Statistics -->
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
    @if(auth()->user()->isAdmin())
    <!-- Total Clients - Admin Only -->
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

    <!-- Active Projects - Admin Only -->
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
    @else
    <!-- Assigned Projects - Editor Only -->
    <div class="bg-white rounded-lg shadow-sm p-6 border-l-4 border-green-500">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-sm font-medium text-gray-600">Assigned Projects</p>
                <p class="text-2xl font-bold text-gray-900">
                    @php
                        $assignedProjects = auth()->user()->taskAssignments()
                                                ->with('task.project')
                                                ->get()
                                                ->pluck('task.project')
                                                ->unique('id')
                                                ->count();
                    @endphp
                    {{ $assignedProjects }}
                </p>
                <p class="text-xs text-gray-500 mt-1">Projects with my tasks</p>
            </div>
            <div class="bg-green-100 p-3 rounded-full">
                <i class="fas fa-project-diagram text-green-500 text-xl"></i>
            </div>
        </div>
    </div>
    @endif

    @if(auth()->user()->isAdmin())
    <!-- Monthly Revenue - Admin Only -->
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

    <!-- Monthly Profit - Admin Only -->
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
    @else
    <!-- Editor Alternative Stats -->
    <div class="bg-white rounded-lg shadow-sm p-6 border-l-4 border-purple-500">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-sm font-medium text-gray-600">My Tasks</p>
                <p class="text-2xl font-bold text-gray-900">
                    @php
                        $userTasks = auth()->user()->taskAssignments()->whereIn('status', ['assigned', 'in_progress'])->count();
                    @endphp
                    {{ $userTasks }}
                </p>
                <p class="text-xs text-gray-500 mt-1">Assigned to me</p>
            </div>
            <div class="bg-purple-100 p-3 rounded-full">
                <i class="fas fa-tasks text-purple-500 text-xl"></i>
            </div>
        </div>
    </div>

    <!-- Completed Tasks -->
    <div class="bg-white rounded-lg shadow-sm p-6 border-l-4 border-indigo-500">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-sm font-medium text-gray-600">Completed Tasks</p>
                <p class="text-2xl font-bold text-gray-900">
                    @php
                        $completedTasks = auth()->user()->taskAssignments()->where('status', 'completed')->count();
                    @endphp
                    {{ $completedTasks }}
                </p>
                <p class="text-xs text-gray-500 mt-1">This month</p>
            </div>
            <div class="bg-indigo-100 p-3 rounded-full">
                <i class="fas fa-check-circle text-indigo-500 text-xl"></i>
            </div>
        </div>
    </div>
    @endif
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

    @if(auth()->user()->isAdmin())
    <!-- Team Salaries - Admin Only -->
    <div class="bg-white rounded-lg shadow-sm p-4">
        <div class="text-center">
            <div class="bg-red-100 p-2 rounded-full inline-block mb-2">
                <i class="fas fa-money-bill-wave text-red-500"></i>
            </div>
            <p class="text-lg font-bold text-gray-900">PKR {{ number_format($stats['team_salaries'], 0) }}</p>
            <p class="text-xs text-gray-600">Monthly Salaries</p>
        </div>
    </div>
    @else
    <!-- Editor Task Progress -->
    <div class="bg-white rounded-lg shadow-sm p-4">
        <div class="text-center">
            <div class="bg-teal-100 p-2 rounded-full inline-block mb-2">
                <i class="fas fa-chart-pie text-teal-500"></i>
            </div>
            @php
                $totalUserTasks = auth()->user()->taskAssignments()->count();
                $completedUserTasks = auth()->user()->taskAssignments()->where('status', 'completed')->count();
                $progress = $totalUserTasks > 0 ? round(($completedUserTasks / $totalUserTasks) * 100) : 0;
            @endphp
            <p class="text-lg font-bold text-gray-900">{{ $progress }}%</p>
            <p class="text-xs text-gray-600">Task Progress</p>
        </div>
    </div>
    @endif
</div>

@if(auth()->user()->isAdmin())
<div class="grid grid-cols-1 lg:grid-cols-2 gap-8 mb-8">
    <!-- Recent Projects - Admin Only -->
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
@endif

@if(auth()->user()->isAdmin())
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
@else
<!-- Editor-Specific Content Sections -->
<div class="grid grid-cols-1 lg:grid-cols-2 gap-8 mb-8">
    <!-- My Assigned Projects -->
    <div class="bg-white rounded-lg shadow-sm">
        <div class="px-6 py-4 border-b border-gray-200">
            <div class="flex items-center justify-between">
                <h3 class="text-lg font-semibold text-gray-800">My Assigned Projects</h3>
                <a href="{{ route('user.daily-tasks.index') }}" class="text-sm text-primary hover:text-primary-dark">View All Tasks</a>
            </div>
        </div>
        <div class="p-6">
            @php
                $editorProjects = auth()->user()->taskAssignments()
                                        ->with(['task.project.client'])
                                        ->get()
                                        ->pluck('task.project')
                                        ->unique('id')
                                        ->take(5);
            @endphp
            @if($editorProjects->count() > 0)
                <div class="space-y-4">
                    @foreach($editorProjects as $project)
                        <div class="flex items-center justify-between p-3 bg-gray-50 rounded hover:bg-gray-100 transition-colors">
                            <div>
                                <h4 class="font-medium text-gray-800">{{ $project->name }}</h4>
                                <p class="text-sm text-gray-600">{{ $project->client->name ?? 'No Client' }}</p>
                                @php
                                    $myTasksCount = auth()->user()->taskAssignments()
                                                              ->whereHas('task', function($q) use ($project) {
                                                                  $q->where('project_id', $project->id);
                                                              })
                                                              ->whereIn('status', ['assigned', 'in_progress'])
                                                              ->count();
                                @endphp
                                <p class="text-xs text-gray-500 mt-1">{{ $myTasksCount }} active tasks</p>
                            </div>
                            <div class="text-right">
                                <span class="inline-block px-2 py-1 text-xs font-medium rounded-full
                                    {{ $project->status === 'completed' ? 'bg-green-100 text-green-800' : 
                                       ($project->status === 'active' ? 'bg-blue-100 text-blue-800' : 'bg-yellow-100 text-yellow-800') }}">
                                    {{ ucfirst($project->status) }}
                                </span>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="text-center py-8">
                    <i class="fas fa-project-diagram text-4xl text-gray-300 mb-4"></i>
                    <p class="text-gray-500">No projects assigned</p>
                </div>
            @endif
        </div>
    </div>

    <!-- My Recent Posts -->
    <div class="bg-white rounded-lg shadow-sm">
        <div class="px-6 py-4 border-b border-gray-200">
            <div class="flex items-center justify-between">
                <h3 class="text-lg font-semibold text-gray-800">My Recent Posts</h3>
                <a href="{{ route('posts.index') }}" class="text-sm text-primary hover:text-primary-dark">View All</a>
            </div>
        </div>
        <div class="p-6">
            @php
                $editorPosts = \App\Models\Post::where('author_name', auth()->user()->name)
                                             ->latest()
                                             ->limit(5)
                                             ->get();
            @endphp
            @if($editorPosts->count() > 0)
                <div class="space-y-4">
                    @foreach($editorPosts as $post)
                        <div class="flex items-center justify-between p-3 bg-gray-50 rounded hover:bg-gray-100 transition-colors">
                            <div>
                                <h4 class="font-medium text-gray-800">{{ Str::limit($post->title, 30) }}</h4>
                                <p class="text-xs text-gray-500 mt-1">{{ $post->created_at->diffForHumans() }}</p>
                            </div>
                            <div class="text-right">
                                <span class="inline-block px-2 py-1 text-xs font-medium rounded-full bg-blue-100 text-blue-800">
                                    Published
                                </span>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="text-center py-8">
                    <i class="fas fa-blog text-4xl text-gray-300 mb-4"></i>
                    <p class="text-gray-500">No posts yet</p>
                    <a href="{{ route('posts.create') }}" class="text-primary text-sm hover:underline">Write your first post</a>
                </div>
            @endif
        </div>
    </div>
</div>
@endif

@if(auth()->user()->isAdmin())
<!-- Financial Overview & Trends - Admin Only -->
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
                <div class="h-64 flex items-end justify-between space-x-1">
                    @foreach($monthlyData as $month)
                        @php
                            $maxValue = max(collect($monthlyData)->max('revenue'), collect($monthlyData)->max('expenses')) ?: 1;
                            $revenueHeight = ($month['revenue'] / $maxValue) * 200;
                            $expenseHeight = ($month['expenses'] / $maxValue) * 200;
                        @endphp
                        <div class="flex flex-col items-center flex-1 max-w-none">
                            <div class="w-full flex items-end justify-center space-x-1 mb-2">
                                <!-- Revenue Bar -->
                                <div class="flex-1 max-w-6 bg-green-500 rounded-t hover:bg-green-600 transition-colors relative group cursor-pointer" 
                                     style="height: {{ max($revenueHeight, 4) }}px;">
                                    <div class="opacity-0 group-hover:opacity-100 absolute -top-10 left-1/2 transform -translate-x-1/2 bg-gray-900 text-white text-xs px-2 py-1 rounded whitespace-nowrap z-10 transition-opacity">
                                        Revenue: PKR {{ number_format($month['revenue'], 0) }}
                                    </div>
                                </div>
                                <!-- Expenses Bar -->
                                <div class="flex-1 max-w-6 bg-red-500 rounded-t hover:bg-red-600 transition-colors relative group cursor-pointer" 
                                     style="height: {{ max($expenseHeight, 4) }}px;">
                                    <div class="opacity-0 group-hover:opacity-100 absolute -top-10 left-1/2 transform -translate-x-1/2 bg-gray-900 text-white text-xs px-2 py-1 rounded whitespace-nowrap z-10 transition-opacity">
                                        Expenses: PKR {{ number_format($month['expenses'], 0) }}
                                    </div>
                                </div>
                            </div>
                            <span class="text-xs text-gray-600 mt-1 font-medium text-center leading-tight">{{ $month['month'] }}</span>
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
@else
<!-- Editor-Specific Dashboard Content -->
<div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
    <!-- My Recent Tasks -->
    <div class="bg-white rounded-lg shadow-sm">
        <div class="px-6 py-4 border-b border-gray-200">
            <div class="flex items-center justify-between">
                <h3 class="text-lg font-semibold text-gray-800">My Recent Tasks</h3>
                <a href="{{ route('user.daily-tasks.index') }}" class="text-sm text-primary hover:text-primary-dark">View All Tasks</a>
            </div>
        </div>
        <div class="p-6">
            @php
                $userRecentTasks = auth()->user()->taskAssignments()
                                        ->with(['task.project'])
                                        ->latest()
                                        ->limit(5)
                                        ->get();
            @endphp
            @if($userRecentTasks->count() > 0)
                <div class="space-y-4">
                    @foreach($userRecentTasks as $assignment)
                        <div class="flex items-start space-x-3 p-3 bg-gray-50 rounded hover:bg-gray-100 transition-colors">
                            <div class="flex-shrink-0 pt-1">
                                <div class="w-3 h-3 rounded-full {{ $assignment->status_color }}"></div>
                            </div>
                            <div class="flex-1 min-w-0">
                                <h4 class="font-medium text-gray-800 truncate">{{ $assignment->task->title }}</h4>
                                <p class="text-sm text-gray-600">{{ $assignment->task->project->name }}</p>
                                <p class="text-xs text-gray-500 mt-1">{{ ucfirst(str_replace('_', ' ', $assignment->status)) }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="text-center py-8">
                    <i class="fas fa-tasks text-4xl text-gray-300 mb-4"></i>
                    <p class="text-gray-500">No tasks assigned yet</p>
                </div>
            @endif
        </div>
    </div>

    <!-- Task Statistics -->
    <div class="bg-white rounded-lg shadow-sm">
        <div class="px-6 py-4 border-b border-gray-200">
            <h3 class="text-lg font-semibold text-gray-800">My Task Statistics</h3>
        </div>
        <div class="p-6">
            @php
                $taskStats = [
                    'assigned' => auth()->user()->taskAssignments()->where('status', 'assigned')->count(),
                    'in_progress' => auth()->user()->taskAssignments()->where('status', 'in_progress')->count(),
                    'completed' => auth()->user()->taskAssignments()->where('status', 'completed')->count(),
                    'total' => auth()->user()->taskAssignments()->count()
                ];
            @endphp
            <div class="grid grid-cols-2 gap-4">
                <div class="text-center p-4 bg-yellow-50 rounded-lg">
                    <div class="text-2xl font-bold text-yellow-600">{{ $taskStats['assigned'] }}</div>
                    <div class="text-sm text-yellow-700 font-medium">Assigned</div>
                </div>
                <div class="text-center p-4 bg-blue-50 rounded-lg">
                    <div class="text-2xl font-bold text-blue-600">{{ $taskStats['in_progress'] }}</div>
                    <div class="text-sm text-blue-700 font-medium">In Progress</div>
                </div>
                <div class="text-center p-4 bg-green-50 rounded-lg">
                    <div class="text-2xl font-bold text-green-600">{{ $taskStats['completed'] }}</div>
                    <div class="text-sm text-green-700 font-medium">Completed</div>
                </div>
                <div class="text-center p-4 bg-gray-50 rounded-lg">
                    <div class="text-2xl font-bold text-gray-600">{{ $taskStats['total'] }}</div>
                    <div class="text-sm text-gray-700 font-medium">Total</div>
                </div>
            </div>
        </div>
    </div>
</div>
@endif

<!-- Quick Actions -->
<div class="mt-8 bg-white rounded-lg shadow-sm">
    <div class="px-6 py-4 border-b border-gray-200">
        <h3 class="text-lg font-semibold text-gray-800">Quick Actions</h3>
    </div>
    <div class="p-6">
        @if(auth()->user()->isAdmin())
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
        @else
        <div class="grid grid-cols-2 md:grid-cols-3 gap-4">
            <a href="{{ route('user.daily-tasks.index') }}" 
               class="flex items-center justify-center p-4 bg-purple-50 hover:bg-purple-100 rounded-lg transition-colors group">
                <div class="text-center">
                    <i class="fas fa-tasks text-purple-500 text-2xl group-hover:scale-110 transition-transform"></i>
                    <p class="text-sm font-medium text-purple-700 mt-2">My Tasks</p>
                </div>
            </a>
            
            <a href="{{ route('posts.create') }}" 
               class="flex items-center justify-center p-4 bg-blue-50 hover:bg-blue-100 rounded-lg transition-colors group">
                <div class="text-center">
                    <i class="fas fa-pen text-blue-500 text-2xl group-hover:scale-110 transition-transform"></i>
                    <p class="text-sm font-medium text-blue-700 mt-2">Write Post</p>
                </div>
            </a>
            
            <a href="{{ route('admin.courses.create') }}" 
               class="flex items-center justify-center p-4 bg-green-50 hover:bg-green-100 rounded-lg transition-colors group">
                <div class="text-center">
                    <i class="fas fa-graduation-cap text-green-500 text-2xl group-hover:scale-110 transition-transform"></i>
                    <p class="text-sm font-medium text-green-700 mt-2">Add Course</p>
                </div>
            </a>
        </div>
        @endif
    </div>
</div>
@endsection