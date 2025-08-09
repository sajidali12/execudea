@extends('admin.layout')

@section('title', $project->name . ' - Tasks')
@section('page-title', $project->name . ' - Task Management')

@section('content')
<div class="space-y-6">
    <!-- Project Info & Actions -->
    <div class="bg-white shadow rounded-lg p-6">
        <div class="flex items-center justify-between">
            <div>
                <h1 class="text-2xl font-bold text-gray-900">{{ $project->name }}</h1>
                <p class="text-gray-600 mt-1">{{ $project->description }}</p>
                <div class="flex items-center space-x-4 mt-2 text-sm text-gray-500">
                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-{{ $project->status_color }}-100 text-{{ $project->status_color }}-800">
                        {{ ucfirst($project->status) }}
                    </span>
                    <span><i class="fas fa-user mr-1"></i>{{ $project->client->name ?? 'No Client' }}</span>
                    @if($project->due_date)
                    <span><i class="fas fa-calendar mr-1"></i>Due: {{ $project->due_date->format('M d, Y') }}</span>
                    @endif
                </div>
            </div>
            <div class="flex space-x-3">
                <a href="{{ route('admin.projects.show', $project) }}" 
                   class="inline-flex items-center px-4 py-2 border border-gray-300 rounded-md shadow-sm bg-white text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary">
                    <i class="fas fa-arrow-left mr-2"></i>
                    Back to Project
                </a>
                <a href="{{ route('admin.projects.tasks.create', $project) }}" 
                   class="inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm bg-primary text-sm font-medium text-white hover:bg-primary-dark focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary">
                    <i class="fas fa-plus mr-2"></i>
                    Add New Task
                </a>
            </div>
        </div>
    </div>

    <!-- Task Statistics -->
    <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
        <div class="bg-white overflow-hidden shadow rounded-lg">
            <div class="p-5">
                <div class="flex items-center">
                    <div class="flex-shrink-0">
                        <i class="fas fa-tasks text-2xl text-blue-400"></i>
                    </div>
                    <div class="ml-5 w-0 flex-1">
                        <dl>
                            <dt class="text-sm font-medium text-gray-500 truncate">Total Tasks</dt>
                            <dd class="text-lg font-medium text-gray-900">{{ $tasks->total() }}</dd>
                        </dl>
                    </div>
                </div>
            </div>
        </div>

        <div class="bg-white overflow-hidden shadow rounded-lg">
            <div class="p-5">
                <div class="flex items-center">
                    <div class="flex-shrink-0">
                        <i class="fas fa-clock text-2xl text-yellow-400"></i>
                    </div>
                    <div class="ml-5 w-0 flex-1">
                        <dl>
                            <dt class="text-sm font-medium text-gray-500 truncate">Pending</dt>
                            <dd class="text-lg font-medium text-gray-900">{{ $project->tasks->where('status', 'pending')->count() }}</dd>
                        </dl>
                    </div>
                </div>
            </div>
        </div>

        <div class="bg-white overflow-hidden shadow rounded-lg">
            <div class="p-5">
                <div class="flex items-center">
                    <div class="flex-shrink-0">
                        <i class="fas fa-play text-2xl text-blue-500"></i>
                    </div>
                    <div class="ml-5 w-0 flex-1">
                        <dl>
                            <dt class="text-sm font-medium text-gray-500 truncate">In Progress</dt>
                            <dd class="text-lg font-medium text-gray-900">{{ $project->tasks->where('status', 'in_progress')->count() }}</dd>
                        </dl>
                    </div>
                </div>
            </div>
        </div>

        <div class="bg-white overflow-hidden shadow rounded-lg">
            <div class="p-5">
                <div class="flex items-center">
                    <div class="flex-shrink-0">
                        <i class="fas fa-check-circle text-2xl text-green-500"></i>
                    </div>
                    <div class="ml-5 w-0 flex-1">
                        <dl>
                            <dt class="text-sm font-medium text-gray-500 truncate">Completed</dt>
                            <dd class="text-lg font-medium text-gray-900">{{ $project->tasks->where('status', 'completed')->count() }}</dd>
                        </dl>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Tasks List -->
    <div class="bg-white shadow rounded-lg">
        <div class="px-6 py-4 border-b border-gray-200">
            <h3 class="text-lg font-medium text-gray-900">Project Tasks</h3>
        </div>
        
        @if($tasks->count() > 0)
        <div class="divide-y divide-gray-200">
            @foreach($tasks as $task)
            <div class="p-6 hover:bg-gray-50 transition-colors duration-150">
                <div class="flex items-start justify-between">
                    <div class="flex-1 min-w-0">
                        <div class="flex items-center space-x-2 mb-2">
                            <h4 class="text-lg font-medium text-gray-900">
                                <a href="{{ route('admin.projects.tasks.show', [$project, $task]) }}" class="hover:text-primary">
                                    {{ $task->title }}
                                </a>
                            </h4>
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium {{ $task->priority_color }}">
                                {{ ucfirst($task->priority) }}
                            </span>
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium {{ $task->status_color }}">
                                {{ ucfirst(str_replace('_', ' ', $task->status)) }}
                            </span>
                        </div>
                        
                        @if($task->description)
                        <p class="text-sm text-gray-600 mb-3">{{ Str::limit($task->description, 120) }}</p>
                        @endif
                        
                        <div class="flex items-center space-x-4 text-sm text-gray-500">
                            <div class="flex items-center">
                                <i class="fas fa-user mr-1"></i>
                                Created by {{ $task->creator->name }}
                            </div>
                            
                            @if($task->due_date)
                            <div class="flex items-center {{ $task->isOverdue() ? 'text-red-600 font-medium' : '' }}">
                                <i class="fas fa-calendar mr-1"></i>
                                Due: {{ $task->due_date->format('M d, Y') }}
                                @if($task->isOverdue())
                                    <span class="ml-1">(Overdue)</span>
                                @endif
                            </div>
                            @endif
                            
                            @if($task->estimated_hours)
                            <div class="flex items-center">
                                <i class="fas fa-clock mr-1"></i>
                                {{ $task->estimated_hours }}h estimated
                            </div>
                            @endif
                            
                            <div class="flex items-center">
                                <i class="fas fa-users mr-1"></i>
                                {{ $task->assignments->count() }} assigned
                            </div>
                        </div>
                        
                        <!-- Assigned Users -->
                        @if($task->assignments->count() > 0)
                        <div class="mt-3">
                            <div class="flex items-center space-x-2">
                                <span class="text-xs text-gray-500">Assigned to:</span>
                                <div class="flex space-x-1">
                                    @foreach($task->assignments->take(3) as $assignment)
                                    <span class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-medium {{ $assignment->status_color }}">
                                        {{ $assignment->user->name }}
                                    </span>
                                    @endforeach
                                    @if($task->assignments->count() > 3)
                                    <span class="text-xs text-gray-500">+{{ $task->assignments->count() - 3 }} more</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        @endif
                    </div>
                    
                    <div class="ml-6 flex items-center space-x-2">
                        <a href="{{ route('admin.projects.tasks.show', [$project, $task]) }}" 
                           class="inline-flex items-center px-3 py-1.5 border border-gray-300 text-xs font-medium rounded text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary">
                            <i class="fas fa-eye mr-1"></i>
                            View
                        </a>
                        <a href="{{ route('admin.projects.tasks.edit', [$project, $task]) }}" 
                           class="inline-flex items-center px-3 py-1.5 border border-transparent text-xs font-medium rounded text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                            <i class="fas fa-edit mr-1"></i>
                            Edit
                        </a>
                        <form method="POST" action="{{ route('admin.projects.tasks.destroy', [$project, $task]) }}" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" 
                                    onclick="return confirm('Are you sure you want to delete this task?')"
                                    class="inline-flex items-center px-3 py-1.5 border border-transparent text-xs font-medium rounded text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">
                                <i class="fas fa-trash mr-1"></i>
                                Delete
                            </button>
                        </form>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        
        <!-- Pagination -->
        <div class="bg-white px-4 py-3 border-t border-gray-200 sm:px-6">
            {{ $tasks->links() }}
        </div>
        @else
        <div class="p-12 text-center">
            <i class="fas fa-tasks text-6xl text-gray-300 mb-4"></i>
            <h3 class="text-lg font-medium text-gray-900 mb-2">No tasks yet</h3>
            <p class="text-gray-500 mb-6">Get started by creating the first task for this project.</p>
            <a href="{{ route('admin.projects.tasks.create', $project) }}" 
               class="inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm bg-primary text-sm font-medium text-white hover:bg-primary-dark focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary">
                <i class="fas fa-plus mr-2"></i>
                Create First Task
            </a>
        </div>
        @endif
    </div>
</div>
@endsection