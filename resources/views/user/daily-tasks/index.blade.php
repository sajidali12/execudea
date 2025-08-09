@extends('admin.layout')

@section('title', 'My Daily Tasks')
@section('page-title', 'My Daily Tasks')

@section('content')
<div class="space-y-6">
    <!-- Task Statistics -->
    <div class="grid grid-cols-1 md:grid-cols-5 gap-6 mb-6">
        <div class="bg-white overflow-hidden shadow rounded-lg">
            <div class="p-5">
                <div class="flex items-center">
                    <div class="flex-shrink-0">
                        <i class="fas fa-tasks text-2xl text-blue-400"></i>
                    </div>
                    <div class="ml-5 w-0 flex-1">
                        <dl>
                            <dt class="text-sm font-medium text-gray-500 truncate">Total Tasks</dt>
                            <dd class="text-lg font-medium text-gray-900">{{ $stats['total'] }}</dd>
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
                            <dt class="text-sm font-medium text-gray-500 truncate">Assigned</dt>
                            <dd class="text-lg font-medium text-gray-900">{{ $stats['assigned'] }}</dd>
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
                            <dd class="text-lg font-medium text-gray-900">{{ $stats['in_progress'] }}</dd>
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
                            <dd class="text-lg font-medium text-gray-900">{{ $stats['completed'] }}</dd>
                        </dl>
                    </div>
                </div>
            </div>
        </div>

        <div class="bg-white overflow-hidden shadow rounded-lg">
            <div class="p-5">
                <div class="flex items-center">
                    <div class="flex-shrink-0">
                        <i class="fas fa-exclamation-triangle text-2xl text-red-500"></i>
                    </div>
                    <div class="ml-5 w-0 flex-1">
                        <dl>
                            <dt class="text-sm font-medium text-gray-500 truncate">Overdue</dt>
                            <dd class="text-lg font-medium text-gray-900">{{ $stats['overdue'] }}</dd>
                        </dl>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Filters -->
    <div class="bg-white shadow rounded-lg p-6">
        <div class="flex flex-col sm:flex-row gap-4 items-start sm:items-center">
            <div class="flex-1">
                <h3 class="text-lg font-medium text-gray-900 mb-2 sm:mb-0">Filter Tasks</h3>
            </div>
            <div class="flex flex-col sm:flex-row gap-3">
                <!-- Status Filter -->
                <div>
                    <select id="statusFilter" class="block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-primary focus:border-primary sm:text-sm">
                        <option value="all" {{ $status === 'all' ? 'selected' : '' }}>All Status</option>
                        <option value="assigned" {{ $status === 'assigned' ? 'selected' : '' }}>Assigned</option>
                        <option value="in_progress" {{ $status === 'in_progress' ? 'selected' : '' }}>In Progress</option>
                        <option value="completed" {{ $status === 'completed' ? 'selected' : '' }}>Completed</option>
                    </select>
                </div>
                
                <!-- Project Filter -->
                <div>
                    <select id="projectFilter" class="block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-primary focus:border-primary sm:text-sm">
                        <option value="">All Projects</option>
                        @foreach($projects as $proj)
                            <option value="{{ $proj->id }}" {{ $project == $proj->id ? 'selected' : '' }}>
                                {{ $proj->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                
                <!-- Refresh Button -->
                <button onclick="applyFilters()" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-primary hover:bg-primary-dark focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary">
                    <i class="fas fa-filter mr-2"></i>
                    Apply Filters
                </button>
            </div>
        </div>
    </div>

    <!-- Today's Priority Tasks -->
    @if($todayTasks->count() > 0)
    <div class="bg-white shadow rounded-lg">
        <div class="px-6 py-4 border-b border-gray-200">
            <h3 class="text-lg font-medium text-gray-900 flex items-center">
                <i class="fas fa-star text-yellow-400 mr-2"></i>
                Today's Priority Tasks
            </h3>
        </div>
        <div class="divide-y divide-gray-200">
            @foreach($todayTasks as $assignment)
            <div class="p-6 hover:bg-gray-50 transition-colors duration-150 task-item" data-task-id="{{ $assignment->id }}">
                <div class="flex items-start space-x-4">
                    <div class="flex-shrink-0 pt-1">
                        <input type="checkbox" 
                               class="task-checkbox h-4 w-4 text-primary focus:ring-primary border-gray-300 rounded"
                               data-assignment-id="{{ $assignment->id }}"
                               {{ $assignment->status === 'completed' ? 'checked disabled' : '' }}>
                    </div>
                    
                    <div class="flex-1 min-w-0">
                        <div class="flex items-start justify-between">
                            <div class="flex-1">
                                <h4 class="text-lg font-medium text-gray-900 {{ $assignment->status === 'completed' ? 'line-through opacity-60' : '' }}">
                                    {{ $assignment->task->title }}
                                </h4>
                                <p class="text-sm text-gray-600 mt-1">
                                    <i class="fas fa-project-diagram mr-1"></i>
                                    {{ $assignment->task->project->name }}
                                </p>
                                @if($assignment->task->description)
                                <p class="text-sm text-gray-500 mt-2">{{ Str::limit($assignment->task->description, 100) }}</p>
                                @endif
                            </div>
                            
                            <div class="flex items-center space-x-2 ml-4">
                                <!-- Priority Badge -->
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium {{ $assignment->task->priority_color }}">
                                    {{ ucfirst($assignment->task->priority) }}
                                </span>
                                
                                <!-- Status Badge -->
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium {{ $assignment->status_color }}">
                                    {{ ucfirst(str_replace('_', ' ', $assignment->status)) }}
                                </span>
                            </div>
                        </div>
                        
                        <div class="mt-3 flex items-center justify-between">
                            <div class="flex items-center space-x-4 text-sm text-gray-500">
                                @if($assignment->task->due_date)
                                <div class="flex items-center {{ $assignment->task->isOverdue() ? 'text-red-600' : '' }}">
                                    <i class="fas fa-calendar mr-1"></i>
                                    {{ $assignment->task->due_date->format('M d, Y') }}
                                    @if($assignment->task->isOverdue())
                                        <span class="ml-1 text-red-600 font-medium">(Overdue)</span>
                                    @endif
                                </div>
                                @endif
                                
                                @if($assignment->task->estimated_hours)
                                <div class="flex items-center">
                                    <i class="fas fa-clock mr-1"></i>
                                    {{ $assignment->task->estimated_hours }}h estimated
                                </div>
                                @endif
                                
                                @if($assignment->actual_hours)
                                <div class="flex items-center">
                                    <i class="fas fa-check-clock mr-1"></i>
                                    {{ $assignment->actual_hours }}h spent
                                </div>
                                @endif
                            </div>
                            
                            <div class="flex items-center space-x-2">
                                @if($assignment->status === 'assigned')
                                <form method="POST" action="{{ route('user.daily-tasks.start', $assignment) }}" class="inline">
                                    @csrf
                                    <button type="submit" class="inline-flex items-center px-3 py-1.5 border border-transparent text-xs font-medium rounded text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                                        <i class="fas fa-play mr-1"></i>
                                        Start
                                    </button>
                                </form>
                                @elseif($assignment->status === 'in_progress')
                                <button onclick="openCompleteModal({{ $assignment->id }})" class="inline-flex items-center px-3 py-1.5 border border-transparent text-xs font-medium rounded text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
                                    <i class="fas fa-check mr-1"></i>
                                    Complete
                                </button>
                                @endif
                                
                                <button onclick="openTaskModal({{ $assignment->id }})" class="inline-flex items-center px-3 py-1.5 border border-gray-300 text-xs font-medium rounded text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary">
                                    <i class="fas fa-eye mr-1"></i>
                                    View
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    @endif

    <!-- All Tasks -->
    @if($allTasks->count() > 0)
    <div class="bg-white shadow rounded-lg">
        <div class="px-6 py-4 border-b border-gray-200">
            <h3 class="text-lg font-medium text-gray-900 flex items-center justify-between">
                <span>
                    <i class="fas fa-list mr-2"></i>
                    All My Tasks
                </span>
                <span class="text-sm text-gray-500">{{ $allTasks->count() }} tasks</span>
            </h3>
        </div>
        <div class="divide-y divide-gray-200">
            @foreach($allTasks as $assignment)
            <div class="p-4 hover:bg-gray-50 transition-colors duration-150 task-item-all" data-task-id="{{ $assignment->id }}">
                <div class="flex items-center space-x-3">
                    <input type="checkbox" 
                           class="task-checkbox-all h-4 w-4 text-primary focus:ring-primary border-gray-300 rounded"
                           data-assignment-id="{{ $assignment->id }}"
                           {{ $assignment->status === 'completed' ? 'checked disabled' : '' }}>
                    
                    <div class="flex-1 min-w-0">
                        <div class="flex items-center justify-between">
                            <div>
                                <h4 class="text-sm font-medium text-gray-900 {{ $assignment->status === 'completed' ? 'line-through opacity-60' : '' }}">
                                    {{ $assignment->task->title }}
                                </h4>
                                <p class="text-xs text-gray-500 mt-1">
                                    {{ $assignment->task->project->name }}
                                    @if($assignment->task->due_date)
                                        • Due: {{ $assignment->task->due_date->format('M d') }}
                                    @endif
                                </p>
                            </div>
                            
                            <div class="flex items-center space-x-2">
                                <span class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-medium {{ $assignment->task->priority_color }}">
                                    {{ ucfirst($assignment->task->priority) }}
                                </span>
                                <span class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-medium {{ $assignment->status_color }}">
                                    {{ ucfirst(str_replace('_', ' ', $assignment->status)) }}
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    @else
    <div class="bg-white shadow rounded-lg p-12 text-center">
        <i class="fas fa-tasks text-6xl text-gray-300 mb-4"></i>
        <h3 class="text-lg font-medium text-gray-900 mb-2">No tasks assigned</h3>
        <p class="text-gray-500">You don't have any tasks assigned to you yet. Check back later!</p>
    </div>
    @endif
</div>

<!-- Task Detail Modal -->
<div id="taskModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full hidden z-50">
    <div class="relative top-20 mx-auto p-5 border w-11/12 md:w-3/4 lg:w-1/2 shadow-lg rounded-md bg-white">
        <div class="mt-3">
            <div class="flex items-center justify-between mb-4">
                <h3 class="text-lg font-medium text-gray-900" id="modalTitle">Task Details</h3>
                <button onclick="closeTaskModal()" class="text-gray-400 hover:text-gray-600">
                    <i class="fas fa-times text-xl"></i>
                </button>
            </div>
            <div id="modalContent">
                <!-- Task details will be loaded here -->
            </div>
        </div>
    </div>
</div>

<!-- Complete Task Modal -->
<div id="completeModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full hidden z-50">
    <div class="relative top-20 mx-auto p-5 border w-11/12 md:w-1/2 shadow-lg rounded-md bg-white">
        <form id="completeTaskForm" method="POST" action="">
            @csrf
            @method('PATCH')
            <div class="mb-4">
                <h3 class="text-lg font-medium text-gray-900 mb-4">Complete Task</h3>
                
                <div class="mb-4">
                    <label for="actual_hours" class="block text-sm font-medium text-gray-700">Hours Spent (Optional)</label>
                    <input type="number" id="actual_hours" name="actual_hours" min="0" max="24" step="0.5" 
                           class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-primary focus:border-primary sm:text-sm">
                </div>
                
                <div class="mb-4">
                    <label for="completion_notes" class="block text-sm font-medium text-gray-700">Completion Notes (Optional)</label>
                    <textarea id="completion_notes" name="notes" rows="3" 
                              class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-primary focus:border-primary sm:text-sm"
                              placeholder="Add any notes about the completed task..."></textarea>
                </div>
                
                <div class="flex justify-end space-x-3">
                    <button type="button" onclick="closeCompleteModal()" 
                            class="px-4 py-2 border border-gray-300 rounded-md text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary">
                        Cancel
                    </button>
                    <button type="submit" 
                            class="px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
                        <i class="fas fa-check mr-2"></i>
                        Mark Complete
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>

@endsection

<script>
// Filter functionality
function applyFilters() {
    const status = document.getElementById('statusFilter').value;
    const project = document.getElementById('projectFilter').value;
    
    const url = new URL(window.location);
    url.searchParams.set('status', status);
    if (project) {
        url.searchParams.set('project', project);
    } else {
        url.searchParams.delete('project');
    }
    
    window.location = url;
}

// Task detail modal
async function openTaskModal(assignmentId) {
    try {
        const response = await fetch(`/daily-tasks/${assignmentId}/show`);
        const task = await response.json();
        
        document.getElementById('modalTitle').textContent = task.title;
        document.getElementById('modalContent').innerHTML = `
            <div class="space-y-4">
                <div class="flex items-center justify-between">
                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800">
                        ${task.project}
                    </span>
                    <div class="flex space-x-2">
                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-yellow-100 text-yellow-800">
                            ${task.priority.charAt(0).toUpperCase() + task.priority.slice(1)}
                        </span>
                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-gray-100 text-gray-800">
                            ${task.status.replace('_', ' ').charAt(0).toUpperCase() + task.status.replace('_', ' ').slice(1)}
                        </span>
                    </div>
                </div>
                
                ${task.description ? `<div class="bg-gray-50 p-4 rounded-md"><p class="text-sm text-gray-700">${task.description}</p></div>` : ''}
                
                <div class="grid grid-cols-2 gap-4 text-sm">
                    ${task.due_date ? `<div><strong>Due Date:</strong> ${task.due_date}</div>` : ''}
                    ${task.estimated_hours ? `<div><strong>Estimated:</strong> ${task.estimated_hours} hours</div>` : ''}
                    ${task.actual_hours ? `<div><strong>Actual:</strong> ${task.actual_hours} hours</div>` : ''}
                    ${task.started_at ? `<div><strong>Started:</strong> ${task.started_at}</div>` : ''}
                    ${task.completed_at ? `<div><strong>Completed:</strong> ${task.completed_at}</div>` : ''}
                </div>
                
                ${task.notes ? `<div class="bg-blue-50 p-4 rounded-md"><strong class="text-sm">Notes:</strong><p class="text-sm text-gray-700 mt-1">${task.notes}</p></div>` : ''}
            </div>
        `;
        
        document.getElementById('taskModal').classList.remove('hidden');
    } catch (error) {
        console.error('Error fetching task details:', error);
        alert('Error loading task details. Please try again.');
    }
}

function closeTaskModal() {
    document.getElementById('taskModal').classList.add('hidden');
}

// Complete task modal
function openCompleteModal(assignmentId) {
    const form = document.getElementById('completeTaskForm');
    form.action = `/daily-tasks/${assignmentId}/complete`;
    document.getElementById('completeModal').classList.remove('hidden');
}

function closeCompleteModal() {
    document.getElementById('completeModal').classList.add('hidden');
    document.getElementById('completeTaskForm').reset();
}

// Close modals when clicking outside
window.onclick = function(event) {
    const taskModal = document.getElementById('taskModal');
    const completeModal = document.getElementById('completeModal');
    
    if (event.target === taskModal) {
        closeTaskModal();
    }
    if (event.target === completeModal) {
        closeCompleteModal();
    }
}
</script>