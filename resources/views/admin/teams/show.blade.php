@extends('admin.layout')

@section('title', 'Team Member Details')

@section('content')
<div class="max-w-4xl mx-auto">
    <div class="bg-white shadow rounded-lg">
        <div class="px-6 py-4 border-b border-gray-200">
            <div class="flex items-center justify-between">
                <div>
                    <h2 class="text-xl font-semibold text-gray-800">Team Member Details</h2>
                    <p class="text-sm text-gray-600 mt-1">{{ $team->name }}</p>
                </div>
                <div class="flex items-center space-x-3">
                    <a href="{{ route('admin.teams.edit', $team) }}" 
                       class="bg-primary text-white px-4 py-2 rounded-lg hover:bg-opacity-90 transition duration-200">
                        <i class="fas fa-edit mr-2"></i>Edit
                    </a>
                    <a href="{{ route('admin.teams.index') }}" 
                       class="bg-gray-500 text-white px-4 py-2 rounded-lg hover:bg-gray-600 transition duration-200">
                        <i class="fas fa-arrow-left mr-2"></i>Back to Team
                    </a>
                </div>
            </div>
        </div>

        <div class="p-6">
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                <!-- Main Information -->
                <div class="lg:col-span-2 space-y-8">
                    <!-- Personal Information -->
                    <div>
                        <h3 class="text-lg font-semibold text-gray-900 mb-4 flex items-center">
                            <i class="fas fa-user text-primary mr-2"></i>
                            Personal Information
                        </h3>
                        <div class="bg-gray-50 rounded-lg p-6">
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div>
                                    <label class="block text-sm font-medium text-gray-500 mb-1">Full Name</label>
                                    <p class="text-gray-900 font-medium">{{ $team->name }}</p>
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-500 mb-1">Email Address</label>
                                    <p class="text-gray-900">
                                        <a href="mailto:{{ $team->email }}" class="text-blue-600 hover:underline">{{ $team->email }}</a>
                                    </p>
                                </div>
                                @if($team->phone)
                                    <div>
                                        <label class="block text-sm font-medium text-gray-500 mb-1">Phone Number</label>
                                        <p class="text-gray-900">
                                            <a href="tel:{{ $team->phone }}" class="text-blue-600 hover:underline">{{ $team->phone }}</a>
                                        </p>
                                    </div>
                                @endif
                                @if($team->user)
                                    <div>
                                        <label class="block text-sm font-medium text-gray-500 mb-1">System User</label>
                                        <p class="text-gray-900">{{ $team->user->name }} ({{ $team->user->role }})</p>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>

                    <!-- Professional Information -->
                    <div>
                        <h3 class="text-lg font-semibold text-gray-900 mb-4 flex items-center">
                            <i class="fas fa-briefcase text-primary mr-2"></i>
                            Professional Information
                        </h3>
                        <div class="bg-gray-50 rounded-lg p-6">
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div>
                                    <label class="block text-sm font-medium text-gray-500 mb-1">Designation</label>
                                    <p class="text-gray-900 font-medium">{{ $team->designation }}</p>
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-500 mb-1">Department</label>
                                    <p class="text-gray-900">{{ $team->department }}</p>
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-500 mb-1">Monthly Salary</label>
                                    <p class="text-2xl font-bold text-green-600">PKR {{ number_format($team->salary, 2) }}</p>
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-500 mb-1">Status</label>
                                    <span class="inline-flex px-3 py-1 text-sm font-semibold rounded-full 
                                        {{ $team->status === 'active' ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                        {{ ucfirst($team->status) }}
                                    </span>
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-500 mb-1">Joining Date</label>
                                    <p class="text-gray-900">{{ $team->joining_date->format('F d, Y') }}</p>
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-500 mb-1">Years of Service</label>
                                    <p class="text-gray-900">{{ $team->years_of_service }} {{ $team->years_of_service == 1 ? 'year' : 'years' }}</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    @if($team->skills && count($team->skills) > 0)
                        <!-- Skills -->
                        <div>
                            <h3 class="text-lg font-semibold text-gray-900 mb-4 flex items-center">
                                <i class="fas fa-cogs text-primary mr-2"></i>
                                Skills & Expertise
                            </h3>
                            <div class="bg-gray-50 rounded-lg p-6">
                                <div class="flex flex-wrap gap-2">
                                    @foreach($team->skills as $skill)
                                        <span class="inline-flex px-3 py-1 text-sm font-medium bg-blue-100 text-blue-800 rounded-full">
                                            {{ $skill }}
                                        </span>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    @endif

                    @if($team->bio)
                        <!-- Bio -->
                        <div>
                            <h3 class="text-lg font-semibold text-gray-900 mb-4 flex items-center">
                                <i class="fas fa-info-circle text-primary mr-2"></i>
                                Bio
                            </h3>
                            <div class="bg-blue-50 border-l-4 border-blue-400 p-4">
                                <p class="text-gray-900 leading-relaxed">{{ $team->bio }}</p>
                            </div>
                        </div>
                    @endif
                </div>

                <!-- Sidebar -->
                <div class="space-y-6">
                    <!-- Profile Picture -->
                    <div class="bg-white border rounded-lg p-6 text-center">
                        <img src="{{ $team->profile_image }}" 
                             alt="{{ $team->name }}" 
                             class="w-32 h-32 rounded-full mx-auto object-cover border-4 border-gray-100 mb-4">
                        <h4 class="text-lg font-semibold text-gray-900">{{ $team->name }}</h4>
                        <p class="text-primary font-medium">{{ $team->designation }}</p>
                    </div>

                    <!-- Quick Actions -->
                    <div class="bg-gray-50 rounded-lg p-4">
                        <h4 class="font-medium text-gray-900 mb-3">Quick Actions</h4>
                        <div class="space-y-2">
                            <a href="{{ route('admin.teams.edit', $team) }}" 
                               class="w-full flex items-center px-3 py-2 text-sm text-blue-600 hover:bg-blue-50 rounded-lg transition duration-200">
                                <i class="fas fa-edit mr-2"></i>
                                Edit Details
                            </a>
                            <a href="mailto:{{ $team->email }}" 
                               class="w-full flex items-center px-3 py-2 text-sm text-green-600 hover:bg-green-50 rounded-lg transition duration-200">
                                <i class="fas fa-envelope mr-2"></i>
                                Send Email
                            </a>
                            @if($team->phone)
                                <a href="tel:{{ $team->phone }}" 
                                   class="w-full flex items-center px-3 py-2 text-sm text-purple-600 hover:bg-purple-50 rounded-lg transition duration-200">
                                    <i class="fas fa-phone mr-2"></i>
                                    Call Phone
                                </a>
                            @endif
                            <form action="{{ route('admin.teams.destroy', $team) }}" 
                                  method="POST" 
                                  onsubmit="return confirm('Are you sure you want to delete {{ $team->name }}? This action cannot be undone.')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" 
                                        class="w-full flex items-center px-3 py-2 text-sm text-red-600 hover:bg-red-50 rounded-lg transition duration-200">
                                    <i class="fas fa-trash mr-2"></i>
                                    Delete Member
                                </button>
                            </form>
                        </div>
                    </div>

                    <!-- Summary -->
                    <div class="bg-blue-50 rounded-lg p-4">
                        <h4 class="font-medium text-gray-900 mb-3">Summary</h4>
                        <div class="space-y-3">
                            <div class="flex justify-between">
                                <span class="text-sm text-gray-600">Department:</span>
                                <span class="text-sm font-medium text-gray-900">{{ $team->department }}</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-sm text-gray-600">Status:</span>
                                <span class="text-sm font-medium text-gray-900">{{ ucfirst($team->status) }}</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-sm text-gray-600">Joining Date:</span>
                                <span class="text-sm font-medium text-gray-900">{{ $team->joining_date->format('M d, Y') }}</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-sm text-gray-600">Monthly Salary:</span>
                                <span class="text-sm font-medium text-green-600">PKR {{ number_format($team->salary, 2) }}</span>
                            </div>
                        </div>
                    </div>

                    <!-- Record Information -->
                    <div class="bg-gray-50 rounded-lg p-4">
                        <h4 class="font-medium text-gray-900 mb-3">Record Information</h4>
                        <div class="space-y-2 text-sm text-gray-600">
                            <div>
                                <span class="font-medium">Added:</span><br>
                                {{ $team->created_at->format('F d, Y g:i A') }}
                            </div>
                            <div>
                                <span class="font-medium">Last Updated:</span><br>
                                {{ $team->updated_at->format('F d, Y g:i A') }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection