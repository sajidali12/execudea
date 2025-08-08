@extends('admin.layout')

@section('title', 'Edit Team Member')

@section('content')
<div class="max-w-4xl mx-auto">
    <div class="bg-white shadow rounded-lg">
        <div class="px-6 py-4 border-b border-gray-200">
            <div class="flex items-center justify-between">
                <div>
                    <h2 class="text-xl font-semibold text-gray-800">Edit Team Member</h2>
                    <p class="text-sm text-gray-600 mt-1">Update {{ $team->name }}'s information</p>
                </div>
                <div class="flex items-center space-x-3">
                    <a href="{{ route('admin.teams.show', $team) }}" 
                       class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600 transition duration-200">
                        <i class="fas fa-eye mr-2"></i>View
                    </a>
                    <a href="{{ route('admin.teams.index') }}" 
                       class="bg-gray-500 text-white px-4 py-2 rounded-lg hover:bg-gray-600 transition duration-200">
                        <i class="fas fa-arrow-left mr-2"></i>Back to Team
                    </a>
                </div>
            </div>
        </div>

        <form action="{{ route('admin.teams.update', $team) }}" method="POST" enctype="multipart/form-data" class="p-6">
            @csrf
            @method('PUT')
            
            <!-- Personal Information -->
            <div class="mb-8">
                <h3 class="text-lg font-semibold text-gray-900 mb-4 flex items-center">
                    <i class="fas fa-user text-primary mr-2"></i>
                    Personal Information
                </h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Name -->
                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700 mb-2">
                            Full Name <span class="text-red-500">*</span>
                        </label>
                        <input type="text" 
                               id="name" 
                               name="name" 
                               value="{{ old('name', $team->name) }}"
                               required
                               placeholder="Enter full name"
                               class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary focus:border-primary @error('name') border-red-500 @enderror">
                        @error('name')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Email -->
                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700 mb-2">
                            Email Address <span class="text-red-500">*</span>
                        </label>
                        <input type="email" 
                               id="email" 
                               name="email" 
                               value="{{ old('email', $team->email) }}"
                               required
                               placeholder="Enter email address"
                               class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary focus:border-primary @error('email') border-red-500 @enderror">
                        @error('email')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Phone -->
                    <div>
                        <label for="phone" class="block text-sm font-medium text-gray-700 mb-2">
                            Phone Number
                        </label>
                        <input type="text" 
                               id="phone" 
                               name="phone" 
                               value="{{ old('phone', $team->phone) }}"
                               placeholder="Enter phone number"
                               class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary focus:border-primary @error('phone') border-red-500 @enderror">
                        @error('phone')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- User Assignment -->
                    <div>
                        <label for="user_id" class="block text-sm font-medium text-gray-700 mb-2">
                            Link to System User
                        </label>
                        <select id="user_id" 
                                name="user_id" 
                                onchange="fillUserData()"
                                class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary focus:border-primary @error('user_id') border-red-500 @enderror">
                            <option value="">Select User (Optional)</option>
                            @foreach($users as $user)
                                <option value="{{ $user->id }}" 
                                        data-name="{{ $user->name }}" 
                                        data-email="{{ $user->email }}"
                                        {{ old('user_id', $team->user_id) == $user->id ? 'selected' : '' }}>
                                    {{ $user->name }} ({{ $user->email }})
                                </option>
                            @endforeach
                        </select>
                        @error('user_id')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Current Profile Picture Display -->
                    @if($team->profile_picture)
                        <div class="md:col-span-2">
                            <label class="block text-sm font-medium text-gray-700 mb-2">
                                Current Profile Picture
                            </label>
                            <div class="flex items-center space-x-4">
                                <img src="{{ $team->profile_image }}" 
                                     alt="{{ $team->name }}" 
                                     class="w-16 h-16 rounded-full object-cover border-2 border-gray-200">
                                <div>
                                    <p class="text-sm text-gray-600">Current profile picture</p>
                                    <p class="text-xs text-gray-500">Upload a new image below to replace it</p>
                                </div>
                            </div>
                        </div>
                    @endif

                    <!-- Profile Picture Upload -->
                    <div class="md:col-span-2">
                        <label for="profile_picture" class="block text-sm font-medium text-gray-700 mb-2">
                            {{ $team->profile_picture ? 'Update Profile Picture' : 'Profile Picture' }}
                        </label>
                        <input type="file" 
                               id="profile_picture" 
                               name="profile_picture" 
                               accept="image/*"
                               class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary focus:border-primary @error('profile_picture') border-red-500 @enderror">
                        <p class="text-xs text-gray-500 mt-1">Accepted formats: JPG, PNG (Max: 2MB)</p>
                        @error('profile_picture')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>

            <!-- Professional Information -->
            <div class="mb-8">
                <h3 class="text-lg font-semibold text-gray-900 mb-4 flex items-center">
                    <i class="fas fa-briefcase text-primary mr-2"></i>
                    Professional Information
                </h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Designation -->
                    <div>
                        <label for="designation" class="block text-sm font-medium text-gray-700 mb-2">
                            Designation <span class="text-red-500">*</span>
                        </label>
                        <input type="text" 
                               id="designation" 
                               name="designation" 
                               value="{{ old('designation', $team->designation) }}"
                               required
                               placeholder="e.g. Senior Developer"
                               class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary focus:border-primary @error('designation') border-red-500 @enderror">
                        @error('designation')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Department -->
                    <div>
                        <label for="department" class="block text-sm font-medium text-gray-700 mb-2">
                            Department <span class="text-red-500">*</span>
                        </label>
                        <select id="department" 
                                name="department" 
                                required
                                class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary focus:border-primary @error('department') border-red-500 @enderror">
                            <option value="">Select Department</option>
                            @foreach($departments as $dept)
                                <option value="{{ $dept }}" {{ old('department', $team->department) == $dept ? 'selected' : '' }}>
                                    {{ $dept }}
                                </option>
                            @endforeach
                        </select>
                        @error('department')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Salary -->
                    <div>
                        <label for="salary" class="block text-sm font-medium text-gray-700 mb-2">
                            Monthly Salary (PKR) <span class="text-red-500">*</span>
                        </label>
                        <input type="number" 
                               id="salary" 
                               name="salary" 
                               min="0"
                               step="0.01"
                               value="{{ old('salary', $team->salary) }}"
                               required
                               placeholder="Enter monthly salary"
                               class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary focus:border-primary @error('salary') border-red-500 @enderror">
                        @error('salary')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Joining Date -->
                    <div>
                        <label for="joining_date" class="block text-sm font-medium text-gray-700 mb-2">
                            Joining Date <span class="text-red-500">*</span>
                        </label>
                        <input type="date" 
                               id="joining_date" 
                               name="joining_date" 
                               value="{{ old('joining_date', $team->joining_date->format('Y-m-d')) }}"
                               required
                               class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary focus:border-primary @error('joining_date') border-red-500 @enderror">
                        @error('joining_date')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Status -->
                    <div>
                        <label for="status" class="block text-sm font-medium text-gray-700 mb-2">
                            Status <span class="text-red-500">*</span>
                        </label>
                        <select id="status" 
                                name="status" 
                                required
                                class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary focus:border-primary @error('status') border-red-500 @enderror">
                            <option value="active" {{ old('status', $team->status) == 'active' ? 'selected' : '' }}>Active</option>
                            <option value="inactive" {{ old('status', $team->status) == 'inactive' ? 'selected' : '' }}>Inactive</option>
                        </select>
                        @error('status')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Skills -->
                    <div>
                        <label for="skills" class="block text-sm font-medium text-gray-700 mb-2">
                            Skills (comma-separated)
                        </label>
                        <input type="text" 
                               id="skills" 
                               name="skills" 
                               value="{{ old('skills', $team->skills ? implode(', ', $team->skills) : '') }}"
                               placeholder="PHP, Laravel, JavaScript, React"
                               class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary focus:border-primary @error('skills') border-red-500 @enderror">
                        <p class="text-xs text-gray-500 mt-1">Separate skills with commas</p>
                        @error('skills')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>

            <!-- Additional Information -->
            <div class="mb-8">
                <h3 class="text-lg font-semibold text-gray-900 mb-4 flex items-center">
                    <i class="fas fa-info-circle text-primary mr-2"></i>
                    Additional Information
                </h3>
                <div>
                    <label for="bio" class="block text-sm font-medium text-gray-700 mb-2">
                        Bio/Description
                    </label>
                    <textarea id="bio" 
                              name="bio" 
                              rows="4"
                              placeholder="Brief description about the team member..."
                              class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary focus:border-primary @error('bio') border-red-500 @enderror">{{ old('bio', $team->bio) }}</textarea>
                    @error('bio')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div class="flex justify-end space-x-4 pt-6 border-t">
                <a href="{{ route('admin.teams.show', $team) }}" 
                   class="px-6 py-2 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50 transition duration-200">
                    Cancel
                </a>
                <button type="submit" 
                        class="bg-primary text-white px-6 py-2 rounded-lg hover:bg-opacity-90 transition duration-200">
                    <i class="fas fa-save mr-2"></i>Update Team Member
                </button>
            </div>
        </form>
    </div>
</div>

<script>
function fillUserData() {
    const userSelect = document.getElementById('user_id');
    const nameInput = document.getElementById('name');
    const emailInput = document.getElementById('email');
    
    if (userSelect.value === '') {
        // If no user selected, don't change the current values
        return;
    }
    
    const selectedOption = userSelect.options[userSelect.selectedIndex];
    const userName = selectedOption.getAttribute('data-name');
    const userEmail = selectedOption.getAttribute('data-email');
    
    if (userName && userEmail) {
        nameInput.value = userName;
        emailInput.value = userEmail;
    }
}
</script>
@endsection