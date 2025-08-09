@extends('admin.layout')

@section('title', $task->title . ' - ' . $project->name)
@section('page-title', 'Task Details')

@section('content')
<div class="space-y-6">
    <!-- Breadcrumb & Actions -->
    <div class="bg-white shadow rounded-lg p-6">
        <div class="flex items-center justify-between">
            <div>
                <nav class="flex" aria-label="Breadcrumb">
                    <ol class="flex items-center space-x-2 text-sm text-gray-500">
                        <li><a href="{{ route('admin.projects.index') }}" class="hover:text-gray-700">Projects</a></li>
                        <li><i class="fas fa-chevron-right"></i></li>
                        <li><a href="{{ route('admin.projects.show', $project) }}" class="hover:text-gray-700">{{ $project->name }}</a></li>
                        <li><i class="fas fa-chevron-right"></i></li>
                        <li><a href="{{ route('admin.projects.tasks.index', $project) }}" class="hover:text-gray-700">Tasks</a></li>
                        <li><i class="fas fa-chevron-right"></i></li>
                        <li class="text-gray-900">{{ Str::limit($task->title, 30) }}</li>
                    </ol>
                </nav>
            </div>
            <div class="flex space-x-3">
                <a href="{{ route('admin.projects.tasks.index', $project) }}" 
                   class="inline-flex items-center px-4 py-2 border border-gray-300 rounded-md shadow-sm bg-white text-sm font-medium text-gray-700 hover:bg-gray-50">
                    <i class="fas fa-arrow-left mr-2"></i>
                    Back to Tasks
                </a>
                <a href="{{ route('admin.projects.tasks.edit', [$project, $task]) }}" 
                   class="inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm bg-blue-600 text-sm font-medium text-white hover:bg-blue-700">
                    <i class="fas fa-edit mr-2"></i>
                    Edit Task
                </a>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <!-- Task Details -->
        <div class="lg:col-span-2 space-y-6">
            <!-- Task Information -->
            <div class="bg-white shadow rounded-lg p-6">
                <div class="flex items-start justify-between mb-4">
                    <h1 class="text-2xl font-bold text-gray-900">{{ $task->title }}</h1>
                    <div class="flex space-x-2">
                        <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium {{ $task->priority_color }}">
                            {{ ucfirst($task->priority) }} Priority
                        </span>
                        <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium {{ $task->status_color }}">
                            {{ ucfirst(str_replace('_', ' ', $task->status)) }}
                        </span>
                    </div>
                </div>

                @if($task->description)
                <div class="mb-6">
                    <h3 class="text-sm font-medium text-gray-900 mb-2">Description</h3>
                    <div class="bg-gray-50 p-4 rounded-md">
                        <p class="text-sm text-gray-700 whitespace-pre-line">{{ $task->description }}</p>
                    </div>
                </div>
                @endif

                <!-- Task Metadata -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <h4 class="text-sm font-medium text-gray-900 mb-3">Task Information</h4>
                        <dl class="space-y-2 text-sm">
                            <div class="flex justify-between">
                                <dt class="text-gray-500">Created by:</dt>
                                <dd class="text-gray-900 font-medium">{{ $task->creator->name }}</dd>
                            </div>
                            <div class="flex justify-between">
                                <dt class="text-gray-500">Created:</dt>
                                <dd class="text-gray-900">{{ $task->created_at->format('M d, Y \a\t H:i') }}</dd>
                            </div>
                            <div class="flex justify-between">
                                <dt class="text-gray-500">Last updated:</dt>
                                <dd class="text-gray-900">{{ $task->updated_at->format('M d, Y \a\t H:i') }}</dd>
                            </div>
                            @if($task->estimated_hours)
                            <div class="flex justify-between">
                                <dt class="text-gray-500">Estimated hours:</dt>
                                <dd class="text-gray-900 font-medium">{{ $task->estimated_hours }}h</dd>
                            </div>
                            @endif
                        </dl>
                    </div>

                    <div>
                        <h4 class="text-sm font-medium text-gray-900 mb-3">Timeline</h4>
                        <dl class="space-y-2 text-sm">
                            @if($task->due_date)
                            <div class="flex justify-between">
                                <dt class="text-gray-500">Due date:</dt>
                                <dd class="text-gray-900 font-medium {{ $task->isOverdue() ? 'text-red-600' : '' }}">
                                    {{ $task->due_date->format('M d, Y') }}
                                    @if($task->isOverdue())
                                        <span class="text-red-600 ml-1">(Overdue)</span>
                                    @endif
                                </dd>
                            </div>
                            @endif
                            <div class="flex justify-between">
                                <dt class="text-gray-500">Total assigned:</dt>
                                <dd class="text-gray-900 font-medium">{{ $task->assignments->count() }} user(s)</dd>
                            </div>
                            @php
                                $totalHours = $task->assignments->whereNotNull('actual_hours')->sum('actual_hours');
                            @endphp
                            @if($totalHours > 0)
                            <div class="flex justify-between">
                                <dt class="text-gray-500">Hours logged:</dt>
                                <dd class="text-gray-900 font-medium">{{ $totalHours }}h</dd>
                            </div>
                            @endif
                        </dl>
                    </div>
                </div>
            </div>

            <!-- Task Assignments -->
            <div class="bg-white shadow rounded-lg">
                <div class="px-6 py-4 border-b border-gray-200">
                    <h3 class="text-lg font-medium text-gray-900 flex items-center justify-between">
                        <span>Task Assignments</span>
                        <span class="text-sm text-gray-500">{{ $task->assignments->count() }} assigned</span>
                    </h3>
                </div>

                @if($task->assignments->count() > 0)
                <div class="divide-y divide-gray-200">
                    @foreach($task->assignments as $assignment)
                    <div class="p-6">
                        <div class="flex items-start justify-between">
                            <div class="flex items-start space-x-3">
                                <div class="flex-shrink-0">
                                    <div class="h-10 w-10 rounded-full bg-gray-300 flex items-center justify-center">
                                        <span class="text-sm font-medium text-gray-700">
                                            {{ substr($assignment->user->name, 0, 2) }}
                                        </span>
                                    </div>
                                </div>
                                <div>
                                    <h4 class="text-sm font-medium text-gray-900">{{ $assignment->user->name }}</h4>
                                    <p class="text-sm text-gray-500">{{ $assignment->user->email }}</p>
                                    
                                    @if($assignment->notes)
                                    <div class="mt-2 p-2 bg-gray-50 rounded text-sm text-gray-600">
                                        <strong>Notes:</strong> {{ $assignment->notes }}
                                    </div>
                                    @endif
                                </div>
                            </div>
                            
                            <div class="flex items-center space-x-3">
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium {{ $assignment->status_color }}">
                                    {{ ucfirst(str_replace('_', ' ', $assignment->status)) }}
                                </span>
                                
                                <div class="flex space-x-1">
                                    <button onclick="openAssignmentModal({{ $assignment->id }}, '{{ $assignment->user->name }}', '{{ $assignment->status }}', '{{ $assignment->notes }}', '{{ $assignment->actual_hours }}')"
                                            class="inline-flex items-center px-2 py-1 border border-gray-300 text-xs font-medium rounded text-gray-700 bg-white hover:bg-gray-50">
                                        <i class="fas fa-edit mr-1"></i>
                                        Update
                                    </button>
                                    
                                    <form method="POST" action="{{ route('admin.projects.tasks.assignments.destroy', [$project, $task, $assignment]) }}" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" 
                                                onclick="return confirm('Remove this user from the task?')"
                                                class="inline-flex items-center px-2 py-1 border border-red-300 text-xs font-medium rounded text-red-700 bg-white hover:bg-red-50">
                                            <i class="fas fa-times mr-1"></i>
                                            Remove
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Assignment Timeline -->
                        <div class="mt-4 pl-13">
                            <div class="flex items-center space-x-6 text-xs text-gray-500">
                                <div>Assigned: {{ $assignment->created_at->format('M d, Y') }}</div>
                                @if($assignment->started_at)
                                <div>Started: {{ $assignment->started_at->format('M d, Y H:i') }}</div>
                                @endif
                                @if($assignment->completed_at)
                                <div>Completed: {{ $assignment->completed_at->format('M d, Y H:i') }}</div>
                                @endif
                                @if($assignment->actual_hours)
                                <div class="font-medium">{{ $assignment->actual_hours }}h logged</div>
                                @endif
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                @else
                <div class="p-6 text-center">
                    <i class="fas fa-user-plus text-3xl text-gray-300 mb-2"></i>
                    <p class="text-gray-500">No users assigned to this task yet.</p>
                </div>
                @endif
            </div>
        </div>

        <!-- Sidebar -->
        <div class="space-y-6">
            <!-- Quick Actions -->
            <div class="bg-white shadow rounded-lg p-6">
                <h3 class="text-lg font-medium text-gray-900 mb-4">Quick Actions</h3>
                <div class="space-y-3">
                    <button onclick="openAssignModal()" 
                            class="w-full inline-flex items-center justify-center px-4 py-2 border border-transparent rounded-md shadow-sm bg-primary text-sm font-medium text-white hover:bg-primary-dark">
                        <i class="fas fa-user-plus mr-2"></i>
                        Assign User ({{ $users->count() }} available)
                    </button>
                    
                    <a href="{{ route('admin.projects.tasks.edit', [$project, $task]) }}" 
                       class="w-full inline-flex items-center justify-center px-4 py-2 border border-gray-300 rounded-md shadow-sm bg-white text-sm font-medium text-gray-700 hover:bg-gray-50">
                        <i class="fas fa-edit mr-2"></i>
                        Edit Task
                    </a>
                    
                    <form method="POST" action="{{ route('admin.projects.tasks.destroy', [$project, $task]) }}" class="w-full">
                        @csrf
                        @method('DELETE')
                        <button type="submit" 
                                onclick="return confirm('Are you sure you want to delete this task? This action cannot be undone.')"
                                class="w-full inline-flex items-center justify-center px-4 py-2 border border-red-300 rounded-md shadow-sm bg-white text-sm font-medium text-red-700 hover:bg-red-50">
                            <i class="fas fa-trash mr-2"></i>
                            Delete Task
                        </button>
                    </form>
                </div>
            </div>

            <!-- Project Info -->
            <div class="bg-white shadow rounded-lg p-6">
                <h3 class="text-lg font-medium text-gray-900 mb-4">Project Information</h3>
                <div class="space-y-3">
                    <div>
                        <div class="text-sm font-medium text-gray-500">Project Name</div>
                        <div class="text-sm text-gray-900">{{ $project->name }}</div>
                    </div>
                    @if($project->client)
                    <div>
                        <div class="text-sm font-medium text-gray-500">Client</div>
                        <div class="text-sm text-gray-900">{{ $project->client->name }}</div>
                    </div>
                    @endif
                    <div>
                        <div class="text-sm font-medium text-gray-500">Status</div>
                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-{{ $project->status_color }}-100 text-{{ $project->status_color }}-800">
                            {{ ucfirst($project->status) }}
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Assign User Modal -->
<div id="assignModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full hidden z-50">
    <div class="relative top-20 mx-auto p-5 border w-11/12 md:w-1/2 shadow-lg rounded-md bg-white">
        <form method="POST" action="{{ route('admin.projects.tasks.assign', [$project, $task]) }}">
            @csrf
            <div class="mb-4">
                <div class="flex items-center justify-between mb-4">
                    <h3 class="text-lg font-medium text-gray-900">Assign User to Task</h3>
                    <button type="button" onclick="closeAssignModal()" class="text-gray-400 hover:text-gray-600">
                        <i class="fas fa-times text-xl"></i>
                    </button>
                </div>
                
                <div class="mb-4">
                    <label for="user_id" class="block text-sm font-medium text-gray-700">Select User</label>
                    <select id="user_id" name="user_id" required
                            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-primary focus:border-primary sm:text-sm">
                        <option value="">Choose a user...</option>
                        @forelse($users as $user)
                            <option value="{{ $user->id }}">{{ $user->name }} ({{ $user->email }})</option>
                        @empty
                            <option value="" disabled>No users available</option>
                        @endforelse
                    </select>
                </div>
                
                <div class="mb-4">
                    <label for="assignment_notes" class="block text-sm font-medium text-gray-700">Assignment Notes (Optional)</label>
                    <textarea id="assignment_notes" name="notes" rows="3" 
                              class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-primary focus:border-primary sm:text-sm"
                              placeholder="Add any specific instructions or notes for this assignment..."></textarea>
                </div>
                
                <div class="flex justify-end space-x-3">
                    <button type="button" onclick="closeAssignModal()" 
                            class="px-4 py-2 border border-gray-300 rounded-md text-sm font-medium text-gray-700 hover:bg-gray-50">
                        Cancel
                    </button>
                    <button type="submit" 
                            class="px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-primary hover:bg-primary-dark">
                        <i class="fas fa-user-plus mr-2"></i>
                        Assign User
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>

