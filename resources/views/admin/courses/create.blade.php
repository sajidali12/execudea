@extends('admin.layout')

@section('title', 'Create Course')

@section('content')
<div class="max-w-4xl mx-auto">
    <div class="bg-white shadow rounded-lg">
        <div class="px-6 py-4 border-b border-gray-200">
            <h2 class="text-xl font-semibold text-gray-800">Create New Course</h2>
            <p class="text-sm text-gray-600 mt-1">Add a new course to your catalog</p>
        </div>

        <form action="{{ route('admin.courses.store') }}" method="POST" enctype="multipart/form-data" class="p-6 space-y-6">
            @csrf

            <!-- Course Information -->
            <div class="bg-gray-50 rounded-lg p-6">
                <h3 class="text-lg font-medium text-gray-900 mb-4">Course Information</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Title -->
                    <div class="md:col-span-2">
                        <label for="title" class="block text-sm font-medium text-gray-700 mb-2">Course Title *</label>
                        <input type="text" 
                               class="block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-primary focus:border-primary @error('title') border-red-500 @enderror" 
                               id="title" 
                               name="title" 
                               value="{{ old('title') }}" 
                               required>
                        @error('title')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Level -->
                    <div>
                        <label for="level" class="block text-sm font-medium text-gray-700 mb-2">Level *</label>
                        <select class="block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-primary focus:border-primary @error('level') border-red-500 @enderror" 
                                id="level" 
                                name="level" 
                                required>
                            <option value="">Select Level</option>
                            <option value="beginner" {{ old('level') === 'beginner' ? 'selected' : '' }}>Beginner</option>
                            <option value="intermediate" {{ old('level') === 'intermediate' ? 'selected' : '' }}>Intermediate</option>
                            <option value="advanced" {{ old('level') === 'advanced' ? 'selected' : '' }}>Advanced</option>
                        </select>
                        @error('level')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Duration -->
                    <div>
                        <label for="duration" class="block text-sm font-medium text-gray-700 mb-2">Duration</label>
                        <input type="text" 
                               class="block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-primary focus:border-primary @error('duration') border-red-500 @enderror" 
                               id="duration" 
                               name="duration" 
                               value="{{ old('duration') }}" 
                               placeholder="e.g., 8 weeks, 40 hours">
                        @error('duration')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Price -->
                    <div>
                        <label for="price" class="block text-sm font-medium text-gray-700 mb-2">Price (PKR)</label>
                        <input type="number" 
                               class="block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-primary focus:border-primary @error('price') border-red-500 @enderror" 
                               id="price" 
                               name="price" 
                               value="{{ old('price') }}" 
                               step="1" 
                               min="0" 
                               placeholder="Leave empty for free course">
                        @error('price')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Course Image -->
                    <div>
                        <label for="image" class="block text-sm font-medium text-gray-700 mb-2">Course Image</label>
                        <input type="file" 
                               class="block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-primary focus:border-primary @error('image') border-red-500 @enderror" 
                               id="image" 
                               name="image" 
                               accept="image/*">
                        <p class="text-xs text-gray-500 mt-1">Upload an image (JPG, PNG, GIF, SVG - Max: 2MB)</p>
                        @error('image')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Description -->
                    <div class="md:col-span-2">
                        <label for="description" class="block text-sm font-medium text-gray-700 mb-2">Course Description *</label>
                        <textarea class="block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-primary focus:border-primary @error('description') border-red-500 @enderror" 
                                  id="description" 
                                  name="description" 
                                  rows="4" 
                                  required 
                                  placeholder="Brief description of the course">{{ old('description') }}</textarea>
                        @error('description')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>


            <!-- Course Settings -->
            <div class="bg-gray-50 rounded-lg p-6">
                <h3 class="text-lg font-medium text-gray-900 mb-4">Course Settings</h3>
                <div class="space-y-4">
                    <div class="flex items-center">
                        <input type="checkbox" 
                               class="h-4 w-4 text-primary focus:ring-primary border-gray-300 rounded" 
                               id="is_featured" 
                               name="is_featured" 
                               value="1" 
                               {{ old('is_featured') ? 'checked' : '' }}>
                        <label for="is_featured" class="ml-2 block text-sm text-gray-900">
                            Featured Course
                        </label>
                    </div>
                    <div class="flex items-center">
                        <input type="checkbox" 
                               class="h-4 w-4 text-primary focus:ring-primary border-gray-300 rounded" 
                               id="is_active" 
                               name="is_active" 
                               value="1" 
                               {{ old('is_active', 1) ? 'checked' : '' }}>
                        <label for="is_active" class="ml-2 block text-sm text-gray-900">
                            Active (visible to users)
                        </label>
                    </div>
                </div>
            </div>

            <!-- Form Actions -->
            <div class="flex items-center justify-end space-x-4 pt-4 border-t border-gray-200">
                <a href="{{ route('admin.courses.index') }}" 
                   class="px-4 py-2 border border-gray-300 rounded-md shadow-sm bg-white text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary">
                    Cancel
                </a>
                <button type="submit" 
                        class="px-4 py-2 border border-transparent rounded-md shadow-sm bg-primary text-sm font-medium text-white hover:bg-opacity-90 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary">
                    Create Course
                </button>
            </div>
        </form>
    </div>
</div>

@endsection