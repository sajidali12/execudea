@extends('layouts.app')

@section('title', 'Best Payload CMS Development Company In Pakistan | Headless CMS Solutions')
@section('meta_description', 'Professional Payload CMS development services in Pakistan. Build modern headless CMS applications with TypeScript, React admin panels, and scalable content management solutions.')
@section('meta_keywords', 'payload cms development pakistan, headless cms development, typescript cms, react admin panels, content management systems, api-first cms, modern cms solutions')
@section('canonical', url('/payload-cms-development'))

@push('meta')
<meta property="og:title" content="Best Payload CMS Development Company In Pakistan | Headless CMS Solutions">
<meta property="og:description" content="Professional Payload CMS development services in Pakistan. Build modern headless CMS applications with TypeScript, React admin panels, and scalable content management solutions.">
<meta property="og:url" content="{{ url('/payload-cms-development') }}">
<meta property="og:type" content="website">
<meta property="og:image" content="{{ asset('img/tech/payload-top-banner-image.jpg') }}">
<meta property="og:site_name" content="Execudea">

<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:title" content="Best Payload CMS Development Company In Pakistan | Headless CMS Solutions">
<meta name="twitter:description" content="Professional Payload CMS development services in Pakistan. Build modern headless CMS applications with TypeScript and React.">
<meta name="twitter:image" content="{{ asset('img/tech/payload-top-banner-image.jpg') }}">

<meta name="robots" content="index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1">
<meta name="googlebot" content="index, follow">
<link rel="alternate" hreflang="en" href="{{ url('/payload-cms-development') }}">
@endpush

@section('content')
<section class="relative pt-32 pb-24" style="background: linear-gradient(rgba(0,85,255,.07) 0,rgba(0,85,255,.05) 100%)">
        <div class="container mx-auto max-w-7xl px-4 md:px-6 lg:px-8">
            <div class="grid lg:grid-cols-2 grid-cols-1 gap-8 lg:gap-16 items-center">
                <div class="order-2 lg:order-1" data-aos="fade-right">
                    <div class="relative w-full max-w-2xl mx-auto lg:mx-0">
                        <img src="{{ asset('img/tech/payload-top-banner-image.jpg') }}" alt="payload-cms-development-img" class="w-full h-auto rounded-lg shadow-lg object-cover" />
                    </div>
                </div>

                <div class="order-1 lg:order-2" data-aos="fade-left">
                    <div class="text-center sm:text-start">
                        <h1 class="text-3xl/snug sm:text-4xl/snug xl:text-5xl/snug font-semibold font-futura-bold mb-7">
                            Modern <span class="relative after:bg-yellow-500/50 after:-z-10 after:absolute after:h-6 after:w-full after:bottom-0 after:end-0">Payload CMS Development</span> with Execudea.
                        </h1>
                        <p class="text-base/relaxed text-gray-500">
                            At Execudea, we specialize in <b>Payload CMS Development</b> services that deliver modern, headless content management solutions built with TypeScript and React. 
                            Our expert team creates scalable, API-first CMS applications that provide exceptional developer experience and powerful admin interfaces. 
                            From content-rich websites to complex digital platforms, we leverage Payload's flexibility to build solutions that grow with your business.
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
            <h2 class="text-3xl font-medium mt-5 mb-4 font-futura-bold">Payload CMS Development Services</h2>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 max-w-6xl mx-auto">
        @php
            $services = [
                ['title' => 'Headless CMS Development', 'description' => 'Building API-first content management systems with Payload CMS that deliver content to any frontend technology.', 'icon' => 'img/tech/payload.png'],
                ['title' => 'Custom Admin Panels', 'description' => 'Creating intuitive React-based admin interfaces with TypeScript for efficient content management and user experience.', 'icon' => 'img/tech/react.png'],
                ['title' => 'API Integration & Development', 'description' => 'Developing robust REST and GraphQL APIs with Payload CMS for seamless data exchange and third-party integrations.', 'icon' => 'img/tech/node.png'],
            ];
        @endphp
        
        @foreach($services as $service)
            <div class="border-2 border-transparent rounded-lg p-6 hover:bg-white hover:border-gray-300 hover:shadow-lg transition-all duration-300">
                <div class="h-12 w-12 rounded-md bg-blue-500/10 flex items-center justify-center mb-4">
                    <img class="h-8 w-8" src="{{ asset($service['icon']) }}" alt="{{ $service['title'] }}" />
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
            <h2 class="text-3xl md:text-4xl font-medium font-futura-bold mb-4">Payload CMS Technology Stack</h2>
            <p class="text-lg text-gray-600 max-w-3xl mx-auto">
                We utilize modern technologies and frameworks to build powerful, scalable Payload CMS applications
            </p>
        </div>
        <div class="max-w-5xl mx-auto">
            @include('partials.payload-tech')
        </div>
    </div>
