@extends('layouts.app')

@section('title', 'Courses - Learn with Execudea')

@section('content')
<!-- Hero Section -->
<section class="pt-36 pb-16 relative bg-gradient-to-br from-primary/5 via-secondary/5 to-amber-500/5">
    <div class="hero-with-shapes">
        <div class="shape1"></div>
        <div class="shape2"></div>
        <div class="shape3"></div>
        <div class="shape4"></div>

        <div class="container mx-auto md:px-10 px-4">
            <div class="text-center">
                <div class="bg-primary/10 py-2 px-4 inline-block rounded-full mb-6" data-aos="fade-up" data-aos-duration="600">
                    <div class="flex items-center gap-2">
                        <div class="inline-block px-2 text-sm text-white rounded-full bg-primary">
                            New!
                        </div>
                        <div class="font-medium text-primary">
                            Interactive Learning Platform
                        </div>
                    </div>
                </div>
                <h1 class="text-4xl md:text-5xl font-bold mb-6 font-futura-bold text-gradient" data-aos="fade-up" data-aos-duration="800">
                    Execudea Digital Lab
                </h1>
                <p class="text-lg text-gray-600 max-w-2xl mx-auto font-futura-light mb-8" data-aos="fade-up" data-aos-duration="1000">
                    Enhance your skills with our comprehensive courses designed to help you succeed in the digital world.
                </p>
                <div class="flex flex-wrap justify-center items-center gap-4" data-aos="fade-up" data-aos-duration="1200">
                    <a href="#courses" class="bg-primary text-white px-6 py-3 rounded-lg hover:bg-primary/90 transition-all duration-300 hover:shadow-lg hover:shadow-primary/25">
                        <i class="fas fa-graduation-cap mr-2"></i>
                        Browse Courses
                    </a>
                    <a href="#featured" class="text-primary border border-primary px-6 py-3 rounded-lg hover:bg-primary hover:text-white transition-all duration-300">
                        Featured Courses
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

@if($featuredCourses->count() > 0)
<!-- Featured Courses Section -->
<section id="featured" class="py-16 bg-gray-50">
    <div class="container mx-auto md:px-10 px-4">
        <div class="text-center mb-12">
            <span class="text-sm font-medium py-2 px-4 rounded-full text-white bg-gradient-to-r from-primary to-secondary shadow-lg">
                Featured
            </span>
            <h2 class="text-3xl font-bold mt-4 mb-4 font-futura-bold text-gradient">
                Popular Courses
            </h2>
            <p class="text-gray-600 font-futura-light">
                Our most popular and highly-rated courses
            </p>
        </div>

        <div class="grid md:grid-cols-3 sm:grid-cols-2 grid-cols-1 gap-8">
            @foreach($featuredCourses as $course)
                <div class="bg-white rounded-xl shadow-lg card-hover overflow-hidden">
                    @if($course->image)
                        <img src="{{ asset('storage/' . $course->image) }}" 
                             alt="{{ $course->title }}" 
                             class="w-full h-48 object-cover">
                    @else
                        <div class="w-full h-48 bg-gradient-to-r from-primary/20 to-secondary/20 flex items-center justify-center">
                            <i class="fas fa-graduation-cap text-4xl text-primary"></i>
                        </div>
                    @endif
                    
                    <div class="p-6">
                        <div class="flex items-center justify-between mb-3">
                            <span class="inline-flex px-2 py-1 text-xs font-semibold rounded-full 
                                @if($course->level === 'beginner') bg-green-100 text-green-800
                                @elseif($course->level === 'intermediate') bg-yellow-100 text-yellow-800
                                @else bg-red-100 text-red-800 @endif">
                                {{ ucfirst($course->level) }}
                            </span>
                            @if($course->price)
                                <span class="text-lg font-bold text-primary">PKR {{ number_format($course->price) }}</span>
                            @else
                                <span class="text-lg font-bold text-green-600">Free</span>
                            @endif
                        </div>
                        
                        <h3 class="text-xl font-bold mb-3 text-gray-800">{{ $course->title }}</h3>
                        <p class="text-gray-600 mb-4 text-sm">{{ Str::limit($course->description, 100) }}</p>
                        
                        @if($course->duration)
                            <div class="flex items-center text-sm text-gray-500 mb-4">
                                <i class="fas fa-clock mr-2"></i>
                                {{ $course->duration }}
                            </div>
                        @endif
                        
                        <a href="{{ route('courses.show', $course->slug) }}" 
                           class="btn-gradient w-full inline-block text-center py-3 px-4 rounded-lg text-white font-medium">
                            View Course
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
@endif

