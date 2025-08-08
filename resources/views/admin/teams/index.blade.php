@extends('admin.layout')

@section('title', 'Team Management')

@section('content')
<div class="max-w-7xl mx-auto">
    <div class="bg-white shadow rounded-lg">
        <div class="px-6 py-4 border-b border-gray-200">
            <div class="flex justify-between items-center">
                <div>
                    <h2 class="text-xl font-semibold text-gray-800">Team Management</h2>
                    <p class="text-sm text-gray-600 mt-1">Manage your team members and their information</p>
                </div>
                <div class="flex items-center space-x-4">
                    <div class="text-sm text-gray-600">
                        Total: <span class="font-semibold">{{ $teams->total() }}</span> members
                    </div>
                    <a href="{{ route('admin.teams.create') }}" 
                       class="bg-primary text-white px-4 py-2 rounded-lg hover:bg-opacity-90 transition duration-200">
                        <i class="fas fa-user-plus mr-2"></i>Add Team Member
                    </a>
                </div>
            </div>
        </div>

        <!-- Summary Cards -->
        <div class="p-6 bg-gray-50 border-b">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div class="bg-white p-4 rounded-lg shadow-sm border">
                    <div class="flex items-center">
                        <div class="p-2 bg-blue-100 rounded-lg">
                            <i class="fas fa-users text-blue-600"></i>
                        </div>
                        <div class="ml-4">
                            <p class="text-sm font-medium text-gray-600">Total Members</p>
                            <p class="text-xl font-semibold text-gray-900">{{ $totalMembers }}</p>
                        </div>
                    </div>
                </div>
                <div class="bg-white p-4 rounded-lg shadow-sm border">
                    <div class="flex items-center">
                        <div class="p-2 bg-green-100 rounded-lg">
                            <i class="fas fa-user-check text-green-600"></i>
                        </div>
                        <div class="ml-4">
                            <p class="text-sm font-medium text-gray-600">Active Members</p>
                            <p class="text-xl font-semibold text-gray-900">{{ $activeMembers }}</p>
                        </div>
                    </div>
                </div>
                <div class="bg-white p-4 rounded-lg shadow-sm border">
                    <div class="flex items-center">
                        <div class="p-2 bg-purple-100 rounded-lg">
                            <i class="fas fa-money-bill-wave text-purple-600"></i>
                        </div>
                        <div class="ml-4">
                            <p class="text-sm font-medium text-gray-600">Monthly Salary Cost</p>
                            <p class="text-xl font-semibold text-gray-900">PKR {{ number_format($totalSalaryExpense, 2) }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Filters -->
        <div class="p-6 bg-gray-50 border-b">
            <form method="GET" class="grid grid-cols-1 md:grid-cols-4 gap-4">
                <!-- Search -->
                <div>
                    <input type="text" 
                           name="search" 
                           value="{{ request('search') }}" 
                           placeholder="Search members..." 
                           class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary focus:border-primary">
                </div>
                
                <!-- Status Filter -->
                <div>
                    <select name="status" 
                            class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary focus:border-primary">
                        <option value="">All Status</option>
                        <option value="active" {{ request('status') == 'active' ? 'selected' : '' }}>Active</option>
                        <option value="inactive" {{ request('status') == 'inactive' ? 'selected' : '' }}>Inactive</option>
                    </select>
                </div>

                <!-- Department Filter -->
                <div>
                    <select name="department" 
                            class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary focus:border-primary">
                        <option value="">All Departments</option>
                        @foreach($departments as $department)
                            <option value="{{ $department }}" {{ request('department') == $department ? 'selected' : '' }}>
                                {{ $department }}
                            </option>
                        @endforeach
                    </select>
                </div>
                
                <!-- Filter Button -->
                <button type="submit" 
                        class="px-4 py-2 bg-primary text-white rounded-lg hover:bg-opacity-90 transition duration-200">
                    <i class="fas fa-search mr-2"></i>Filter
                </button>
            </form>

            <!-- Clear Filters -->
            @if(request('search') || request('status') || request('department'))
                <div class="mt-4">
                    <a href="{{ route('admin.teams.index') }}" 
                       class="text-sm text-gray-600 hover:text-gray-900">
                        <i class="fas fa-times mr-1"></i>Clear all filters
                    </a>
                </div>
            @endif
        </div>

        <div class="p-6">
            @if($teams->count() > 0)
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach($teams as $member)
                        <div class="bg-white border border-gray-200 rounded-lg hover:shadow-lg transition-shadow duration-200">
                            <div class="p-6">
                                <!-- Profile Section -->
                                <div class="text-center mb-4">
                                    <img src="{{ $member->profile_image }}" 
                                         alt="{{ $member->name }}" 
                                         class="w-20 h-20 rounded-full mx-auto object-cover border-4 border-gray-100">
                                    <h3 class="text-lg font-semibold text-gray-900 mt-3">{{ $member->name }}</h3>
                                    <p class="text-primary font-medium">{{ $member->designation }}</p>
                                    <div class="flex items-center justify-center mt-2">
                                        <span class="inline-flex px-2 py-1 text-xs font-medium rounded-full
                                            {{ $member->status === 'active' ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                            {{ ucfirst($member->status) }}
                                        </span>
                                    </div>
                                </div>

                                <!-- Details -->
                                <div class="space-y-2 text-sm">
                                    <div class="flex items-center text-gray-600">
                                        <i class="fas fa-building w-4 mr-2"></i>
                                        <span>{{ $member->department ?? 'Not assigned' }}</span>
                                    </div>
                                    <div class="flex items-center text-gray-600">
                                        <i class="fas fa-envelope w-4 mr-2"></i>
                                        <span>{{ $member->email }}</span>
                                    </div>
                                    @if($member->phone)
                                        <div class="flex items-center text-gray-600">
                                            <i class="fas fa-phone w-4 mr-2"></i>
                                            <span>{{ $member->phone }}</span>
                                        </div>
                                    @endif
                                    <div class="flex items-center text-gray-600">
                                        <i class="fas fa-calendar w-4 mr-2"></i>
                                        <span>{{ $member->joining_date->format('M d, Y') }}</span>
                                    </div>
                                    <div class="flex items-center text-gray-600">
                                        <i class="fas fa-money-bill w-4 mr-2"></i>
                                        <span class="font-medium">PKR {{ number_format($member->salary, 2) }}</span>
                                    </div>
                                </div>

                                <!-- Skills -->
                                @if($member->skills && count($member->skills) > 0)
                                    <div class="mt-4">
                                        <div class="flex flex-wrap gap-1">
                                            @foreach($member->skills as $skill)
                                                <span class="inline-flex px-2 py-1 text-xs bg-blue-100 text-blue-800 rounded-full">
                                                    {{ $skill }}
                                                </span>
                                            @endforeach
                                        </div>
                                    </div>
                                @endif

                                <!-- Actions -->
                                <div class="flex justify-between items-center mt-6 pt-4 border-t border-gray-100">
                                    <a href="{{ route('admin.teams.show', $member) }}" 
                                       class="text-blue-600 hover:text-blue-800 text-sm font-medium">
                                        <i class="fas fa-eye mr-1"></i>View
                                    </a>
                                    <div class="flex space-x-2">
                                        <a href="{{ route('admin.teams.edit', $member) }}" 
                                           class="text-indigo-600 hover:text-indigo-800 text-sm font-medium">
                                            <i class="fas fa-edit mr-1"></i>Edit
                                        </a>
                                        <form action="{{ route('admin.teams.destroy', $member) }}" 
                                              method="POST" 
                                              class="inline"
                                              onsubmit="return confirm('Are you sure you want to delete {{ $member->name }}?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" 
                                                    class="text-red-600 hover:text-red-800 text-sm font-medium">
                                                <i class="fas fa-trash mr-1"></i>Delete
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <!-- Pagination -->
                <div class="mt-6">
                    {{ $teams->withQueryString()->links() }}
                </div>
            @else
                <div class="text-center py-12">
                    <i class="fas fa-users text-6xl text-gray-300 mb-4"></i>
                    <h3 class="text-lg font-medium text-gray-900 mb-2">No Team Members Found</h3>
                    @if(request('search') || request('status') || request('department'))
                        <p class="text-gray-500 mb-6">Try adjusting your search filters.</p>
                        <a href="{{ route('admin.teams.index') }}" 
                           class="bg-primary text-white px-6 py-3 rounded-lg hover:bg-opacity-90 transition duration-200">
                            <i class="fas fa-times mr-2"></i>Clear Filters
                        </a>
                    @else
                        <p class="text-gray-500 mb-6">No team members have been added yet.</p>
                        <a href="{{ route('admin.teams.create') }}" 
                           class="bg-primary text-white px-6 py-3 rounded-lg hover:bg-opacity-90 transition duration-200">
                            <i class="fas fa-user-plus mr-2"></i>Add First Team Member
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

document.querySelector('select[name="department"]').addEventListener('change', function() {
    this.form.submit();
});
</script>
@endpush
@endsection