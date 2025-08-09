@extends('layouts.app')

@section('title', 'Best SEO Services Company In Pakistan | Search Engine Optimization')
@section('meta_description', 'Professional SEO services in Pakistan. Boost your website rankings with our comprehensive search engine optimization strategies including technical SEO, content optimization, and local SEO.')
@section('meta_keywords', 'seo services pakistan, search engine optimization, technical seo, content optimization, local seo, seo agency pakistan, google ranking, organic traffic')
@section('canonical', url('/search-engine-optimization'))

@push('meta')
<meta property="og:title" content="Best SEO Services Company In Pakistan | Search Engine Optimization">
<meta property="og:description" content="Professional SEO services in Pakistan. Boost your website rankings with our comprehensive search engine optimization strategies including technical SEO, content optimization, and local SEO.">
<meta property="og:url" content="{{ url('/search-engine-optimization') }}">
<meta property="og:type" content="website">
<meta property="og:image" content="{{ asset('img/seo.jpeg') }}">
<meta property="og:site_name" content="Execudea">

<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:title" content="Best SEO Services Company In Pakistan | Search Engine Optimization">
<meta name="twitter:description" content="Professional SEO services in Pakistan. Boost your website rankings with our comprehensive search engine optimization strategies.">
<meta name="twitter:image" content="{{ asset('img/seo.jpeg') }}">

<meta name="robots" content="index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1">
<meta name="googlebot" content="index, follow">
<link rel="alternate" hreflang="en" href="{{ url('/search-engine-optimization') }}">
@endpush

@section('content')
<section class="relative pt-32 pb-24" style="background: linear-gradient(rgba(0,85,255,.07) 0,rgba(0,85,255,.05) 100%)">
        <div class="container mx-auto max-w-7xl px-4 md:px-6 lg:px-8">
            <div class="grid lg:grid-cols-2 grid-cols-1 gap-8 lg:gap-16 items-center">
                <div class="order-2 lg:order-1" data-aos="fade-right">
                    <div class="relative w-full max-w-2xl mx-auto lg:mx-0">
                        <img src="{{ asset('img/seo.jpeg') }}" alt="seo-services-img" class="w-full h-auto rounded-lg shadow-lg object-cover" />
                    </div>
                </div>

                <div class="order-1 lg:order-2" data-aos="fade-left">
                    <div class="text-center sm:text-start">
                        <h1 class="text-3xl/snug sm:text-4xl/snug xl:text-5xl/snug font-semibold font-futura-bold mb-7">
                            Boost Your Rankings with <span class="relative after:bg-yellow-500/50 after:-z-10 after:absolute after:h-6 after:w-full after:bottom-0 after:end-0">SEO Services</span> from Execudea.
                        </h1>
                        <p class="text-base/relaxed text-gray-500">
                            At Execudea, we provide comprehensive <b>Search Engine Optimization (SEO)</b> services that help your website rank higher in search results and attract more organic traffic. 
                            Our SEO experts use proven strategies and the latest techniques to improve your online visibility, drive qualified leads, and increase your business growth. 
                            From technical SEO to content optimization, we cover all aspects to ensure your success in the digital landscape.
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
            <h2 class="text-3xl font-medium mt-5 mb-4 font-futura-bold">SEO Services</h2>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 max-w-6xl mx-auto">
        @php
            $services = [
                ['title' => 'Technical SEO', 'description' => 'Optimizing website structure, speed, and technical elements to improve search engine crawling and indexing.'],
                ['title' => 'Content Optimization', 'description' => 'Creating and optimizing high-quality content that ranks well and provides value to your target audience.'],
                ['title' => 'Local SEO', 'description' => 'Improving local search visibility to help your business attract customers in your geographic area.'],
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

<section class="py-20">
    <div class="container md:px-5 px-10">
        <h2 class="text-4xl font-medium my-3 font-futura-bold text-center mb-8">SEO Tools We Use</h2>
        <div class="flex justify-center">
            @include('partials.seo-tools')
        </div>
    </div>
</section>

<!-- FAQ Section -->
<section class="py-20 bg-white">
    <div class="container mx-auto max-w-7xl px-4 md:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="text-3xl md:text-4xl font-medium font-futura-bold mb-4">Frequently Asked Questions</h2>
            <p class="text-lg text-gray-600 max-w-3xl mx-auto">
                Get answers to common questions about our SEO services
            </p>
        </div>
        <div class="max-w-4xl mx-auto">
            @php
                $faqs = [
                    [
                        'question' => 'How long does it take to see SEO results?',
                        'answer' => 'SEO is a long-term strategy. You may start seeing improvements in 3-6 months, with significant results typically appearing after 6-12 months. The timeline depends on competition, current website status, and the keywords you are targeting.'
                    ],
                    [
                        'question' => 'What is included in your SEO services?',
                        'answer' => 'Our comprehensive SEO services include technical SEO audits, keyword research, on-page optimization, content creation, link building, local SEO, competitor analysis, and monthly performance reports with actionable insights.'
                    ],
                    [
                        'question' => 'Do you guarantee first page rankings on Google?',
                        'answer' => 'While we cannot guarantee specific rankings (as search engines control algorithms), we use proven strategies and white-hat techniques to significantly improve your search visibility and organic traffic over time.'
                    ],
                    [
                        'question' => 'What is the difference between local SEO and regular SEO?',
                        'answer' => 'Local SEO focuses on optimizing your website for local searches and Google My Business, targeting customers in specific geographic areas. Regular SEO targets broader, national, or global audiences without geographic restrictions.'
                    ],
                    [
                        'question' => 'How do you measure SEO success and ROI?',
                        'answer' => 'We track key metrics including organic traffic growth, keyword rankings, click-through rates, conversion rates, and revenue attribution from organic search. We provide detailed monthly reports showing progress and ROI.'
                    ]
                ];
            @endphp
            
            <div class="space-y-4">
                @foreach($faqs as $index => $faq)
                <div class="bg-gray-50/50 rounded-lg border border-gray-200 shadow-sm">
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
  "name": "SEO Services",
  "description": "Professional SEO services in Pakistan. Boost your website rankings with our comprehensive search engine optimization strategies including technical SEO, content optimization, and local SEO.",
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
  "serviceType": "Search Engine Optimization",
  "areaServed": {
    "@type": "Country",
    "name": "Pakistan"
  },
  "hasOfferCatalog": {
    "@type": "OfferCatalog",
    "name": "SEO Services",
    "itemListElement": [
      {
        "@type": "Offer",
        "itemOffered": {
          "@type": "Service",
          "name": "Technical SEO",
          "description": "Optimizing website structure, speed, and technical elements to improve search engine crawling and indexing."
        }
      },
      {
        "@type": "Offer",
        "itemOffered": {
          "@type": "Service",
          "name": "Content Optimization",
          "description": "Creating and optimizing high-quality content that ranks well and provides value to your target audience."
        }
      },
      {
        "@type": "Offer",
        "itemOffered": {
          "@type": "Service",
          "name": "Local SEO",
          "description": "Improving local search visibility to help your business attract customers in your geographic area."
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
      "name": "SEO Services",
      "item": "{{ url('/search-engine-optimization') }}"
    }
  ]
}
</script>
@endpush

@endsection