<!-- All Courses Section -->
<section id="courses" class="py-16">
    <div class="container mx-auto md:px-10 px-4">
        <div class="text-center mb-12">
            <h2 class="text-3xl font-bold mb-4 font-futura-bold text-gradient">
                All Courses
            </h2>
            <p class="text-gray-600 font-futura-light">
                Browse our complete catalog of courses
            </p>
        </div>

        @if($courses->count() > 0)
            <div class="grid lg:grid-cols-3 md:grid-cols-2 grid-cols-1 gap-8">
                @foreach($courses as $course)
                    <div class="bg-white rounded-xl shadow-lg card-hover overflow-hidden border border-gray-100">
                        @if($course->image)
                            <img src="{{ asset('storage/' . $course->image) }}" 
                                 alt="{{ $course->title }}" 
                                 class="w-full h-48 object-cover">
                        @else
                            <div class="w-full h-48 bg-gradient-to-r from-primary/10 to-secondary/10 flex items-center justify-center">
                                <i class="fas fa-graduation-cap text-4xl text-gray-400"></i>
                            </div>
                        @endif
                        
                        <div class="p-6">
                            <div class="flex items-center justify-between mb-3">
                                <span class="inline-flex px-2 py-1 text-xs font-semibold rounded-full 
                                    @if($course->level === 'beginner') bg-green-100 text-green-800
                                    @elseif($course->level === 'intermediate') bg-yellow-100 text-yellow-800
                                    @else bg-red-100 text-red-800 @endif">
                                    {{ ucfirst($course->level) }}
                                </span>
                                @if($course->is_featured)
                                    <span class="inline-flex px-2 py-1 text-xs font-semibold rounded-full bg-blue-100 text-blue-800">
                                        Featured
                                    </span>
                                @endif
                            </div>
                            
                            <h3 class="text-xl font-bold mb-3 text-gray-800">{{ $course->title }}</h3>
                            <p class="text-gray-600 mb-4 text-sm">{{ Str::limit($course->description, 100) }}</p>
                            
                            <div class="flex items-center justify-between mb-4">
                                @if($course->duration)
                                    <div class="flex items-center text-sm text-gray-500">
                                        <i class="fas fa-clock mr-2"></i>
                                        {{ $course->duration }}
                                    </div>
                                @else
                                    <div></div>
                                @endif
                                
                                @if($course->price)
                                    <span class="text-lg font-bold text-primary">PKR {{ number_format($course->price) }}</span>
                                @else
                                    <span class="text-lg font-bold text-green-600">Free</span>
                                @endif
                            </div>
                            
                            <a href="{{ route('courses.show', $course->slug) }}" 
                               class="btn-primary w-full inline-block text-center py-3 px-4 rounded-lg text-white font-medium">
                                View Details
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Pagination -->
            @if($courses->hasPages())
                <div class="mt-12 flex justify-center">
                    {{ $courses->links() }}
                </div>
            @endif
        @else
            <div class="text-center py-16">
                <div class="max-w-md mx-auto">
                    <i class="fas fa-graduation-cap text-6xl text-gray-300 mb-4"></i>
                    <h3 class="text-xl font-semibold text-gray-800 mb-2">No Courses Available</h3>
                    <p class="text-gray-600 mb-6">We're working on adding new courses. Check back soon!</p>
                    <a href="{{ route('contact') }}" 
                       class="btn-gradient inline-block py-3 px-6 rounded-lg text-white font-medium">
                        Contact Us for Custom Training
                    </a>
                </div>
            </div>
        @endif
    </div>
</section>

<style>
.hero-with-shapes {
    position: relative;
    overflow: hidden;
}

.shape1, .shape2, .shape3, .shape4 {
    position: absolute;
    border-radius: 50%;
    opacity: 0.1;
    animation: float 6s ease-in-out infinite;
    z-index: 1;
}

.shape1 {
    width: 120px;
    height: 120px;
    background: linear-gradient(135deg, #4db8b3, #fc4258);
    top: 10%;
    left: 8%;
    animation-delay: 0s;
}

.shape2 {
    width: 80px;
    height: 80px;
    background: linear-gradient(135deg, #fc4258, #f59e0b);
    top: 30%;
    right: 15%;
    animation-delay: 2s;
}

.shape3 {
    width: 100px;
    height: 100px;
    background: linear-gradient(135deg, #f59e0b, #4db8b3);
    bottom: 25%;
    left: 60%;
    animation-delay: 4s;
}

.shape4 {
    width: 60px;
    height: 60px;
    background: linear-gradient(135deg, #4db8b3, #8b5cf6);
    bottom: 15%;
    right: 30%;
    animation-delay: 1s;
}

@keyframes float {
    0%, 100% { 
        transform: translateY(0px) rotate(0deg); 
    }
    33% { 
        transform: translateY(-20px) rotate(120deg); 
    }
    66% { 
        transform: translateY(10px) rotate(240deg); 
    }
}

/* Course card enhancements */
.card-hover {
    transition: all 0.3s ease;
}

.card-hover:hover {
    transform: translateY(-8px);
    box-shadow: 0 20px 40px rgba(77, 184, 179, 0.15);
}
</style>
@endsection