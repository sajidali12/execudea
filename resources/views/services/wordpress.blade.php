@extends('layouts.app')

@section('title', 'Best WordPress Development Company In Pakistan | Custom WordPress Solutions')
@section('meta_description', 'Professional WordPress development services in Pakistan. We build custom WordPress websites, e-commerce stores, and provide maintenance services using the latest WordPress technologies.')
@section('meta_keywords', 'wordpress development pakistan, custom wordpress website, wordpress e-commerce, woocommerce development, wordpress maintenance, wordpress themes, wordpress plugins')
@section('canonical', url('/wordpress-development'))

@push('meta')
<meta property="og:title" content="Best WordPress Development Company In Pakistan | Custom WordPress Solutions">
<meta property="og:description" content="Professional WordPress development services in Pakistan. We build custom WordPress websites, e-commerce stores, and provide maintenance services using the latest WordPress technologies.">
<meta property="og:url" content="{{ url('/wordpress-development') }}">
<meta property="og:type" content="website">
<meta property="og:image" content="{{ asset('img/wordpress.jpg') }}">
<meta property="og:site_name" content="Execudea">

<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:title" content="Best WordPress Development Company In Pakistan | Custom WordPress Solutions">
<meta name="twitter:description" content="Professional WordPress development services in Pakistan. We build custom WordPress websites and e-commerce stores.">
<meta name="twitter:image" content="{{ asset('img/wordpress.jpg') }}">

<meta name="robots" content="index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1">
<meta name="googlebot" content="index, follow">
<link rel="alternate" hreflang="en" href="{{ url('/wordpress-development') }}">
@endpush

@section('content')
<section class="relative pt-32 pb-24" style="background: linear-gradient(rgba(0,85,255,.07) 0,rgba(0,85,255,.05) 100%)">
        <div class="container mx-auto max-w-7xl px-4 md:px-6 lg:px-8">
            <div class="grid lg:grid-cols-2 grid-cols-1 gap-8 lg:gap-16 items-center">
                <div class="order-2 lg:order-1" data-aos="fade-right">
                    <div class="relative w-full max-w-2xl mx-auto lg:mx-0">
                        <img src="{{ asset('img/wordpress.jpg') }}" alt="wordpress-development-img" class="w-full h-auto rounded-lg shadow-lg object-cover" />
                    </div>
                </div>

                <div class="order-1 lg:order-2" data-aos="fade-left">
                    <div class="text-center sm:text-start">
                        <h1 class="text-3xl/snug sm:text-4xl/snug xl:text-5xl/snug font-semibold font-futura-bold mb-7">
                            Professional <span class="relative after:bg-yellow-500/50 after:-z-10 after:absolute after:h-6 after:w-full after:bottom-0 after:end-0">WordPress Development</span> with Execudea.
                        </h1>
                        <p class="text-base/relaxed text-gray-500">
                            At Execudea, we specialize in <b>WordPress Development</b> services that create powerful, scalable, and user-friendly websites. 
                            Our expert team builds custom WordPress solutions that perfectly match your business needs, from simple blogs to complex e-commerce platforms. 
                            We leverage the flexibility of WordPress to deliver websites that are not only visually stunning but also highly functional and easy to manage.
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
            <h2 class="text-3xl font-medium mt-5 mb-4 font-futura-bold">WordPress Development Services</h2>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 max-w-6xl mx-auto">
        @php
            $services = [
                ['title' => 'Custom WordPress Development', 'description' => 'Building custom WordPress themes and plugins tailored to your specific business requirements and brand identity.'],
                ['title' => 'E-commerce Solutions', 'description' => 'Creating powerful WooCommerce stores that drive sales and provide seamless shopping experiences for your customers.'],
                ['title' => 'WordPress Maintenance', 'description' => 'Providing ongoing support, updates, and security monitoring to keep your WordPress site running smoothly and securely.'],
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
            <h2 class="text-3xl md:text-4xl font-medium font-futura-bold mb-4">WordPress Technologies We Use</h2>
            <p class="text-lg text-gray-600 max-w-3xl mx-auto">
                We utilize the latest WordPress tools and technologies to build powerful, scalable websites
            </p>
        </div>
        <div class="max-w-5xl mx-auto">
            @include('partials.wordpress-tools')
        </div>
    </div>
</section>

<!-- FAQ Section -->
<section class="py-20 bg-gray-50/30">
    <div class="container mx-auto max-w-7xl px-4 md:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="text-3xl md:text-4xl font-medium font-futura-bold mb-4">Frequently Asked Questions</h2>
            <p class="text-lg text-gray-600 max-w-3xl mx-auto">
                Get answers to common questions about our WordPress development services
            </p>
        </div>
        <div class="max-w-4xl mx-auto">
            @php
                $faqs = [
                    [
                        'question' => 'Why should I choose WordPress for my website?',
                        'answer' => 'WordPress powers over 40% of all websites globally. It offers flexibility, scalability, SEO-friendliness, thousands of themes and plugins, easy content management, and strong community support. It is perfect for blogs, business websites, and e-commerce stores.'
                    ],
                    [
                        'question' => 'Can you migrate my existing website to WordPress?',
                        'answer' => 'Yes, we provide complete website migration services to WordPress. We handle the entire process including content migration, design adaptation, URL redirects, and ensuring no data loss while maintaining SEO rankings.'
                    ],
                    [
                        'question' => 'Do you provide WordPress maintenance and support?',
                        'answer' => 'Absolutely! We offer comprehensive WordPress maintenance packages including regular updates, security monitoring, backups, performance optimization, bug fixes, and technical support to keep your website secure and running smoothly.'
                    ],
                    [
                        'question' => 'Can you build e-commerce stores with WordPress?',
                        'answer' => 'Yes, we specialize in WooCommerce development for WordPress. We build fully functional online stores with product catalogs, shopping carts, payment gateways, inventory management, and shipping integrations tailored to your business needs.'
                    ],
                    [
                        'question' => 'Will my WordPress website be mobile-responsive and fast?',
                        'answer' => 'Yes, all our WordPress websites are built with mobile-first responsive design and optimized for speed. We use performance optimization techniques, caching, image optimization, and clean code to ensure fast loading times across all devices.'
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
  "name": "WordPress Development Services",
  "description": "Professional WordPress development services in Pakistan. We build custom WordPress websites, e-commerce stores, and provide maintenance services using the latest WordPress technologies.",
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
  "serviceType": "WordPress Development",
  "areaServed": {
    "@type": "Country",
    "name": "Pakistan"
  },
  "hasOfferCatalog": {
    "@type": "OfferCatalog",
    "name": "WordPress Development Services",
    "itemListElement": [
      {
        "@type": "Offer",
        "itemOffered": {
          "@type": "Service",
          "name": "Custom WordPress Development",
          "description": "Building custom WordPress themes and plugins tailored to your specific business requirements and brand identity."
        }
      },
      {
        "@type": "Offer",
        "itemOffered": {
          "@type": "Service",
          "name": "E-commerce Solutions",
          "description": "Creating powerful WooCommerce stores that drive sales and provide seamless shopping experiences for your customers."
        }
      },
      {
        "@type": "Offer",
        "itemOffered": {
          "@type": "Service",
          "name": "WordPress Maintenance",
          "description": "Providing ongoing support, updates, and security monitoring to keep your WordPress site running smoothly and securely."
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
      "name": "WordPress Development",
      "item": "{{ url('/wordpress-development') }}"
    }
  ]
}
</script>
@endpush

@endsection