<!-- Update Assignment Modal -->
<div id="assignmentModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full hidden z-50">
    <div class="relative top-20 mx-auto p-5 border w-11/12 md:w-1/2 shadow-lg rounded-md bg-white">
        <form id="assignmentForm" method="POST" action="">
            @csrf
            @method('PATCH')
            <div class="mb-4">
                <div class="flex items-center justify-between mb-4">
                    <h3 class="text-lg font-medium text-gray-900">Update Assignment</h3>
                    <button type="button" onclick="closeAssignmentModal()" class="text-gray-400 hover:text-gray-600">
                        <i class="fas fa-times text-xl"></i>
                    </button>
                </div>
                
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700">User</label>
                    <div id="assignmentUserName" class="mt-1 text-sm text-gray-900 font-medium"></div>
                </div>
                
                <div class="mb-4">
                    <label for="assignment_status" class="block text-sm font-medium text-gray-700">Status</label>
                    <select id="assignment_status" name="status" required
                            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-primary focus:border-primary sm:text-sm">
                        <option value="assigned">Assigned</option>
                        <option value="in_progress">In Progress</option>
                        <option value="completed">Completed</option>
                        <option value="cancelled">Cancelled</option>
                    </select>
                </div>
                
                <div class="mb-4">
                    <label for="assignment_actual_hours" class="block text-sm font-medium text-gray-700">Actual Hours</label>
                    <input type="number" id="assignment_actual_hours" name="actual_hours" min="0" max="999" step="0.5"
                           class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-primary focus:border-primary sm:text-sm">
                </div>
                
                <div class="mb-4">
                    <label for="assignment_notes_update" class="block text-sm font-medium text-gray-700">Notes</label>
                    <textarea id="assignment_notes_update" name="notes" rows="3" 
                              class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-primary focus:border-primary sm:text-sm"></textarea>
                </div>
                
                <div class="flex justify-end space-x-3">
                    <button type="button" onclick="closeAssignmentModal()" 
                            class="px-4 py-2 border border-gray-300 rounded-md text-sm font-medium text-gray-700 hover:bg-gray-50">
                        Cancel
                    </button>
                    <button type="submit" 
                            class="px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-blue-600 hover:bg-blue-700">
                        <i class="fas fa-save mr-2"></i>
                        Update Assignment
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>

