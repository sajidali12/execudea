@extends('admin.layout')

@section('title', 'Edit Service')
@section('page-title', 'Edit Service')

@section('content')
<div class="max-w-5xl mx-auto">
    <div class="bg-white rounded-lg shadow-sm p-6">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-2xl font-bold text-gray-800">Edit: {{ $service->name }}</h2>
            <div class="space-x-4">
                @if($service->is_active)
                    <a href="{{ route('services.show', $service) }}" target="_blank" class="text-blue-600 hover:text-blue-800">
                        <i class="fas fa-external-link-alt mr-1"></i>View page
                    </a>
                @endif
                <a href="{{ route('admin.services.index') }}" class="text-gray-600 hover:text-gray-800">
                    <i class="fas fa-arrow-left mr-2"></i>Back to Services
                </a>
            </div>
        </div>

        <form action="{{ route('admin.services.update', $service) }}" method="POST">
            @csrf
            @method('PUT')
            @include('admin.services._form')

            <div class="flex justify-end space-x-4 mt-8">
                <a href="{{ route('admin.services.index') }}" class="px-4 py-2 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50 transition duration-200">Cancel</a>
                <button type="submit" class="px-4 py-2 bg-primary text-white rounded-lg hover:bg-primary transition duration-200">
                    <i class="fas fa-save mr-2"></i>Update Service
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
