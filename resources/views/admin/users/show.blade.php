@extends('admin.layout')

@section('title', 'User Details')

@section('content')
<div class="max-w-4xl mx-auto">
    <div class="bg-white shadow rounded-lg">
        <div class="px-6 py-4 border-b border-gray-200">
            <div class="flex items-center justify-between">
                <div>
                    <h2 class="text-xl font-semibold text-gray-800">User Details</h2>
                    <p class="text-sm text-gray-600 mt-1">View user information and permissions</p>
                </div>
                <div class="flex items-center space-x-3">
                    <a href="{{ route('admin.users.edit', $user) }}" 
                       class="bg-indigo-600 text-white px-4 py-2 rounded-lg hover:bg-indigo-700 transition duration-200">
                        <i class="fas fa-edit mr-2"></i>Edit User
                    </a>
                    <a href="{{ route('admin.users.index') }}" 
                       class="bg-gray-500 text-white px-4 py-2 rounded-lg hover:bg-gray-600 transition duration-200">
                        <i class="fas fa-arrow-left mr-2"></i>Back to Users
                    </a>
                </div>
            </div>
        </div>

        <div class="p-6">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <!-- User Information -->
                <div class="bg-gray-50 rounded-lg p-6">
                    <h3 class="text-lg font-semibold text-gray-900 mb-4 flex items-center">
                        <i class="fas fa-user text-primary mr-2"></i>
                        User Information
                    </h3>
                    
                    <div class="space-y-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-500">Full Name</label>
                            <p class="mt-1 text-sm text-gray-900">{{ $user->name }}</p>
                        </div>
                        
                        <div>
                            <label class="block text-sm font-medium text-gray-500">Email Address</label>
                            <p class="mt-1 text-sm text-gray-900">{{ $user->email }}</p>
                        </div>
                        
                        <div>
                            <label class="block text-sm font-medium text-gray-500">Role</label>
                            <span class="inline-flex px-3 py-1 text-sm font-semibold rounded-full mt-1
                                @if($user->role === 'admin') bg-red-100 text-red-800 
                                @else bg-blue-100 text-blue-800 @endif">
                                {{ ucfirst($user->role) }}
                            </span>
                        </div>
                        
                        <div>
                            <label class="block text-sm font-medium text-gray-500">Status</label>
                            <span class="inline-flex px-3 py-1 text-sm font-semibold rounded-full mt-1
                                @if($user->is_active) bg-green-100 text-green-800 
                                @else bg-gray-100 text-gray-800 @endif">
                                {{ $user->is_active ? 'Active' : 'Inactive' }}
                            </span>
                        </div>
                    </div>
                </div>

                <!-- Account Details -->
                <div class="bg-gray-50 rounded-lg p-6">
                    <h3 class="text-lg font-semibold text-gray-900 mb-4 flex items-center">
                        <i class="fas fa-info-circle text-primary mr-2"></i>
                        Account Details
                    </h3>
                    
                    <div class="space-y-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-500">User ID</label>
                            <p class="mt-1 text-sm text-gray-900 font-mono">#{{ $user->id }}</p>
                        </div>
                        
                        <div>
                            <label class="block text-sm font-medium text-gray-500">Created Date</label>
                            <p class="mt-1 text-sm text-gray-900">{{ $user->created_at->format('F d, Y') }}</p>
                            <p class="text-xs text-gray-500">{{ $user->created_at->format('h:i A') }}</p>
                        </div>
                        
                        <div>
                            <label class="block text-sm font-medium text-gray-500">Last Updated</label>
                            <p class="mt-1 text-sm text-gray-900">{{ $user->updated_at->format('F d, Y') }}</p>
                            <p class="text-xs text-gray-500">{{ $user->updated_at->format('h:i A') }}</p>
                        </div>
                        
                        <div>
                            <label class="block text-sm font-medium text-gray-500">Email Verified</label>
                            <span class="inline-flex px-3 py-1 text-sm font-semibold rounded-full mt-1
                                @if($user->email_verified_at) bg-green-100 text-green-800 
                                @else bg-yellow-100 text-yellow-800 @endif">
                                {{ $user->email_verified_at ? 'Verified' : 'Not Verified' }}
                            </span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Role Permissions -->
            <div class="mt-8 bg-blue-50 rounded-lg p-6">
                <h3 class="text-lg font-semibold text-blue-900 mb-4 flex items-center">
                    <i class="fas fa-shield-alt text-blue-600 mr-2"></i>
                    Role Permissions
                </h3>
                
                @if($user->role === 'admin')
                    <div class="space-y-3">
                        <div class="flex items-center">
                            <i class="fas fa-check-circle text-green-600 mr-3"></i>
                            <span class="text-sm text-blue-800">Full access to user management</span>
                        </div>
                        <div class="flex items-center">
                            <i class="fas fa-check-circle text-green-600 mr-3"></i>
                            <span class="text-sm text-blue-800">Complete site settings control</span>
                        </div>
                        <div class="flex items-center">
                            <i class="fas fa-check-circle text-green-600 mr-3"></i>
                            <span class="text-sm text-blue-800">Full posts and courses management</span>
                        </div>
                        <div class="flex items-center">
                            <i class="fas fa-check-circle text-green-600 mr-3"></i>
                            <span class="text-sm text-blue-800">Client management access</span>
                        </div>
                        <div class="flex items-center">
                            <i class="fas fa-check-circle text-green-600 mr-3"></i>
                            <span class="text-sm text-blue-800">System administration privileges</span>
                        </div>
                    </div>
                @else
                    <div class="space-y-3">
                        <div class="flex items-center">
                            <i class="fas fa-times-circle text-red-500 mr-3"></i>
                            <span class="text-sm text-blue-800">Cannot manage users</span>
                        </div>
                        <div class="flex items-center">
                            <i class="fas fa-check-circle text-green-600 mr-3"></i>
                            <span class="text-sm text-blue-800">Access to site settings</span>
                        </div>
                        <div class="flex items-center">
                            <i class="fas fa-check-circle text-green-600 mr-3"></i>
                            <span class="text-sm text-blue-800">Full posts and courses management</span>
                        </div>
                        <div class="flex items-center">
                            <i class="fas fa-check-circle text-green-600 mr-3"></i>
                            <span class="text-sm text-blue-800">Client management access</span>
                        </div>
                        <div class="flex items-center">
                            <i class="fas fa-times-circle text-red-500 mr-3"></i>
                            <span class="text-sm text-blue-800">Limited administrative access</span>
                        </div>
                    </div>
                @endif
            </div>

            <!-- Actions -->
            @if($user->id !== auth()->id())
                <div class="mt-8 pt-6 border-t border-gray-200">
                    <div class="flex justify-end space-x-4">
                        <form action="{{ route('admin.users.destroy', $user) }}" 
                              method="POST" 
                              onsubmit="return confirm('Are you sure you want to delete this user? This action cannot be undone.')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" 
                                    class="bg-red-600 text-white px-6 py-2 rounded-lg hover:bg-red-700 transition duration-200">
                                <i class="fas fa-trash mr-2"></i>Delete User
                            </button>
                        </form>
                    </div>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection