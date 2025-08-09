@extends('layouts.app')

@section('title', 'Best UI/UX Design Company in Pakistan | User Experience Experts')
@section('meta_description', 'Professional UI/UX design services in Pakistan. We create intuitive user experiences and beautiful interfaces that engage users and drive business growth.')
@section('meta_keywords', 'ui ux design pakistan, user experience design, user interface design, ux research, interaction design, responsive design, mobile app design')
@section('canonical', url('/user-experience-design'))

@push('meta')
<meta property="og:title" content="Best UI/UX Design Company in Pakistan | User Experience Experts">
<meta property="og:description" content="Professional UI/UX design services in Pakistan. We create intuitive user experiences and beautiful interfaces that engage users and drive business growth.">
<meta property="og:url" content="{{ url('/user-experience-design') }}">
<meta property="og:type" content="website">
<meta property="og:image" content="{{ asset('img/ui-ux.jpg') }}">
<meta property="og:site_name" content="Execudea">

<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:title" content="Best UI/UX Design Company in Pakistan | User Experience Experts">
<meta name="twitter:description" content="Professional UI/UX design services in Pakistan. We create intuitive user experiences and beautiful interfaces that engage users.">
<meta name="twitter:image" content="{{ asset('img/ui-ux.jpg') }}">

<meta name="robots" content="index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1">
<meta name="googlebot" content="index, follow">
<link rel="alternate" hreflang="en" href="{{ url('/user-experience-design') }}">
@endpush

@section('content')
<section class="relative pt-32 pb-24" style="background: linear-gradient(rgba(0,85,255,.07) 0,rgba(0,85,255,.05) 100%)">
        <div class="container mx-auto max-w-7xl px-4 md:px-6 lg:px-8">
            <div class="grid lg:grid-cols-2 grid-cols-1 gap-8 lg:gap-16 items-center">
                <div class="order-2 lg:order-1" data-aos="fade-right">
                    <div class="relative w-full max-w-2xl mx-auto lg:mx-0">
                        <img src="{{ asset('img/ui-ux.jpg') }}" alt="ux-design-img" class="w-full h-auto rounded-lg shadow-lg object-cover" />
                    </div>
                </div>

                <div class="order-1 lg:order-2" data-aos="fade-left">
                    <div class="text-center sm:text-start">
                        <h1 class="text-3xl/snug sm:text-4xl/snug xl:text-5xl/snug font-semibold font-futura-bold mb-7">
                            Make <span class="relative after:bg-yellow-500/50 after:-z-10 after:absolute after:h-6 after:w-full after:bottom-0 after:end-0">User Experience Design</span> with Execudea.
                        </h1>
                        <p class="text-base/relaxed text-gray-500">
                            At Execudea, we specialize in <b>User Experience (UX) Design</b>, dedicated to creating meaningful and relevant interactions that elevate user satisfaction with your digital products. 
                            Our approach begins with comprehensive user research, utilizing techniques such as interviews, surveys, and observational studies to gather valuable insights into your target audience. 
                            By understanding user behaviors, needs, and pain points, we develop detailed personas that represent key user segments, ensuring that our design solutions are tailored to meet their specific requirements.
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
            <h2 class="text-3xl font-medium mt-5 mb-4 font-futura-bold">User Experience (UX) Design</h2>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 max-w-6xl mx-auto">
        @php
            $services = [
                ['title' => 'Interaction Design', 'description' => 'Designing subtle animations and feedback mechanisms that enhance user engagement.'],
                ['title' => 'User Research', 'description' => 'Conducting interviews to understand user needs and pain points. Collecting quantitative data to inform design decisions.'],
                ['title' => 'Responsive Design', 'description' => 'Ensuring that designs function well across various screen sizes and devices.'],
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
            <h2 class="text-3xl md:text-4xl font-medium font-futura-bold mb-4">Our Design Technology Stack</h2>
            <p class="text-lg text-gray-600 max-w-3xl mx-auto">
                We leverage industry-leading design tools and platforms to create exceptional user experiences
            </p>
        </div>
        <div class="max-w-5xl mx-auto">
            @include('partials.user-tech')
        </div>
    </div>
</section>

<!-- FAQ Section -->
<section class="py-20 bg-gray-50/30">
    <div class="container mx-auto max-w-7xl px-4 md:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="text-3xl md:text-4xl font-medium font-futura-bold mb-4">Frequently Asked Questions</h2>
            <p class="text-lg text-gray-600 max-w-3xl mx-auto">
                Get answers to common questions about our UI/UX design services
            </p>
        </div>
        <div class="max-w-4xl mx-auto">
            @php
                $faqs = [
                    [
                        'question' => 'What is the difference between UI and UX design?',
                        'answer' => 'UI (User Interface) design focuses on the visual elements like buttons, colors, and layout, while UX (User Experience) design focuses on the overall user journey, research, and how users interact with your product to achieve their goals.'
                    ],
                    [
                        'question' => 'How long does a typical UI/UX design project take?',
                        'answer' => 'A standard UI/UX design project takes 4-8 weeks depending on complexity. This includes user research, wireframing, prototyping, visual design, and user testing. We provide detailed timelines during project planning.'
                    ],
                    [
                        'question' => 'Do you conduct user research and testing?',
                        'answer' => 'Yes, we conduct comprehensive user research including interviews, surveys, usability testing, and competitor analysis. This helps us create designs based on real user needs and behaviors rather than assumptions.'
                    ],
                    [
                        'question' => 'Can you redesign our existing website or app?',
                        'answer' => 'Absolutely! We specialize in redesigning existing digital products to improve user experience, increase conversions, and modernize the interface while maintaining brand consistency and user familiarity.'
                    ],
                    [
                        'question' => 'Do you provide design systems and style guides?',
                        'answer' => 'Yes, we create comprehensive design systems including color palettes, typography guidelines, component libraries, and style guides to ensure consistency across all your digital touchpoints and future development.'
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
  "name": "UI/UX Design Services",
  "description": "Professional UI/UX design services in Pakistan. We create intuitive user experiences and beautiful interfaces that engage users and drive business growth.",
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
  "serviceType": "UI/UX Design",
  "areaServed": {
    "@type": "Country",
    "name": "Pakistan"
  },
  "hasOfferCatalog": {
    "@type": "OfferCatalog",
    "name": "UI/UX Design Services",
    "itemListElement": [
      {
        "@type": "Offer",
        "itemOffered": {
          "@type": "Service",
          "name": "Interaction Design",
          "description": "Designing subtle animations and feedback mechanisms that enhance user engagement."
        }
      },
      {
        "@type": "Offer",
        "itemOffered": {
          "@type": "Service",
          "name": "User Research",
          "description": "Conducting interviews to understand user needs and pain points. Collecting quantitative data to inform design decisions."
        }
      },
      {
        "@type": "Offer",
        "itemOffered": {
          "@type": "Service",
          "name": "Responsive Design",
          "description": "Ensuring that designs function well across various screen sizes and devices."
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
      "name": "UI/UX Design",
      "item": "{{ url('/user-experience-design') }}"
    }
  ]
}
</script>
@endpush

@endsection