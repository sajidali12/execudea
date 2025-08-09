@extends('admin.layout')

@section('title', 'Project Details')

@section('content')
<div class="max-w-6xl mx-auto">
    <div class="bg-white shadow rounded-lg">
        <!-- Header -->
        <div class="px-6 py-4 border-b border-gray-200">
            <div class="flex items-center justify-between">
                <div>
                    <h2 class="text-xl font-semibold text-gray-800">{{ $project->name }}</h2>
                    <p class="text-sm text-gray-600 mt-1">{{ $project->type }} for {{ $project->client->name }}</p>
                </div>
                <div class="flex space-x-2">
                    <a href="{{ route('admin.projects.edit', $project) }}" 
                       class="bg-indigo-600 text-white px-4 py-2 rounded-lg hover:bg-indigo-700 transition duration-200">
                        <i class="fas fa-edit mr-2"></i>Edit Project
                    </a>
                    <a href="{{ route('admin.projects.index') }}" 
                       class="bg-gray-500 text-white px-4 py-2 rounded-lg hover:bg-gray-600 transition duration-200">
                        <i class="fas fa-arrow-left mr-2"></i>Back to Projects
                    </a>
                </div>
            </div>
        </div>

        <div class="p-6">
            <!-- Project Overview -->
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-8">
                <!-- Status Card -->
                <div class="bg-gray-50 p-4 rounded-lg">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm font-medium text-gray-600">Status</p>
                            <span class="inline-flex px-3 py-1 text-sm font-semibold rounded-full mt-1
                                @if($project->status === 'active') bg-green-100 text-green-800
                                @elseif($project->status === 'completed') bg-blue-100 text-blue-800
                                @elseif($project->status === 'on_hold') bg-yellow-100 text-yellow-800
                                @elseif($project->status === 'cancelled') bg-red-100 text-red-800
                                @else bg-gray-100 text-gray-800 @endif">
                                {{ ucfirst(str_replace('_', ' ', $project->status)) }}
                            </span>
                        </div>
                        <i class="fas fa-flag text-2xl text-gray-400"></i>
                    </div>
                </div>

                <!-- Progress Card -->
                <div class="bg-gray-50 p-4 rounded-lg">
                    <div class="flex items-center justify-between">
                        <div class="flex-1">
                            <p class="text-sm font-medium text-gray-600">Progress</p>
                            <div class="mt-2">
                                <div class="flex items-center justify-between text-sm">
                                    <span class="text-gray-900 font-semibold">{{ $project->progress }}%</span>
                                </div>
                                <div class="w-full bg-gray-200 rounded-full h-2 mt-1">
                                    <div class="bg-gradient-to-r {{ $project->progress_color }} h-2 rounded-full transition-all duration-500" 
                                         style="width: {{ $project->progress }}%"></div>
                                </div>
                            </div>
                        </div>
                        <i class="fas fa-chart-line text-2xl text-gray-400 ml-3"></i>
                    </div>
                </div>

                <!-- Budget Card -->
                <div class="bg-gray-50 p-4 rounded-lg">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm font-medium text-gray-600">Budget</p>
                            <p class="text-lg font-semibold text-gray-900 mt-1">
                                @if($project->budget)
                                    PKR {{ number_format($project->budget) }}
                                @else
                                    <span class="text-gray-400">Not set</span>
                                @endif
                            </p>
                        </div>
                        <i class="fas fa-wallet text-2xl text-gray-400"></i>
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                <!-- Project Details -->
                <div>
                    <h3 class="text-lg font-semibold text-gray-900 mb-4 flex items-center">
                        <i class="fas fa-info-circle text-primary mr-2"></i>
                        Project Details
                    </h3>
                    
                    <div class="space-y-4">
                        <!-- Client Information -->
                        <div class="flex items-start">
                            <div class="flex-shrink-0 w-24">
                                <p class="text-sm font-medium text-gray-600">Client:</p>
                            </div>
                            <div>
                                <p class="text-sm text-gray-900 font-medium">{{ $project->client->name }}</p>
                                @if($project->client->company)
                                    <p class="text-sm text-gray-500">{{ $project->client->company }}</p>
                                @endif
                                <p class="text-sm text-gray-500">{{ $project->client->email }}</p>
                            </div>
                        </div>

                        <!-- Project Type -->
                        <div class="flex items-start">
                            <div class="flex-shrink-0 w-24">
                                <p class="text-sm font-medium text-gray-600">Type:</p>
                            </div>
                            <div>
                                <p class="text-sm text-gray-900">{{ $project->type }}</p>
                            </div>
                        </div>

                        <!-- Timeline -->
                        @if($project->start_date || $project->due_date)
                        <div class="flex items-start">
                            <div class="flex-shrink-0 w-24">
                                <p class="text-sm font-medium text-gray-600">Timeline:</p>
                            </div>
                            <div>
                                @if($project->start_date)
                                    <p class="text-sm text-gray-900">Start: {{ $project->start_date->format('M d, Y') }}</p>
                                @endif
                                @if($project->due_date)
                                    <p class="text-sm text-gray-900">Due: {{ $project->due_date->format('M d, Y') }}</p>
                                    @if($project->due_date->isPast() && $project->status !== 'completed')
                                        <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-red-100 text-red-800 mt-1">
                                            <i class="fas fa-exclamation-triangle mr-1"></i>
                                            Overdue
                                        </span>
                                    @endif
                                @endif
                            </div>
                        </div>
                        @endif

                        <!-- Created/Updated -->
                        <div class="flex items-start">
                            <div class="flex-shrink-0 w-24">
                                <p class="text-sm font-medium text-gray-600">Created:</p>
                            </div>
                            <div>
                                <p class="text-sm text-gray-900">{{ $project->created_at->format('M d, Y g:i A') }}</p>
                                @if($project->updated_at->ne($project->created_at))
                                    <p class="text-sm text-gray-500">Updated: {{ $project->updated_at->format('M d, Y g:i A') }}</p>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Description and Notes -->
                <div>
                    @if($project->description)
                    <div class="mb-6">
                        <h3 class="text-lg font-semibold text-gray-900 mb-4 flex items-center">
                            <i class="fas fa-file-alt text-primary mr-2"></i>
                            Description
                        </h3>
                        <div class="bg-gray-50 p-4 rounded-lg">
                            <p class="text-sm text-gray-700 whitespace-pre-wrap">{{ $project->description }}</p>
                        </div>
                    </div>
                    @endif

                    @if($project->notes)
                    <div class="mb-6">
                        <h3 class="text-lg font-semibold text-gray-900 mb-4 flex items-center">
                            <i class="fas fa-sticky-note text-primary mr-2"></i>
                            Notes
                        </h3>
                        <div class="bg-gray-50 p-4 rounded-lg">
                            <p class="text-sm text-gray-700 whitespace-pre-wrap">{{ $project->notes }}</p>
                        </div>
                    </div>
                    @endif

                    <!-- Project Tasks Section -->
                    <div>
                        <div class="flex items-center justify-between mb-4">
                            <h3 class="text-lg font-semibold text-gray-900 flex items-center">
                                <i class="fas fa-tasks text-primary mr-2"></i>
                                Project Tasks
                                @if($project->tasks->count() > 0)
                                    <span class="ml-2 inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800">
                                        {{ $project->tasks->count() }} tasks
                                    </span>
                                @endif
                            </h3>
                            <div class="flex space-x-2">
                                <a href="{{ route('admin.projects.tasks.create', $project) }}" 
                                   class="inline-flex items-center px-3 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-primary hover:bg-primary-dark focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary">
                                    <i class="fas fa-plus mr-2"></i>
                                    Add Task
                                </a>
                                @if($project->tasks->count() > 0)
                                <a href="{{ route('admin.projects.tasks.index', $project) }}" 
                                   class="inline-flex items-center px-3 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary">
                                    <i class="fas fa-list mr-2"></i>
                                    Manage All Tasks
                                </a>
                                @endif
                            </div>
                        </div>
                        
                        @if($project->tasks->count() > 0)
                        <div class="bg-gray-50 p-4 rounded-lg">
                            <!-- Task Statistics -->
                            <div class="grid grid-cols-4 gap-4 mb-4">
                                <div class="text-center">
                                    <div class="text-2xl font-bold text-gray-600">{{ $project->tasks->where('status', 'pending')->count() }}</div>
                                    <div class="text-xs text-gray-500">Pending</div>
                                </div>
                                <div class="text-center">
                                    <div class="text-2xl font-bold text-blue-600">{{ $project->tasks->where('status', 'in_progress')->count() }}</div>
                                    <div class="text-xs text-gray-500">In Progress</div>
                                </div>
                                <div class="text-center">
                                    <div class="text-2xl font-bold text-green-600">{{ $project->tasks->where('status', 'completed')->count() }}</div>
                                    <div class="text-xs text-gray-500">Completed</div>
                                </div>
                                <div class="text-center">
                                    <div class="text-2xl font-bold text-red-600">{{ $project->tasks->filter(fn($task) => $task->isOverdue())->count() }}</div>
                                    <div class="text-xs text-gray-500">Overdue</div>
                                </div>
                            </div>
                            
                            <!-- Recent Tasks -->
                            @php
                                $recentTasks = $project->tasks()->orderBy('created_at', 'desc')->limit(5)->get();
                            @endphp
                            @if($recentTasks->count() > 0)
                            <div>
                                <h4 class="text-sm font-medium text-gray-700 mb-3">Recent Tasks</h4>
                                <div class="space-y-2">
                                    @foreach($recentTasks as $task)
                                    <div class="flex items-center justify-between bg-white p-3 rounded border">
                                        <div class="flex items-center space-x-3">
                                            <span class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-medium {{ $task->priority_color }}">
                                                {{ ucfirst($task->priority) }}
                                            </span>
                                            <a href="{{ route('admin.projects.tasks.show', [$project, $task]) }}" 
                                               class="text-sm font-medium text-gray-900 hover:text-primary">
                                                {{ Str::limit($task->title, 50) }}
                                            </a>
                                        </div>
                                        <div class="flex items-center space-x-2">
                                            <span class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-medium {{ $task->status_color }}">
                                                {{ ucfirst(str_replace('_', ' ', $task->status)) }}
                                            </span>
                                            @if($task->assignments->count() > 0)
                                            <span class="text-xs text-gray-500">{{ $task->assignments->count() }} assigned</span>
                                            @endif
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                                
                                @if($project->tasks->count() > 5)
                                <div class="mt-3 text-center">
                                    <a href="{{ route('admin.projects.tasks.index', $project) }}" 
                                       class="text-sm text-primary hover:text-primary-dark font-medium">
                                        View all {{ $project->tasks->count() }} tasks →
                                    </a>
                                </div>
                                @endif
                            </div>
                            @endif
                        </div>
                        @else
                        <div class="bg-gray-50 p-8 rounded-lg text-center">
                            <i class="fas fa-tasks text-4xl text-gray-300 mb-4"></i>
                            <h4 class="text-lg font-medium text-gray-900 mb-2">No tasks created yet</h4>
                            <p class="text-gray-600 mb-4">Get started by creating the first task for this project to organize and track work progress.</p>
                            <a href="{{ route('admin.projects.tasks.create', $project) }}" 
                               class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-primary hover:bg-primary-dark focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary">
                                <i class="fas fa-plus mr-2"></i>
                                Create First Task
                            </a>
                        </div>
                        @endif
                    </div>
                </div>
            </div>

            <!-- Related Invoices -->
            @if($project->invoices->count() > 0)
            <div class="mt-8 pt-8 border-t border-gray-200">
                <h3 class="text-lg font-semibold text-gray-900 mb-4 flex items-center">
                    <i class="fas fa-file-invoice text-primary mr-2"></i>
                    Related Invoices ({{ $project->invoices->count() }})
                </h3>
                
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Invoice Number
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
                            @foreach($project->invoices as $invoice)
                            <tr class="hover:bg-gray-50">
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm font-medium text-gray-900">{{ $invoice->invoice_number }}</div>
                                    <div class="text-sm text-gray-500">{{ $invoice->issue_date->format('M d, Y') }}</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm font-medium text-gray-900">PKR {{ number_format($invoice->total_amount) }}</div>
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
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                    <a href="{{ route('admin.invoices.show', $invoice) }}" 
                                       class="text-blue-600 hover:text-blue-900 mr-3" 
                                       title="View Invoice">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <a href="{{ route('admin.invoices.edit', $invoice) }}" 
                                       class="text-indigo-600 hover:text-indigo-900"
                                       title="Edit Invoice">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            @endif

            <!-- Action Buttons -->
            <div class="mt-8 pt-6 border-t border-gray-200 flex justify-between">
                <div class="flex space-x-2">
                    <a href="{{ route('admin.invoices.create', ['project_id' => $project->id]) }}" 
                       class="bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700 transition duration-200">
                        <i class="fas fa-file-invoice mr-2"></i>Create Invoice
                    </a>
                </div>
                
                <div class="flex space-x-2">
                    <form action="{{ route('admin.projects.destroy', $project) }}" 
                          method="POST" 
                          class="inline"
                          onsubmit="return confirm('Are you sure you want to delete this project? This will also delete all related invoices.')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" 
                                class="bg-red-600 text-white px-4 py-2 rounded-lg hover:bg-red-700 transition duration-200">
                            <i class="fas fa-trash mr-2"></i>Delete Project
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection