@extends('layouts.app')

@section('title', $course->title . ' - Execudea Courses')

@section('content')
<!-- Course Header -->
<section class="pt-36 pb-16">
    <div class="container mx-auto md:px-10 px-4">
        <div class="grid lg:grid-cols-2 gap-12 items-start">
            <!-- Course Info -->
            <div>
                <div class="flex items-center gap-4 mb-4">
                    <span class="inline-flex px-3 py-1 text-sm font-semibold rounded-full 
                        @if($course->level === 'beginner') bg-green-100 text-green-800
                        @elseif($course->level === 'intermediate') bg-yellow-100 text-yellow-800
                        @else bg-red-100 text-red-800 @endif">
                        {{ ucfirst($course->level) }}
                    </span>
                    @if($course->is_featured)
                        <span class="inline-flex px-3 py-1 text-sm font-semibold rounded-full bg-blue-100 text-blue-800">
                            Featured Course
                        </span>
                    @endif
                </div>
                
                <h1 class="text-4xl md:text-5xl font-bold mb-6 font-futura-bold text-gray-800">
                    {{ $course->title }}
                </h1>
                
                <div class="mb-6">
                    @if($course->price)
                        <span class="text-3xl font-bold text-primary">PKR {{ number_format($course->price) }}</span>
                    @else
                        <span class="text-3xl font-bold text-green-600">Free Course</span>
                    @endif
                </div>
                
                @if($course->duration)
                    <div class="flex items-center text-lg text-gray-600 mb-6">
                        <i class="fas fa-clock mr-3 text-primary"></i>
                        <span><strong>Duration:</strong> {{ $course->duration }}</span>
                    </div>
                @endif
                
                <div class="prose prose-lg max-w-none mb-8">
                    <h3 class="text-xl font-semibold mb-4 text-gray-800">Course Description</h3>
                    <p class="text-gray-700 leading-relaxed">{{ $course->description }}</p>
                </div>
                
                <!-- Register Button -->
                <div class="px-2">
                    <button onclick="openRegistrationModal()" 
                            class="btn-gradient px-2 py-3 px-8 rounded-lg text-white font-medium text-lg shadow-lg">
                        <i class="fas fa-user-plus mr-2"></i>Register Now
                    </button>
                </div>
            </div>
            
            <!-- Course Image -->
            <div class="lg:order-last">
                @if($course->image)
                    <img src="{{ asset('storage/' . $course->image) }}" 
                         alt="{{ $course->title }}" 
                         class="w-full h-80 object-cover rounded-xl shadow-lg">
                @else
                    <div class="w-full h-80 bg-gradient-to-r from-primary/20 to-secondary/20 rounded-xl shadow-lg flex items-center justify-center">
                        <i class="fas fa-graduation-cap text-8xl text-gray-400"></i>
                    </div>
                @endif
            </div>
        </div>
    </div>
</section>

<!-- Course Stats -->
<section class="py-8 bg-gray-50">
    <div class="container mx-auto md:px-10 px-4">
        <div class="grid md:grid-cols-4 grid-cols-2 gap-6 text-center">
            <div class="bg-white p-6 rounded-lg shadow-md">
                <i class="fas fa-users text-2xl text-primary mb-2"></i>
                <div class="text-2xl font-bold text-gray-800">{{ $course->registrations->count() }}</div>
                <div class="text-sm text-gray-600">Students Enrolled</div>
            </div>
            <div class="bg-white p-6 rounded-lg shadow-md">
                <i class="fas fa-star text-2xl text-yellow-500 mb-2"></i>
                <div class="text-2xl font-bold text-gray-800">{{ ucfirst($course->level) }}</div>
                <div class="text-sm text-gray-600">Difficulty Level</div>
            </div>
            @if($course->duration)
            <div class="bg-white p-6 rounded-lg shadow-md">
                <i class="fas fa-clock text-2xl text-blue-500 mb-2"></i>
                <div class="text-2xl font-bold text-gray-800">{{ $course->duration }}</div>
                <div class="text-sm text-gray-600">Duration</div>
            </div>
            @endif
            <div class="bg-white p-6 rounded-lg shadow-md">
                <i class="fas fa-certificate text-2xl text-green-500 mb-2"></i>
                <div class="text-2xl font-bold text-gray-800">Yes</div>
                <div class="text-sm text-gray-600">Certificate</div>
            </div>
        </div>
    </div>
</section>

<!-- Why Choose This Course -->
<section class="py-16">
    <div class="container mx-auto md:px-10 px-4">
        <div class="max-w-4xl mx-auto">
            <h2 class="text-3xl font-bold text-center mb-12 font-futura-bold text-gradient">
                Why Choose This Course?
            </h2>
            
            <div class="grid md:grid-cols-2 gap-8">
                <div class="flex items-start">
                    <div class="flex-shrink-0 w-12 h-12 bg-primary/10 rounded-lg flex items-center justify-center mr-4">
                        <i class="fas fa-chalkboard-teacher text-primary text-xl"></i>
                    </div>
                    <div>
                        <h4 class="text-lg font-semibold mb-2">Expert Instructors</h4>
                        <p class="text-gray-600">Learn from industry professionals with years of experience.</p>
                    </div>
                </div>
                
                <div class="flex items-start">
                    <div class="flex-shrink-0 w-12 h-12 bg-primary/10 rounded-lg flex items-center justify-center mr-4">
                        <i class="fas fa-laptop-code text-primary text-xl"></i>
                    </div>
                    <div>
                        <h4 class="text-lg font-semibold mb-2">Hands-on Learning</h4>
                        <p class="text-gray-600">Practice with real-world projects and assignments.</p>
                    </div>
                </div>
                
                <div class="flex items-start">
                    <div class="flex-shrink-0 w-12 h-12 bg-primary/10 rounded-lg flex items-center justify-center mr-4">
                        <i class="fas fa-users text-primary text-xl"></i>
                    </div>
                    <div>
                        <h4 class="text-lg font-semibold mb-2">Community Support</h4>
                        <p class="text-gray-600">Join a community of learners and get help when needed.</p>
                    </div>
                </div>
                
                <div class="flex items-start">
                    <div class="flex-shrink-0 w-12 h-12 bg-primary/10 rounded-lg flex items-center justify-center mr-4">
                        <i class="fas fa-certificate text-primary text-xl"></i>
                    </div>
                    <div>
                        <h4 class="text-lg font-semibold mb-2">Certification</h4>
                        <p class="text-gray-600">Get a certificate upon successful completion.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Registration Modal -->
<div id="registrationModal" class="fixed inset-0 bg-black bg-opacity-50 hidden z-50 flex items-center justify-center p-4">
    <div class="bg-white rounded-lg max-w-md w-full p-6">
        <div class="flex justify-between items-center mb-4">
            <h3 class="text-xl font-bold text-gray-800">Register for {{ $course->title }}</h3>
            <button onclick="closeRegistrationModal()" class="text-gray-400 hover:text-gray-600">
                <i class="fas fa-times text-xl"></i>
            </button>
        </div>
        
        <form id="registrationForm">
            @csrf
            <div class="space-y-4">
                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Full Name *</label>
                    <input type="text" 
                           id="name" 
                           name="name" 
                           required
                           class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary focus:border-primary">
                </div>
                
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email Address *</label>
                    <input type="email" 
                           id="email" 
                           name="email" 
                           required
                           class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary focus:border-primary">
                </div>
                
                <div>
                    <label for="phone" class="block text-sm font-medium text-gray-700 mb-1">Phone Number *</label>
                    <input type="tel" 
                           id="phone" 
                           name="phone" 
                           required
                           class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary focus:border-primary">
                </div>
            </div>
            
            <div class="mt-6 flex space-x-3">
                <button type="button" 
                        onclick="closeRegistrationModal()"
                        class="flex-1 px-4 py-2 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50 transition duration-200">
                    Cancel
                </button>
                <button type="submit" 
                        class="flex-1 bg-primary btn-gradient px-4 py-2 rounded-lg text-white font-medium">
                    Register
                </button>
            </div>
        </form>
    </div>
</div>

<!-- Success Message Modal -->
<div id="successModal" class="fixed inset-0 bg-black bg-opacity-50 hidden z-50 flex items-center justify-center p-4">
    <div class="bg-white rounded-lg max-w-md w-full p-6 text-center">
        <div class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-4">
            <i class="fas fa-check text-green-600 text-2xl"></i>
        </div>
        <h3 class="text-xl font-bold text-gray-800 mb-2">Registration Successful!</h3>
        <p class="text-gray-600 mb-6">We will contact you soon with further details about the course.</p>
        <button onclick="closeSuccessModal()" 
                class="btn-gradient px-6 py-2 rounded-lg text-white font-medium">
            Close
        </button>
    </div>
</div>

<script>
function openRegistrationModal() {
    document.getElementById('registrationModal').classList.remove('hidden');
    document.body.style.overflow = 'hidden';
}

function closeRegistrationModal() {
    document.getElementById('registrationModal').classList.add('hidden');
    document.body.style.overflow = 'auto';
    document.getElementById('registrationForm').reset();
}

function closeSuccessModal() {
    document.getElementById('successModal').classList.add('hidden');
    document.body.style.overflow = 'auto';
}

// Handle form submission
document.getElementById('registrationForm').addEventListener('submit', async function(e) {
    e.preventDefault();
    
    const formData = new FormData(this);
    const submitButton = this.querySelector('button[type="submit"]');
    const originalText = submitButton.innerHTML;
    
    // Show loading state
    submitButton.innerHTML = '<i class="fas fa-spinner fa-spin mr-2"></i>Registering...';
    submitButton.disabled = true;
    
    try {
        const response = await fetch('{{ route("courses.register", $course->slug) }}', {
            method: 'POST',
            body: formData,
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            }
        });
        
        const data = await response.json();
        
        if (data.success) {
            closeRegistrationModal();
            document.getElementById('successModal').classList.remove('hidden');
        } else {
            alert(data.message || 'Registration failed. Please try again.');
        }
    } catch (error) {
        alert('An error occurred. Please try again.');
    } finally {
        // Restore button state
        submitButton.innerHTML = originalText;
        submitButton.disabled = false;
    }
});

// Close modal when clicking outside
document.getElementById('registrationModal').addEventListener('click', function(e) {
    if (e.target === this) {
        closeRegistrationModal();
    }
});

document.getElementById('successModal').addEventListener('click', function(e) {
    if (e.target === this) {
        closeSuccessModal();
    }
});
</script>
@endsection