@endsection

<script>
// Assign User Modal
function openAssignModal() {
    console.log('Opening assign modal');
    const modal = document.getElementById('assignModal');
    if (modal) {
        modal.classList.remove('hidden');
        console.log('Modal opened successfully');
    } else {
        console.error('Assign modal not found');
    }
}

function closeAssignModal() {
    console.log('Closing assign modal');
    const modal = document.getElementById('assignModal');
    if (modal) {
        modal.classList.add('hidden');
        document.getElementById('user_id').value = '';
        document.getElementById('assignment_notes').value = '';
    }
}

// Update Assignment Modal
function openAssignmentModal(assignmentId, userName, status, notes, actualHours) {
    document.getElementById('assignmentModal').classList.remove('hidden');
    document.getElementById('assignmentForm').action = `/admin/projects/{{ $project->id }}/tasks/{{ $task->id }}/assignments/${assignmentId}`;
    document.getElementById('assignmentUserName').textContent = userName;
    document.getElementById('assignment_status').value = status;
    document.getElementById('assignment_notes_update').value = notes || '';
    document.getElementById('assignment_actual_hours').value = actualHours || '';
}

function closeAssignmentModal() {
    document.getElementById('assignmentModal').classList.add('hidden');
}

// Close modals when clicking outside
window.onclick = function(event) {
    const assignModal = document.getElementById('assignModal');
    const assignmentModal = document.getElementById('assignmentModal');
    
    if (event.target === assignModal) {
        closeAssignModal();
    }
    if (event.target === assignmentModal) {
        closeAssignmentModal();
    }
}
</script>