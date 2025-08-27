@extends('layouts.app')

@section('title', 'Payload CMS Case Studies | Execudea Success Stories | Modern Headless CMS Solutions')
@section('meta_description', 'Explore Execudea\'s successful Payload CMS projects including Lincoln Corner Pakistan and Department of Tourism Pakistan. See how we deliver cutting-edge headless CMS solutions.')
@section('meta_keywords', 'payload cms case studies, headless cms projects, lincoln corner pakistan, tourism pakistan, payload cms development, modern cms solutions')
@section('canonical', url('/payload-case-studies'))

@push('meta')
<meta property="og:title" content="Payload CMS Case Studies | Execudea Success Stories">
<meta property="og:description" content="Explore Execudea's successful Payload CMS projects including Lincoln Corner Pakistan and Department of Tourism Pakistan. Modern headless CMS solutions that deliver results.">
<meta property="og:url" content="{{ url('/payload-case-studies') }}">
<meta property="og:type" content="website">
<meta property="og:image" content="{{ asset('img/case-studies/payload-case-studies-hero.jpg') }}">
<meta property="og:site_name" content="Execudea">

<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:title" content="Payload CMS Case Studies | Execudea Success Stories">
<meta name="twitter:description" content="See how we transformed digital experiences with Payload CMS for leading Pakistani organizations.">
<meta name="twitter:image" content="{{ asset('img/case-studies/payload-case-studies-hero.jpg') }}">

<meta name="robots" content="index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1">
<meta name="googlebot" content="index, follow">
@endpush

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
                            Payload CMS Success Stories
                        </div>
                    </div>
                </div>
                <h1 class="text-4xl md:text-5xl font-bold mb-6 font-futura-bold text-gradient" data-aos="fade-up" data-aos-duration="800">
                    Transforming Digital
                    <span class="block">Experiences with Payload CMS</span>
                </h1>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto font-futura-light mb-8" data-aos="fade-up" data-aos-duration="1000">
                    Discover how Execudea leverages cutting-edge Payload CMS technology to deliver 
                    exceptional digital solutions for leading Pakistani organizations.
                </p>
                <div class="flex flex-wrap justify-center items-center gap-4" data-aos="fade-up" data-aos-duration="1200">
                    <a href="#case-studies" class="bg-primary text-white px-6 py-3 rounded-lg hover:bg-primary/90 transition-all duration-300 hover:shadow-lg hover:shadow-primary/25">
                        <i class="fas fa-eye mr-2"></i>
                        View Case Studies
                    </a>
                    <a href="{{ route('contact') }}" class="text-primary border border-primary px-6 py-3 rounded-lg hover:bg-primary hover:text-white transition-all duration-300">
                        Start Your Project
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Case Studies Section -->
<section id="case-studies" class="py-32 bg-gray-50">
    <div class="container mx-auto max-w-7xl px-4 md:px-6 lg:px-8">
        <div class="text-center mb-24" data-aos="fade-up">
            <span class="inline-block px-4 py-2 bg-primary/10 text-primary rounded-full text-sm font-semibold mb-4">
                Success Stories
            </span>
            <h2 class="text-4xl md:text-5xl font-bold mb-8">
                Our <span class="text-primary">Payload CMS</span> Projects
            </h2>
            <p class="text-xl text-gray-600 max-w-3xl mx-auto mb-16">
                From government portals to corporate websites, see how we've transformed digital experiences 
                using modern headless CMS architecture.
            </p>
        </div>

        <div class="grid lg:grid-cols-2 gap-8 lg:gap-12">
            <!-- Lincoln Corner Pakistan Case Study -->
            <div class="group" data-aos="fade-up" data-aos-delay="200">
                <div class="bg-white rounded-3xl shadow-xl overflow-hidden hover:shadow-2xl transition-all duration-500 transform hover:-translate-y-2">
                    <div class="relative h-80 overflow-hidden">
                        <img 
                            src="{{ asset('img/case/lincoln-corner.png') }}" 
                            alt="Lincoln Corner Pakistan - Payload CMS Project"
                            class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700"
                        />
                        <div class="absolute inset-0 bg-black/20"></div>
                        <div class="absolute top-4 left-4 z-20">
                            <span class="bg-green-500 text-white px-3 py-1 rounded-full text-xs font-semibold">
                                US Embassy Project
                            </span>
                        </div>
                        <div class="absolute bottom-4 right-4 z-20">
                            <div class="bg-white/20 backdrop-blur-sm rounded-lg px-3 py-1 border border-white/30">
                                <span class="text-white text-sm font-medium">TypeScript + React</span>
                            </div>
                        </div>
                    </div>
                    
                    <div class="p-8">
                        <h3 class="text-2xl font-bold mb-4 group-hover:text-primary transition-colors duration-300">
                            Lincoln Corner Pakistan
                        </h3>
                        <p class="text-gray-600 mb-6 leading-relaxed">
                            A sophisticated digital platform for the US Embassy Lincoln Corner initiative in Pakistan. 
                            Built with Payload CMS to manage educational resources, events, and community engagement programs.
                        </p>
                        
                        <div class="space-y-4 mb-6">
                            <div class="flex items-center text-sm">
                                <div class="w-2 h-2 bg-primary rounded-full mr-3"></div>
                                <span><strong>Challenge:</strong> Multi-language content management</span>
                            </div>
                            <div class="flex items-center text-sm">
                                <div class="w-2 h-2 bg-green-500 rounded-full mr-3"></div>
                                <span><strong>Solution:</strong> Headless CMS with custom admin panels</span>
                            </div>
                            <div class="flex items-center text-sm">
                                <div class="w-2 h-2 bg-blue-500 rounded-full mr-3"></div>
                                <span><strong>Result:</strong> 300% improved content workflow</span>
                            </div>
                        </div>
                        
                        <div class="flex flex-wrap gap-2 mb-6">
                            <span class="px-3 py-1 bg-blue-100 text-blue-800 rounded-full text-xs font-medium">Payload CMS</span>
                            <span class="px-3 py-1 bg-purple-100 text-purple-800 rounded-full text-xs font-medium">TypeScript</span>
                            <span class="px-3 py-1 bg-cyan-100 text-cyan-800 rounded-full text-xs font-medium">React Admin</span>
                            <span class="px-3 py-1 bg-green-100 text-green-800 rounded-full text-xs font-medium">Node.js</span>
                        </div>
                        
                    </div>
                </div>
            </div>

            <!-- Department of Tourism Pakistan Case Study -->
            <div class="group" data-aos="fade-up" data-aos-delay="400">
                <div class="bg-white rounded-3xl shadow-xl overflow-hidden hover:shadow-2xl transition-all duration-500 transform hover:-translate-y-2">
                    <div class="relative h-80 overflow-hidden">
                        <img 
                            src="{{ asset('img/case/department-of-tourism.png') }}" 
                            alt="Department of Tourism Pakistan - Payload CMS Project"
                            class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700"
                        />
                        <div class="absolute inset-0 bg-black/20"></div>
                        <div class="absolute top-4 left-4 z-20">
                            <span class="bg-emerald-500 text-white px-3 py-1 rounded-full text-xs font-semibold">
                                🇵🇰 Tourism Portal
                            </span>
                        </div>
                        <div class="absolute bottom-4 right-4 z-20">
                            <div class="bg-white/20 backdrop-blur-sm rounded-lg px-3 py-1 border border-white/30">
                                <span class="text-white text-sm font-medium">API-First Architecture</span>
                            </div>
                        </div>
                    </div>
                    
                    <div class="p-8">
                        <h3 class="text-2xl font-bold mb-4 group-hover:text-primary transition-colors duration-300">
                            Department of Tourism Pakistan
                        </h3>
                        <p class="text-gray-600 mb-6 leading-relaxed">
                            A comprehensive tourism promotion platform showcasing Pakistan's natural beauty and cultural heritage. 
                            Powered by Payload CMS for seamless content management across multiple tourism destinations.
                        </p>
                        
                        <div class="space-y-4 mb-6">
                            <div class="flex items-center text-sm">
                                <div class="w-2 h-2 bg-primary rounded-full mr-3"></div>
                                <span><strong>Challenge:</strong> Managing diverse tourism content</span>
                            </div>
                            <div class="flex items-center text-sm">
                                <div class="w-2 h-2 bg-green-500 rounded-full mr-3"></div>
                                <span><strong>Solution:</strong> Custom collections & media management</span>
                            </div>
                            <div class="flex items-center text-sm">
                                <div class="w-2 h-2 bg-blue-500 rounded-full mr-3"></div>
                                <span><strong>Result:</strong> 500+ destinations catalogued efficiently</span>
                            </div>
                        </div>
                        
                        <div class="flex flex-wrap gap-2 mb-6">
                            <span class="px-3 py-1 bg-blue-100 text-blue-800 rounded-full text-xs font-medium">Payload CMS</span>
                            <span class="px-3 py-1 bg-orange-100 text-orange-800 rounded-full text-xs font-medium">Next.js</span>
                            <span class="px-3 py-1 bg-purple-100 text-purple-800 rounded-full text-xs font-medium">GraphQL</span>
                            <span class="px-3 py-1 bg-teal-100 text-teal-800 rounded-full text-xs font-medium">MongoDB</span>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Technology Showcase -->
<section class="py-32 bg-white relative overflow-hidden">
    <div class="absolute inset-0 bg-gradient-to-br from-blue-50 to-purple-50 opacity-50"></div>
    
    <div class="container mx-auto max-w-7xl px-4 md:px-6 lg:px-8 relative">
        <div class="text-center mb-24" data-aos="fade-up">
            <h2 class="text-4xl md:text-5xl font-bold mb-8">
                Powered by <span class="text-primary">Modern Technology</span>
            </h2>
            <p class="text-xl text-gray-600 max-w-3xl mx-auto mb-16">
                We leverage the latest technologies to deliver exceptional Payload CMS solutions 
                that scale with your business needs.
            </p>
        </div>

        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-8">
            @php
                $technologies = [
                    ['name' => 'Payload', 'logo' => 'img/tech/payload-cms.png', 'color' => 'from-blue-500 to-blue-600'],
                    ['name' => 'TypeScript', 'logo' => 'img/tech/typescript-logo.png', 'color' => 'from-blue-600 to-blue-700'],
                    ['name' => 'React', 'logo' => 'img/tech/react.png', 'color' => 'from-cyan-500 to-cyan-600'],
                    ['name' => 'Next.js', 'logo' => 'img/tech/next-js-logo.png', 'color' => 'from-gray-800 to-gray-900'],
                    ['name' => 'Node.js', 'logo' => 'img/tech/Node.js_logo.png', 'color' => 'from-green-500 to-green-600'],
                    ['name' => 'MongoDB', 'logo' => 'img/tech/mongodb-logo.webp', 'color' => 'from-green-600 to-green-700'],
                ];
            @endphp

            @foreach($technologies as $index => $tech)
            <div class="group" data-aos="zoom-in" data-aos-delay="{{ $index * 100 }}">
                <div class="bg-white rounded-2xl p-6 shadow-lg hover:shadow-2xl transition-all duration-500 transform hover:-translate-y-4 hover:rotate-2">
                    <div class="flex flex-col items-center">
                        <div class="w-16 h-16 bg-gradient-to-br {{ $tech['color'] }} rounded-xl flex items-center justify-center mb-4 group-hover:scale-110 transition-transform duration-300">
                            <img src="{{ asset($tech['logo']) }}" alt="{{ $tech['name'] }}" class="w-10 h-10 object-contain filter brightness-0 invert">
                        </div>
                        <h3 class="font-semibold text-gray-800 text-center">{{ $tech['name'] }}</h3>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Why Choose Us -->
<section class="py-32 bg-gray-900 text-white relative overflow-hidden">
    <div class="absolute inset-0">
        <div class="absolute inset-0 bg-gradient-to-r from-purple-900/20 to-blue-900/20"></div>
        <div class="absolute top-1/4 left-1/4 w-64 h-64 bg-purple-500/10 rounded-full blur-3xl"></div>
        <div class="absolute bottom-1/4 right-1/4 w-80 h-80 bg-blue-500/10 rounded-full blur-3xl"></div>
    </div>
    
    <div class="container mx-auto max-w-7xl px-4 md:px-6 lg:px-8 relative">
        <div class="text-center mb-24" data-aos="fade-up">
            <h2 class="text-4xl md:text-5xl font-bold mb-8">
                Why <span class="bg-gradient-to-r from-yellow-400 to-orange-500 bg-clip-text text-transparent">Execudea</span> 
                for Payload CMS?
            </h2>
            <p class="text-xl text-gray-300 max-w-3xl mx-auto mb-16">
                We don't just build websites – we craft digital experiences that drive results and exceed expectations.
            </p>
        </div>

        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
            @php
                $advantages = [
                    [
                        'icon' => '🚀',
                        'title' => 'Expert Development',
                        'description' => 'Certified Payload CMS developers with deep TypeScript and React expertise for enterprise-grade solutions.'
                    ],
                    [
                        'icon' => '⚡',
                        'title' => 'Lightning Fast',
                        'description' => 'Optimized headless architecture delivering blazing-fast performance and exceptional user experiences.'
                    ],
                    [
                        'icon' => '🔒',
                        'title' => 'Enterprise Security',
                        'description' => 'Bank-level security implementations with role-based access control and data protection compliance.'
                    ],
                    [
                        'icon' => '🎨',
                        'title' => 'Custom Solutions',
                        'description' => 'Tailored admin panels and content workflows designed specifically for your business requirements.'
                    ],
                    [
                        'icon' => '📱',
                        'title' => 'Multi-Platform',
                        'description' => 'Content that seamlessly powers websites, mobile apps, and any digital touchpoint through robust APIs.'
                    ],
                    [
                        'icon' => '🔧',
                        'title' => 'Ongoing Support',
                        'description' => 'Dedicated support team ensuring your Payload CMS stays updated, secure, and performing optimally.'
                    ]
                ];
            @endphp

            @foreach($advantages as $index => $advantage)
            <div class="group" data-aos="fade-up" data-aos-delay="{{ $index * 100 }}">
                <div class="bg-white/5 backdrop-blur-sm rounded-2xl p-8 border border-white/10 hover:bg-white/10 transition-all duration-500 hover:scale-105">
                    <div class="text-4xl mb-4">{{ $advantage['icon'] }}</div>
                    <h3 class="text-xl font-bold mb-4">{{ $advantage['title'] }}</h3>
                    <p class="text-gray-300 leading-relaxed">{{ $advantage['description'] }}</p>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="py-32 relative overflow-hidden" style="background: linear-gradient(135deg, #1e3a8a 0%, #3730a3 25%, #7c3aed 50%, #c026d3 75%, #e11d48 100%);">
    <div class="absolute inset-0">
        <div class="absolute inset-0 bg-black/30"></div>
        <div class="absolute -top-1/2 -right-1/2 w-full h-full bg-white/10 rounded-full transform rotate-12 animate-pulse"></div>
        <div class="absolute -bottom-1/2 -left-1/2 w-full h-full bg-white/5 rounded-full transform -rotate-12 animate-pulse"></div>
    </div>
    
    <div class="container mx-auto max-w-7xl px-4 md:px-6 lg:px-8 relative text-center text-white">
        <div data-aos="fade-up">
            <h2 class="text-4xl md:text-6xl font-bold mb-8 leading-tight">
                Ready to Transform Your
                <span class="block bg-gradient-to-r from-yellow-400 via-orange-400 to-pink-400 bg-clip-text text-transparent">
                    Digital Experience?
                </span>
            </h2>
            <p class="text-xl md:text-2xl mb-12 opacity-90 max-w-4xl mx-auto leading-relaxed">
                Join leading Pakistani organizations who trust Execudea for their Payload CMS solutions. 
                Let's build something extraordinary together and revolutionize your digital presence.
            </p>
            
            <div class="flex flex-col sm:flex-row gap-6 justify-center items-center">
                <a href="{{ route('contact') }}" class="bg-white text-gray-900 px-10 py-5 rounded-2xl font-bold text-lg hover:bg-gray-100 hover:text-gray-900 transition-all duration-300 transform hover:scale-105 shadow-2xl hover:shadow-white/25">
                    Start Your Project Today →
                </a>
                <a href="mailto:info@execudea.com" class="border-2 border-white/50 bg-white/10 backdrop-blur-sm text-white px-10 py-5 rounded-2xl font-bold text-lg hover:bg-white hover:text-gray-900 transition-all duration-300 transform hover:scale-105">
                    Schedule a Consultation
                </a>
            </div>
        </div>
    </div>
</section>

@push('styles')
<style>
.hero-with-shapes {
    position: relative;
}

.shape1, .shape2, .shape3, .shape4 {
    position: absolute;
    background: linear-gradient(45deg, #4db8b3, #4db8b3);
    border-radius: 50%;
    opacity: 0.1;
    animation: float 6s ease-in-out infinite;
}

.shape1 {
    width: 100px;
    height: 100px;
    top: 10%;
    left: 10%;
    animation-delay: 0s;
}

.shape2 {
    width: 150px;
    height: 150px;
    top: 60%;
    right: 20%;
    animation-delay: 2s;
}

.shape3 {
    width: 80px;
    height: 80px;
    bottom: 20%;
    left: 70%;
    animation-delay: 4s;
}

.shape4 {
    width: 120px;
    height: 120px;
    top: 30%;
    right: 10%;
    animation-delay: 1s;
}

@keyframes float {
    0%, 100% {
        transform: translateY(0px);
    }
    50% {
        transform: translateY(-20px);
    }
}

.text-gradient {
    background: linear-gradient(45deg, #667eea, #764ba2);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
}
</style>
@endpush

@push('scripts')
<!-- AOS Animation Library -->
<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
    AOS.init({
        duration: 1000,
        easing: 'ease-in-out-cubic',
        once: true,
        offset: 100
    });
</script>
@endpush

@endsection