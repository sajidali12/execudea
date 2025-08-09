@extends('admin.layout')

@section('title', 'Create Task - ' . $project->name)
@section('page-title', 'Create New Task')

@section('content')
<div class="max-w-4xl mx-auto">
    <!-- Project Context -->
    <div class="bg-white shadow rounded-lg p-6 mb-6">
        <div class="flex items-center space-x-3">
            <i class="fas fa-project-diagram text-2xl text-primary"></i>
            <div>
                <h2 class="text-lg font-medium text-gray-900">{{ $project->name }}</h2>
                <p class="text-sm text-gray-600">{{ $project->description }}</p>
            </div>
        </div>
    </div>

    <!-- Task Form -->
    <div class="bg-white shadow rounded-lg p-6">
        <form method="POST" action="{{ route('admin.projects.tasks.store', $project) }}">
            @csrf
            
            <div class="space-y-6">
                <!-- Task Title -->
                <div>
                    <label for="title" class="block text-sm font-medium text-gray-700">Task Title</label>
                    <input type="text" 
                           id="title" 
                           name="title" 
                           value="{{ old('title') }}"
                           required
                           class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-primary focus:border-primary sm:text-sm @error('title') border-red-500 @enderror">
                    @error('title')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Task Description -->
                <div>
                    <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                    <textarea id="description" 
                              name="description" 
                              rows="4" 
                              class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-primary focus:border-primary sm:text-sm @error('description') border-red-500 @enderror"
                              placeholder="Provide detailed information about this task...">{{ old('description') }}</textarea>
                    @error('description')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Priority and Due Date -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="priority" class="block text-sm font-medium text-gray-700">Priority Level</label>
                        <select id="priority" 
                                name="priority" 
                                required
                                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-primary focus:border-primary sm:text-sm @error('priority') border-red-500 @enderror">
                            <option value="">Select Priority</option>
                            <option value="low" {{ old('priority') == 'low' ? 'selected' : '' }}>Low</option>
                            <option value="medium" {{ old('priority') == 'medium' ? 'selected' : '' }}>Medium</option>
                            <option value="high" {{ old('priority') == 'high' ? 'selected' : '' }}>High</option>
                            <option value="urgent" {{ old('priority') == 'urgent' ? 'selected' : '' }}>Urgent</option>
                        </select>
                        @error('priority')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="due_date" class="block text-sm font-medium text-gray-700">Due Date (Optional)</label>
                        <input type="date" 
                               id="due_date" 
                               name="due_date" 
                               value="{{ old('due_date') }}"
                               min="{{ date('Y-m-d') }}"
                               class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-primary focus:border-primary sm:text-sm @error('due_date') border-red-500 @enderror">
                        @error('due_date')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <!-- Estimated Hours -->
                <div>
                    <label for="estimated_hours" class="block text-sm font-medium text-gray-700">Estimated Hours (Optional)</label>
                    <div class="mt-1 relative rounded-md shadow-sm">
                        <input type="number" 
                               id="estimated_hours" 
                               name="estimated_hours" 
                               value="{{ old('estimated_hours') }}"
                               min="1" 
                               max="999"
                               step="0.5"
                               class="block w-full pr-12 border-gray-300 rounded-md shadow-sm focus:ring-primary focus:border-primary sm:text-sm @error('estimated_hours') border-red-500 @enderror">
                        <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                            <span class="text-gray-500 sm:text-sm">hours</span>
                        </div>
                    </div>
                    <p class="mt-1 text-xs text-gray-500">Enter the estimated time needed to complete this task</p>
                    @error('estimated_hours')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Priority Guide -->
                <div class="bg-gray-50 p-4 rounded-md">
                    <h4 class="text-sm font-medium text-gray-900 mb-2">Priority Guidelines:</h4>
                    <div class="space-y-1 text-xs text-gray-600">
                        <div class="flex items-center">
                            <span class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-medium bg-red-100 text-red-800 mr-2">Urgent</span>
                            Critical tasks that need immediate attention
                        </div>
                        <div class="flex items-center">
                            <span class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-medium bg-orange-100 text-orange-800 mr-2">High</span>
                            Important tasks that should be completed soon
                        </div>
                        <div class="flex items-center">
                            <span class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-medium bg-yellow-100 text-yellow-800 mr-2">Medium</span>
                            Standard tasks with moderate importance
                        </div>
                        <div class="flex items-center">
                            <span class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800 mr-2">Low</span>
                            Tasks that can be completed when time allows
                        </div>
                    </div>
                </div>
            </div>

            <!-- Form Actions -->
            <div class="mt-8 flex justify-end space-x-3">
                <a href="{{ route('admin.projects.tasks.index', $project) }}" 
                   class="px-4 py-2 border border-gray-300 rounded-md shadow-sm bg-white text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary">
                    Cancel
                </a>
                <button type="submit" 
                        class="px-4 py-2 border border-transparent rounded-md shadow-sm bg-primary text-sm font-medium text-white hover:bg-primary-dark focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary">
                    <i class="fas fa-plus mr-2"></i>
                    Create Task
                </button>
            </div>
        </form>
    </div>
</div>

@if($errors->any())
<div class="fixed bottom-4 right-4 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded shadow-lg">
    <div class="flex items-center">
        <i class="fas fa-exclamation-circle mr-2"></i>
        <span class="font-medium">Please fix the errors above</span>
    </div>
</div>
@endif

@endsection

@push('scripts')
<script>
// Auto-hide error notification
setTimeout(function() {
    const errorNotification = document.querySelector('.fixed.bottom-4.right-4');
    if (errorNotification) {
        errorNotification.style.transition = 'opacity 0.5s';
        errorNotification.style.opacity = '0';
        setTimeout(() => errorNotification.remove(), 500);
    }
}, 5000);
</script>
@endpush