</section>

<!-- FAQ Section -->
<section class="py-20 bg-gray-50/30">
    <div class="container mx-auto max-w-7xl px-4 md:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="text-3xl md:text-4xl font-medium font-futura-bold mb-4">Frequently Asked Questions</h2>
            <p class="text-lg text-gray-600 max-w-3xl mx-auto">
                Get answers to common questions about our Payload CMS development services
            </p>
        </div>
        <div class="max-w-4xl mx-auto">
            @php
                $faqs = [
                    [
                        'question' => 'What is Payload CMS and why should I choose it?',
                        'answer' => 'Payload CMS is a modern, TypeScript-based headless CMS that offers exceptional developer experience with React admin panels, automatic API generation, and type safety. It\'s perfect for developers who want full control over their content management system.'
                    ],
                    [
                        'question' => 'How long does it take to develop a Payload CMS application?',
                        'answer' => 'Development time varies based on complexity. A basic Payload CMS setup takes 1-2 weeks, while complex applications with custom collections, authentication, and integrations can take 4-8 weeks. We provide detailed timelines during project planning.'
                    ],
                    [
                        'question' => 'Can you migrate my existing CMS to Payload CMS?',
                        'answer' => 'Yes, we provide migration services from various CMS platforms to Payload CMS. We handle data migration, content restructuring, and ensure smooth transition while maintaining SEO rankings and functionality.'
                    ],
                    [
                        'question' => 'Does Payload CMS support e-commerce functionality?',
                        'answer' => 'Yes, Payload CMS can be configured for e-commerce applications with custom collections for products, orders, and payments. We integrate it with payment gateways and build custom e-commerce solutions tailored to your needs.'
                    ],
                    [
                        'question' => 'Do you provide ongoing maintenance for Payload CMS applications?',
                        'answer' => 'Absolutely! We offer comprehensive maintenance packages including updates, security monitoring, performance optimization, feature enhancements, and technical support to ensure your Payload CMS application runs smoothly.'
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
  "name": "Payload CMS Development Services",
  "description": "Professional Payload CMS development services in Pakistan. Build modern headless CMS applications with TypeScript, React admin panels, and scalable content management solutions.",
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
  "serviceType": "Payload CMS Development",
  "areaServed": {
    "@type": "Country",
    "name": "Pakistan"
  },
  "hasOfferCatalog": {
    "@type": "OfferCatalog",
    "name": "Payload CMS Development Services",
    "itemListElement": [
      {
        "@type": "Offer",
        "itemOffered": {
          "@type": "Service",
          "name": "Headless CMS Development",
          "description": "Building API-first content management systems with Payload CMS that deliver content to any frontend technology."
        }
      },
      {
        "@type": "Offer",
        "itemOffered": {
          "@type": "Service",
          "name": "Custom Admin Panels",
          "description": "Creating intuitive React-based admin interfaces with TypeScript for efficient content management and user experience."
        }
      },
      {
        "@type": "Offer",
        "itemOffered": {
          "@type": "Service",
          "name": "API Integration & Development",
          "description": "Developing robust REST and GraphQL APIs with Payload CMS for seamless data exchange and third-party integrations."
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
      "name": "Payload CMS Development",
      "item": "{{ url('/payload-cms-development') }}"
    }
  ]
}
</script>
@endpush

@endsection