@extends('admin.layout')

@section('title', 'Course Registrations')

@section('content')
<div class="max-w-7xl mx-auto">
    <div class="bg-white shadow rounded-lg">
        <div class="px-6 py-4 border-b border-gray-200">
            <div class="flex justify-between items-center">
                <div>
                    <h2 class="text-xl font-semibold text-gray-800">Course Registrations</h2>
                    <p class="text-sm text-gray-600 mt-1">View and manage course registrations</p>
                </div>
                <div class="text-sm text-gray-600">
                    Total: <span class="font-semibold">{{ $registrations->total() }}</span> registrations
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
                           placeholder="Search by name, email, or phone..." 
                           class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary focus:border-primary">
                </div>
                
                <!-- Course Filter -->
                <div class="sm:w-64">
                    <select name="course_id" 
                            class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary focus:border-primary">
                        <option value="">All Courses</option>
                        @foreach($courses as $course)
                            <option value="{{ $course->id }}" {{ request('course_id') == $course->id ? 'selected' : '' }}>
                                {{ $course->title }}
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
                @if(request('search') || request('course_id'))
                    <a href="{{ route('admin.course-registrations.index') }}" 
                       class="px-4 py-2 bg-gray-500 text-white rounded-lg hover:bg-gray-600 transition duration-200">
                        <i class="fas fa-times mr-2"></i>Clear
                    </a>
                @endif
            </form>
        </div>

        <div class="p-6">
            @if($registrations->count() > 0)
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Student Info
                                </th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Course
                                </th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Contact
                                </th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Registration Date
                                </th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Actions
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach($registrations as $registration)
                                <tr class="hover:bg-gray-50">
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div>
                                            <div class="text-sm font-medium text-gray-900">
                                                {{ $registration->name }}
                                            </div>
                                            <div class="text-sm text-gray-500">
                                                {{ $registration->email }}
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                            @if($registration->course->image)
                                                <img src="{{ asset('storage/' . $registration->course->image) }}" 
                                                     alt="{{ $registration->course->title }}" 
                                                     class="h-8 w-8 rounded-md object-cover mr-2 flex-shrink-0">
                                            @else
                                                <div class="h-8 w-8 bg-gray-200 rounded-md flex items-center justify-center mr-2 flex-shrink-0">
                                                    <i class="fas fa-graduation-cap text-gray-400 text-xs"></i>
                                                </div>
                                            @endif
                                            <div>
                                                <div class="text-sm font-medium text-gray-900">
                                                    {{ $registration->course->title }}
                                                </div>
                                                <div class="text-sm text-gray-500">
                                                    {{ ucfirst($registration->course->level) }} • 
                                                    @if($registration->course->price)
                                                        PKR {{ number_format($registration->course->price) }}
                                                    @else
                                                        Free
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-900">{{ $registration->phone }}</div>
                                        <div class="text-sm text-gray-500">
                                            <a href="mailto:{{ $registration->email }}" class="hover:text-primary">
                                                <i class="fas fa-envelope mr-1"></i>Email
                                            </a>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                        <div>{{ $registration->created_at->format('M d, Y') }}</div>
                                        <div class="text-xs text-gray-500">{{ $registration->created_at->format('h:i A') }}</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium space-x-2">
                                        <a href="{{ route('courses.show', $registration->course->slug) }}" 
                                           class="text-blue-600 hover:text-blue-900" 
                                           target="_blank"
                                           title="View Course">
                                            <i class="fas fa-external-link-alt"></i>
                                        </a>
                                        <a href="mailto:{{ $registration->email }}" 
                                           class="text-green-600 hover:text-green-900"
                                           title="Send Email">
                                            <i class="fas fa-envelope"></i>
                                        </a>
                                        <a href="tel:{{ $registration->phone }}" 
                                           class="text-indigo-600 hover:text-indigo-900"
                                           title="Call">
                                            <i class="fas fa-phone"></i>
                                        </a>
                                        <form action="{{ route('admin.course-registrations.destroy', $registration) }}" 
                                              method="POST" 
                                              class="inline"
                                              onsubmit="return confirm('Are you sure you want to delete this registration?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" 
                                                    class="text-red-600 hover:text-red-900"
                                                    title="Delete Registration">
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
                    {{ $registrations->withQueryString()->links() }}
                </div>
            @else
                <div class="text-center py-12">
                    <i class="fas fa-user-graduate text-6xl text-gray-300 mb-4"></i>
                    <h3 class="text-lg font-medium text-gray-900 mb-2">No Registrations Found</h3>
                    @if(request('search') || request('course_id'))
                        <p class="text-gray-500 mb-6">Try adjusting your search filters.</p>
                        <a href="{{ route('admin.course-registrations.index') }}" 
                           class="bg-primary text-white px-6 py-3 rounded-lg hover:bg-opacity-90 transition duration-200">
                            <i class="fas fa-times mr-2"></i>Clear Filters
                        </a>
                    @else
                        <p class="text-gray-500 mb-6">No students have registered for courses yet.</p>
                        <a href="{{ route('admin.courses.index') }}" 
                           class="bg-primary text-white px-6 py-3 rounded-lg hover:bg-opacity-90 transition duration-200">
                            <i class="fas fa-graduation-cap mr-2"></i>Manage Courses
                        </a>
                    @endif
                </div>
            @endif
        </div>
    </div>
</div>

@push('scripts')
<script>
// Auto-submit form when course filter changes
document.querySelector('select[name="course_id"]').addEventListener('change', function() {
    this.form.submit();
});
</script>
@endpush
@endsection