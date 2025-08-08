@extends('admin.layout')

@section('title', 'Projects Management')

@section('content')
<div class="max-w-7xl mx-auto">
    <div class="bg-white shadow rounded-lg">
        <div class="px-6 py-4 border-b border-gray-200">
            <div class="flex justify-between items-center">
                <div>
                    <h2 class="text-xl font-semibold text-gray-800">Projects Management</h2>
                    <p class="text-sm text-gray-600 mt-1">Manage your client projects</p>
                </div>
                <div class="flex items-center space-x-4">
                    <div class="text-sm text-gray-600">
                        Total: <span class="font-semibold">{{ $projects->total() }}</span> projects
                    </div>
                    <a href="{{ route('admin.projects.create') }}" 
                       class="bg-primary text-white px-4 py-2 rounded-lg hover:bg-opacity-90 transition duration-200">
                        <i class="fas fa-plus mr-2"></i>Add Project
                    </a>
                </div>
            </div>
        </div>

        <!-- Filters -->
        <div class="p-6 bg-gray-50 border-b">
            <form method="GET" class="flex flex-col sm:flex-row gap-4">
                <!-- Search -->
                <div class="flex-1">
                    <input type="text" 
                           name="search" 
                           value="{{ request('search') }}" 
                           placeholder="Search by project name, description, or client..." 
                           class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary focus:border-primary">
                </div>
                
                <!-- Status Filter -->
                <div class="sm:w-48">
                    <select name="status" 
                            class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary focus:border-primary">
                        <option value="">All Status</option>
                        <option value="pending" {{ request('status') == 'pending' ? 'selected' : '' }}>Pending</option>
                        <option value="active" {{ request('status') == 'active' ? 'selected' : '' }}>Active</option>
                        <option value="completed" {{ request('status') == 'completed' ? 'selected' : '' }}>Completed</option>
                        <option value="on_hold" {{ request('status') == 'on_hold' ? 'selected' : '' }}>On Hold</option>
                        <option value="cancelled" {{ request('status') == 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                    </select>
                </div>

                <!-- Client Filter -->
                <div class="sm:w-56">
                    <select name="client_id" 
                            class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary focus:border-primary">
                        <option value="">All Clients</option>
                        @foreach($clients as $client)
                            <option value="{{ $client->id }}" {{ request('client_id') == $client->id ? 'selected' : '' }}>
                                {{ $client->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                
                <!-- Filter Button -->
                <button type="submit" 
                        class="px-4 py-2 bg-primary text-white rounded-lg hover:bg-opacity-90 transition duration-200">
                    <i class="fas fa-search mr-2"></i>Filter
                </button>
                
                <!-- Clear Filters -->
                @if(request('search') || request('status') || request('client_id'))
                    <a href="{{ route('admin.projects.index') }}" 
                       class="px-4 py-2 bg-gray-500 text-white rounded-lg hover:bg-gray-600 transition duration-200">
                        <i class="fas fa-times mr-2"></i>Clear
                    </a>
                @endif
            </form>
        </div>

        <div class="p-6">
            @if($projects->count() > 0)
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Project Info
                                </th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Client
                                </th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Status
                                </th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Progress
                                </th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Budget
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
                            @foreach($projects as $project)
                                <tr class="hover:bg-gray-50">
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div>
                                            <div class="text-sm font-medium text-gray-900">{{ $project->name }}</div>
                                            <div class="text-sm text-gray-500">{{ $project->type }}</div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm font-medium text-gray-900">{{ $project->client->name }}</div>
                                        <div class="text-sm text-gray-500">{{ $project->client->email }}</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <span class="inline-flex px-2 py-1 text-xs font-semibold rounded-full 
                                            @if($project->status === 'active') bg-blue-100 text-blue-800
                                            @elseif($project->status === 'completed') bg-green-100 text-green-800
                                            @elseif($project->status === 'pending') bg-yellow-100 text-yellow-800
                                            @elseif($project->status === 'on_hold') bg-red-100 text-red-800
                                            @else bg-gray-100 text-gray-800 @endif">
                                            {{ ucfirst(str_replace('_', ' ', $project->status)) }}
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div class="flex-1">
                                                <div class="w-full bg-gray-200 rounded-full h-2">
                                                    <div class="h-2 rounded-full 
                                                        @if($project->progress >= 80) bg-green-500
                                                        @elseif($project->progress >= 50) bg-blue-500
                                                        @elseif($project->progress >= 25) bg-yellow-500
                                                        @else bg-red-500 @endif" 
                                                         style="width: {{ $project->progress ?? 0 }}%"></div>
                                                </div>
                                            </div>
                                            <span class="ml-2 text-sm text-gray-600">{{ $project->progress ?? 0 }}%</span>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-900">
                                            @if($project->budget)
                                                PKR {{ number_format($project->budget) }}
                                            @else
                                                N/A
                                            @endif
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        @if($project->due_date)
                                            <div class="text-sm text-gray-900">{{ $project->due_date->format('M d, Y') }}</div>
                                            @if($project->due_date->isPast() && $project->status !== 'completed')
                                                <div class="text-xs text-red-600">Overdue</div>
                                            @endif
                                        @else
                                            <span class="text-gray-400">No due date</span>
                                        @endif
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium space-x-2">
                                        <a href="{{ route('admin.projects.show', $project) }}" 
                                           class="text-blue-600 hover:text-blue-900" 
                                           title="View Project">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        <a href="{{ route('admin.projects.edit', $project) }}" 
                                           class="text-indigo-600 hover:text-indigo-900"
                                           title="Edit Project">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <form action="{{ route('admin.projects.destroy', $project) }}" 
                                              method="POST" 
                                              class="inline"
                                              onsubmit="return confirm('Are you sure you want to delete this project?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" 
                                                    class="text-red-600 hover:text-red-900"
                                                    title="Delete Project">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <!-- Pagination -->
                <div class="mt-6">
                    {{ $projects->withQueryString()->links() }}
                </div>
            @else
                <div class="text-center py-12">
                    <i class="fas fa-project-diagram text-6xl text-gray-300 mb-4"></i>
                    <h3 class="text-lg font-medium text-gray-900 mb-2">No Projects Found</h3>
                    @if(request('search') || request('status') || request('client_id'))
                        <p class="text-gray-500 mb-6">Try adjusting your search filters.</p>
                        <a href="{{ route('admin.projects.index') }}" 
                           class="bg-primary text-white px-6 py-3 rounded-lg hover:bg-opacity-90 transition duration-200">
                            <i class="fas fa-times mr-2"></i>Clear Filters
                        </a>
                    @else
                        <p class="text-gray-500 mb-6">No projects have been created yet.</p>
                        <a href="{{ route('admin.projects.create') }}" 
                           class="bg-primary text-white px-6 py-3 rounded-lg hover:bg-opacity-90 transition duration-200">
                            <i class="fas fa-plus mr-2"></i>Create First Project
                        </a>
                    @endif
                </div>
            @endif
        </div>
    </div>
</div>

@push('scripts')
<script>
document.querySelector('select[name="status"]').addEventListener('change', function() {
    this.form.submit();
});

document.querySelector('select[name="client_id"]').addEventListener('change', function() {
    this.form.submit();
});
</script>
@endpush
@endsection