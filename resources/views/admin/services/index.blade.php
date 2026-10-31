@extends('admin.layout')

@section('title', 'Service Pages')
@section('page-title', 'Service Pages')

@section('content')
<div class="flex justify-between items-center mb-6">
    <h2 class="text-2xl font-bold text-gray-800">All Service Pages</h2>
    <a href="{{ route('admin.services.create') }}" class="bg-primary hover:bg-primary text-white px-4 py-2 rounded-lg transition duration-200">
        <i class="fas fa-plus mr-2"></i>Create New Service
    </a>
</div>

<div class="bg-white rounded-lg shadow-sm overflow-hidden">
    @if($services->count() > 0)
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Service</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Page Content</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach($services as $service)
                        @php $hasFaqs = $service->content && str_contains($service->content, 'Frequently Asked Questions'); @endphp
                        <tr class="hover:bg-gray-50">
                            <td class="px-6 py-4">
                                <h4 class="text-sm font-medium text-gray-900">{{ $service->name }}</h4>
                                <p class="text-sm text-gray-500">/services/{{ $service->slug }}</p>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm">
                                @if(!$service->content)
                                    <span class="px-2 py-1 text-xs rounded-full bg-yellow-100 text-yellow-800">Empty</span>
                                @else
                                    <span class="px-2 py-1 text-xs rounded-full bg-blue-100 text-blue-800">Has content</span>
                                @endif
                                @if($hasFaqs)
                                    <span class="px-2 py-1 text-xs rounded-full bg-green-100 text-green-800">FAQs</span>
                                @else
                                    <span class="px-2 py-1 text-xs rounded-full bg-gray-100 text-gray-600">No FAQs</span>
                                @endif
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm">
                                <form action="{{ route('admin.services.toggle', $service) }}" method="POST" class="inline">
                                    @csrf
                                    @method('PATCH')
                                    <button type="submit" class="px-2 py-1 text-xs rounded-full {{ $service->is_active ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                        {{ $service->is_active ? 'Active' : 'Inactive' }}
                                    </button>
                                </form>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium space-x-3">
                                <a href="{{ route('admin.services.edit', $service) }}" class="text-blue-600 hover:text-blue-900">
                                    <i class="fas fa-edit"></i> Edit
                                </a>
                                @if($service->is_active)
                                    <a href="{{ route('services.show', $service) }}" target="_blank" class="text-gray-600 hover:text-gray-900">
                                        <i class="fas fa-external-link-alt"></i> View
                                    </a>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @else
        <div class="text-center py-12 text-gray-500">No service pages yet.</div>
    @endif
</div>
@endsection
