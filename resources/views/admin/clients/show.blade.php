@extends('admin.layout')

@section('title', 'Client Details')

@section('content')
<div class="max-w-4xl mx-auto">
    <div class="bg-white shadow rounded-lg">
        <div class="px-6 py-4 border-b border-gray-200">
            <div class="flex items-center justify-between">
                <div>
                    <h2 class="text-xl font-semibold text-gray-800">Client Details</h2>
                    <p class="text-sm text-gray-600 mt-1">View complete client information</p>
                </div>
                <div class="flex items-center space-x-3">
                    <a href="{{ route('admin.clients.edit', $client) }}" 
                       class="bg-indigo-600 text-white px-4 py-2 rounded-lg hover:bg-indigo-700 transition duration-200">
                        <i class="fas fa-edit mr-2"></i>Edit Client
                    </a>
                    <a href="{{ route('admin.clients.index') }}" 
                       class="bg-gray-500 text-white px-4 py-2 rounded-lg hover:bg-gray-600 transition duration-200">
                        <i class="fas fa-arrow-left mr-2"></i>Back to Clients
                    </a>
                </div>
            </div>
        </div>

        <div class="p-6">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <!-- Personal Information -->
                <div class="bg-gray-50 rounded-lg p-6">
                    <h3 class="text-lg font-semibold text-gray-900 mb-4 flex items-center">
                        <i class="fas fa-user text-primary mr-2"></i>
                        Personal Information
                    </h3>
                    
                    <div class="space-y-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-500">Full Name</label>
                            <p class="mt-1 text-sm text-gray-900">{{ $client->name }}</p>
                        </div>
                        
                        <div>
                            <label class="block text-sm font-medium text-gray-500">Email Address</label>
                            <p class="mt-1 text-sm text-gray-900">
                                <a href="mailto:{{ $client->email }}" class="text-primary hover:underline">
                                    {{ $client->email }}
                                </a>
                            </p>
                        </div>
                        
                        <div>
                            <label class="block text-sm font-medium text-gray-500">Phone Number</label>
                            <p class="mt-1 text-sm text-gray-900">
                                @if($client->phone)
                                    <a href="tel:{{ $client->phone }}" class="text-primary hover:underline">
                                        {{ $client->phone }}
                                    </a>
                                @else
                                    <span class="text-gray-400">Not provided</span>
                                @endif
                            </p>
                        </div>
                        
                        <div>
                            <label class="block text-sm font-medium text-gray-500">Status</label>
                            <span class="inline-flex px-3 py-1 text-sm font-semibold rounded-full mt-1
                                @if($client->status === 'active') bg-green-100 text-green-800
                                @elseif($client->status === 'pending') bg-yellow-100 text-yellow-800
                                @else bg-gray-100 text-gray-800 @endif">
                                {{ ucfirst($client->status) }}
                            </span>
                        </div>
                    </div>
                </div>

                <!-- Company Information -->
                <div class="bg-gray-50 rounded-lg p-6">
                    <h3 class="text-lg font-semibold text-gray-900 mb-4 flex items-center">
                        <i class="fas fa-building text-primary mr-2"></i>
                        Company Information
                    </h3>
                    
                    <div class="space-y-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-500">Company Name</label>
                            <p class="mt-1 text-sm text-gray-900">
                                {{ $client->company ?: 'Not provided' }}
                            </p>
                        </div>
                        
                        <div>
                            <label class="block text-sm font-medium text-gray-500">City</label>
                            <p class="mt-1 text-sm text-gray-900">
                                {{ $client->city ?: 'Not provided' }}
                            </p>
                        </div>
                        
                        <div>
                            <label class="block text-sm font-medium text-gray-500">Country</label>
                            <p class="mt-1 text-sm text-gray-900">{{ $client->country }}</p>
                        </div>
                        
                        <div>
                            <label class="block text-sm font-medium text-gray-500">Address</label>
                            <p class="mt-1 text-sm text-gray-900">
                                {{ $client->address ?: 'Not provided' }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Project Information -->
            <div class="mt-8 bg-blue-50 rounded-lg p-6">
                <h3 class="text-lg font-semibold text-blue-900 mb-4 flex items-center">
                    <i class="fas fa-project-diagram text-blue-600 mr-2"></i>
                    Project Summary
                </h3>
                
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <div class="text-center">
                        <div class="text-3xl font-bold text-blue-600 mb-2">{{ $client->total_projects }}</div>
                        <div class="text-sm text-blue-800">Total Projects</div>
                    </div>
                    
                    <div class="text-center">
                        <div class="text-3xl font-bold text-green-600 mb-2">
                            @if($client->total_projects_value > 0)
                                PKR {{ number_format($client->total_projects_value) }}
                            @else
                                PKR 0
                            @endif
                        </div>
                        <div class="text-sm text-blue-800">Total Value</div>
                    </div>
                    
                    <div class="text-center">
                        <div class="text-3xl font-bold text-purple-600 mb-2">
                            @if($client->last_project_date)
                                {{ $client->last_project_date->format('M Y') }}
                            @else
                                N/A
                            @endif
                        </div>
                        <div class="text-sm text-blue-800">Last Project</div>
                    </div>
                </div>
            </div>

            <!-- Notes -->
            @if($client->notes)
                <div class="mt-8 bg-yellow-50 rounded-lg p-6">
                    <h3 class="text-lg font-semibold text-yellow-900 mb-4 flex items-center">
                        <i class="fas fa-sticky-note text-yellow-600 mr-2"></i>
                        Notes
                    </h3>
                    <p class="text-sm text-yellow-800 whitespace-pre-line">{{ $client->notes }}</p>
                </div>
            @endif

            <!-- Account Details -->
            <div class="mt-8 bg-gray-50 rounded-lg p-6">
                <h3 class="text-lg font-semibold text-gray-900 mb-4 flex items-center">
                    <i class="fas fa-info-circle text-primary mr-2"></i>
                    Account Details
                </h3>
                
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <div>
                        <label class="block text-sm font-medium text-gray-500">Client ID</label>
                        <p class="mt-1 text-sm text-gray-900 font-mono">#{{ $client->id }}</p>
                    </div>
                    
                    <div>
                        <label class="block text-sm font-medium text-gray-500">Created Date</label>
                        <p class="mt-1 text-sm text-gray-900">{{ $client->created_at->format('F d, Y') }}</p>
                        <p class="text-xs text-gray-500">{{ $client->created_at->format('h:i A') }}</p>
                    </div>
                    
                    <div>
                        <label class="block text-sm font-medium text-gray-500">Last Updated</label>
                        <p class="mt-1 text-sm text-gray-900">{{ $client->updated_at->format('F d, Y') }}</p>
                        <p class="text-xs text-gray-500">{{ $client->updated_at->format('h:i A') }}</p>
                    </div>
                </div>
            </div>

            <!-- Quick Actions -->
            <div class="mt-8 bg-white border border-gray-200 rounded-lg p-6">
                <h3 class="text-lg font-semibold text-gray-900 mb-4 flex items-center">
                    <i class="fas fa-bolt text-primary mr-2"></i>
                    Quick Actions
                </h3>
                
                <div class="flex flex-wrap gap-3">
                    <a href="mailto:{{ $client->email }}" 
                       class="inline-flex items-center px-4 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700 transition duration-200">
                        <i class="fas fa-envelope mr-2"></i>
                        Send Email
                    </a>
                    
                    @if($client->phone)
                        <a href="tel:{{ $client->phone }}" 
                           class="inline-flex items-center px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition duration-200">
                            <i class="fas fa-phone mr-2"></i>
                            Call Client
                        </a>
                    @endif
                    
                    <a href="{{ route('admin.clients.edit', $client) }}" 
                       class="inline-flex items-center px-4 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 transition duration-200">
                        <i class="fas fa-edit mr-2"></i>
                        Edit Details
                    </a>
                </div>
            </div>

            <!-- Delete Action -->
            <div class="mt-8 pt-6 border-t border-gray-200">
                <div class="flex justify-end">
                    <form action="{{ route('admin.clients.destroy', $client) }}" 
                          method="POST" 
                          onsubmit="return confirm('Are you sure you want to delete this client? This action cannot be undone.')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" 
                                class="bg-red-600 text-white px-6 py-2 rounded-lg hover:bg-red-700 transition duration-200">
                            <i class="fas fa-trash mr-2"></i>Delete Client
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection