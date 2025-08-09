@extends('layouts.app')

@section('title', 'Best Web Development Company In Pakistan | Custom Web Solutions')
@section('meta_description', 'Professional web development services in Pakistan. We build custom websites, e-commerce solutions, and web applications using modern technologies like React, Laravel, and PHP.')
@section('meta_keywords', 'web development pakistan, custom website development, e-commerce development, react development, laravel development, php development, responsive web design')
@section('canonical', url('/web-development'))

@push('meta')
<meta property="og:title" content="Best Web Development Company In Pakistan | Custom Web Solutions">
<meta property="og:description" content="Professional web development services in Pakistan. We build custom websites, e-commerce solutions, and web applications using modern technologies like React, Laravel, and PHP.">
<meta property="og:url" content="{{ url('/web-development') }}">
<meta property="og:type" content="website">
<meta property="og:image" content="{{ asset('img/tech/web.jpeg') }}">
<meta property="og:site_name" content="Execudea">

<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:title" content="Best Web Development Company In Pakistan | Custom Web Solutions">
<meta name="twitter:description" content="Professional web development services in Pakistan. We build custom websites, e-commerce solutions, and web applications using modern technologies.">
<meta name="twitter:image" content="{{ asset('img/tech/web.jpeg') }}">

<meta name="robots" content="index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1">
<meta name="googlebot" content="index, follow">
<link rel="alternate" hreflang="en" href="{{ url('/web-development') }}">
@endpush

@section('content')
<section class="relative pt-32 pb-24" style="background: linear-gradient(rgba(0,85,255,.07) 0,rgba(0,85,255,.05) 100%)">
        <div class="container mx-auto max-w-7xl px-4 md:px-6 lg:px-8">
            <div class="grid lg:grid-cols-2 grid-cols-1 gap-8 lg:gap-16 items-center">
                <div class="order-2 lg:order-1" data-aos="fade-right">
                    <div class="relative w-full max-w-2xl mx-auto lg:mx-0">
                        <img src="{{ asset('img/tech/web.jpeg') }}" alt="web-development-img" class="w-full h-auto rounded-lg shadow-lg object-cover" />
                    </div>
                </div>

                <div class="order-1 lg:order-2" data-aos="fade-left">
                    <div class="text-center sm:text-start">
                        <h1 class="text-3xl/snug sm:text-4xl/snug xl:text-5xl/snug font-semibold font-futura-bold mb-7">
                            Professional <span class="relative after:bg-yellow-500/50 after:-z-10 after:absolute after:h-6 after:w-full after:bottom-0 after:end-0">Web Development</span> with Execudea.
                        </h1>
                        <p class="text-base/relaxed text-gray-500">
                            At Execudea, we provide comprehensive <b>Web Development</b> services that transform your ideas into powerful, scalable, and user-friendly websites. 
                            Our expert team utilizes cutting-edge technologies and industry best practices to deliver custom solutions that meet your business objectives. 
                            From responsive design to complex web applications, we ensure your digital presence stands out in today's competitive landscape.
                        </p>
                        <div class="flex sm:flex-row flex-col gap-2 mt-10 relative" style="z-index: 10;">
                            <a href="{{ route('contact') }}" class="bg-primary text-white px-6 py-3 rounded-lg inline-flex items-center text-sm md:m-0 m-auto transition duration-300 hover:bg-secondary-400 shadow-lg hover:shadow-xl relative" style="z-index: 10;">
                                Contact Us <i class="fa-solid fa-arrow-right ms-2"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <div class="absolute bottom-0 inset-x-0 hidden sm:block" style="z-index: 1;">
        <img src="{{ asset('img/shapes/white-wave.svg') }}" alt="white-wave-svg" class="w-full -scale-x-100 -scale-y-100" />
    </div>
</section>

<section class="py-20 bg-gray-50/30">
    <div class="container mx-auto max-w-7xl px-4 md:px-6 lg:px-8">
        <div class="text-center mb-16">
            <span class="text-sm font-medium py-1 px-3 rounded-full text-primary bg-primary/10">Our Services</span>
            <h2 class="text-3xl font-medium mt-5 mb-4 font-futura-bold">Web Development Services</h2>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 max-w-6xl mx-auto">
        @php
            $services = [
                ['title' => 'Frontend Development', 'description' => 'Creating responsive and interactive user interfaces using modern technologies like React, Vue.js, and Angular.'],
                ['title' => 'Backend Development', 'description' => 'Building robust server-side applications with PHP, Laravel, Node.js, and Express to power your web applications.'],
                ['title' => 'Full-Stack Solutions', 'description' => 'Comprehensive development services covering both frontend and backend to deliver complete web solutions.'],
            ];
        @endphp
        
        @foreach($services as $service)
            <div class="border-2 border-transparent rounded-lg p-6 hover:bg-white hover:border-gray-300 hover:shadow-lg transition-all duration-300">
                <div class="h-12 w-12 rounded-md bg-blue-500/10 flex items-center justify-center mb-4">
                    <img class="h-8 w-8" src="{{ asset('favicon.png') }}" alt="Execudea Private Limited" />
                </div>
                <h3 class="mb-3 mt-4 text-lg font-semibold">{{ $service['title'] }}</h3>
                <p class="text-gray-600">{{ $service['description'] }}</p>
            </div>
        @endforeach
        </div>
    </div>
</section>

<section class="py-20 bg-white">
    <div class="container mx-auto max-w-7xl px-4 md:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="text-3xl md:text-4xl font-medium font-futura-bold mb-4">Our Technology Stack</h2>
            <p class="text-lg text-gray-600 max-w-3xl mx-auto">
                We leverage cutting-edge technologies and frameworks to build robust, scalable web solutions
            </p>
        </div>
        <div class="max-w-5xl mx-auto">
            @include('partials.tech-logos')
        </div>
    </div>
</section>

<!-- FAQ Section -->
<section class="py-20 bg-gray-50/30">
    <div class="container mx-auto max-w-7xl px-4 md:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="text-3xl md:text-4xl font-medium font-futura-bold mb-4">Frequently Asked Questions</h2>
            <p class="text-lg text-gray-600 max-w-3xl mx-auto">
                Get answers to common questions about our web development services
            </p>
        </div>
        <div class="max-w-4xl mx-auto">
            @php
                $faqs = [
                    [
                        'question' => 'What technologies do you use for web development?',
                        'answer' => 'We use modern technologies including HTML5, CSS3, JavaScript, React, Vue.js, PHP, Laravel, Node.js, and various databases. We choose the best technology stack based on your project requirements and business goals.'
                    ],
                    [
                        'question' => 'How long does it take to develop a custom website?',
                        'answer' => 'The timeline depends on the complexity and features required. A simple business website typically takes 2-4 weeks, while complex web applications can take 3-6 months. We provide detailed timelines during the project planning phase.'
                    ],
                    [
                        'question' => 'Do you provide ongoing maintenance and support?',
                        'answer' => 'Yes, we offer comprehensive maintenance packages including security updates, bug fixes, performance optimization, content updates, and technical support to ensure your website runs smoothly.'
                    ],
                    [
                        'question' => 'Can you help with e-commerce website development?',
                        'answer' => 'Absolutely! We specialize in e-commerce development using platforms like WooCommerce, Shopify, and custom solutions. We build secure, scalable online stores with payment gateway integration and inventory management.'
                    ],
                    [
                        'question' => 'Do you ensure websites are mobile-responsive and SEO-friendly?',
                        'answer' => 'Yes, all our websites are built with mobile-first responsive design and follow SEO best practices. We ensure fast loading times, proper meta tags, structured data, and clean code for better search engine rankings.'
                    ]
                ];
            @endphp
            
            <div class="space-y-4">
                @foreach($faqs as $index => $faq)
                <div class="bg-white rounded-lg border border-gray-200 shadow-sm">
                    <button class="w-full px-6 py-4 text-left flex justify-between items-center hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-primary/20 transition-colors duration-200" 
                            onclick="toggleFaq({{ $index }})" 
                            aria-expanded="false" 
                            aria-controls="faq-content-{{ $index }}">
                        <h3 class="text-lg font-semibold text-gray-900 pr-4">{{ $faq['question'] }}</h3>
                        <svg id="faq-icon-{{ $index }}" class="w-5 h-5 text-gray-600 transform transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </button>
                    <div id="faq-content-{{ $index }}" class="hidden px-6 pb-4">
                        <p class="text-gray-600 leading-relaxed">{{ $faq['answer'] }}</p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>

@push('scripts')
<script>
function toggleFaq(index) {
    const content = document.getElementById(`faq-content-${index}`);
    const icon = document.getElementById(`faq-icon-${index}`);
    const button = content.previousElementSibling;
    
    const isHidden = content.classList.contains('hidden');
    
    if (isHidden) {
        content.classList.remove('hidden');
        icon.style.transform = 'rotate(180deg)';
        button.setAttribute('aria-expanded', 'true');
    } else {
        content.classList.add('hidden');
        icon.style.transform = 'rotate(0deg)';
        button.setAttribute('aria-expanded', 'false');
    }
}
</script>

<!-- FAQ Schema Markup -->
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "FAQPage",
  "mainEntity": [
    @foreach($faqs as $index => $faq)
    {
      "@type": "Question",
      "name": "{{ $faq['question'] }}",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "{{ $faq['answer'] }}"
      }
    }@if($index < count($faqs) - 1),@endif
    @endforeach
  ]
}
</script>

<!-- Service Schema Markup -->
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "Service",
  "name": "Web Development Services",
  "description": "Professional web development services in Pakistan. We build custom websites, e-commerce solutions, and web applications using modern technologies like React, Laravel, and PHP.",
  "provider": {
    "@type": "Organization",
    "name": "Execudea",
    "url": "{{ url('/') }}",
    "logo": "{{ asset('favicon.png') }}",
    "contactPoint": {
      "@type": "ContactPoint",
      "telephone": "+92-300-0000000",
      "contactType": "customer service",
      "availableLanguage": ["English", "Urdu"]
    }
  },
  "serviceType": "Web Development",
  "areaServed": {
    "@type": "Country",
    "name": "Pakistan"
  },
  "hasOfferCatalog": {
    "@type": "OfferCatalog",
    "name": "Web Development Services",
    "itemListElement": [
      {
        "@type": "Offer",
        "itemOffered": {
          "@type": "Service",
          "name": "Frontend Development",
          "description": "Creating responsive and interactive user interfaces using modern technologies like React, Vue.js, and Angular."
        }
      },
      {
        "@type": "Offer",
        "itemOffered": {
          "@type": "Service",
          "name": "Backend Development",
          "description": "Building robust server-side applications with PHP, Laravel, Node.js, and Express to power your web applications."
        }
      },
      {
        "@type": "Offer",
        "itemOffered": {
          "@type": "Service",
          "name": "Full-Stack Solutions",
          "description": "Comprehensive development services covering both frontend and backend to deliver complete web solutions."
        }
      }
    ]
  }
}
</script>

<!-- Breadcrumb Schema -->
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "BreadcrumbList",
  "itemListElement": [
    {
      "@type": "ListItem",
      "position": 1,
      "name": "Home",
      "item": "{{ url('/') }}"
    },
    {
      "@type": "ListItem",
      "position": 2,
      "name": "Services",
      "item": "{{ url('/') }}#services"
    },
    {
      "@type": "ListItem",
      "position": 3,
      "name": "Web Development",
      "item": "{{ url('/web-development') }}"
    }
  ]
}
</script>
@endpush

@endsection