@extends('layouts.app')

@section('title', 'Best AI Development Company In Pakistan | Artificial Intelligence Solutions')
@section('meta_description', 'Professional AI development services in Pakistan. Build intelligent applications with machine learning, natural language processing, computer vision, and custom AI solutions using Python, TensorFlow, and modern AI frameworks.')
@section('meta_keywords', 'ai development pakistan, artificial intelligence development, machine learning services, nlp development, computer vision, python ai, tensorflow development, ai solutions')
@section('canonical', url('/ai-development'))

@push('meta')
<meta property="og:title" content="Best AI Development Company In Pakistan | Artificial Intelligence Solutions">
<meta property="og:description" content="Professional AI development services in Pakistan. Build intelligent applications with machine learning, natural language processing, computer vision, and custom AI solutions using Python, TensorFlow, and modern AI frameworks.">
<meta property="og:url" content="{{ url('/ai-development') }}">
<meta property="og:type" content="website">
<meta property="og:image" content="{{ asset('img/tech/ai.png') }}">
<meta property="og:site_name" content="Execudea">

<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:title" content="Best AI Development Company In Pakistan | Artificial Intelligence Solutions">
<meta name="twitter:description" content="Professional AI development services in Pakistan. Build intelligent applications with machine learning, NLP, and computer vision.">
<meta name="twitter:image" content="{{ asset('img/tech/ai.png') }}">

<meta name="robots" content="noindex, nofollow, noarchive, nosnippet">
<meta name="googlebot" content="noindex, nofollow">
<link rel="alternate" hreflang="en" href="{{ url('/ai-development') }}">
@endpush

@section('content')
<section class="relative pt-32 pb-24" style="background: linear-gradient(rgba(0,85,255,.07) 0,rgba(0,85,255,.05) 100%)">
        <div class="container mx-auto max-w-7xl px-4 md:px-6 lg:px-8">
            <div class="grid lg:grid-cols-2 grid-cols-1 gap-8 lg:gap-16 items-center">
                <div class="order-2 lg:order-1" data-aos="fade-right">
                    <div class="relative w-full max-w-2xl mx-auto lg:mx-0">
                        <img src="{{ asset('img/tech/ai.png') }}" alt="ai-development-img" class="w-full h-auto rounded-lg shadow-lg object-cover" />
                    </div>
                </div>

                <div class="order-1 lg:order-2" data-aos="fade-left">
                    <div class="text-center sm:text-start">
                        <h1 class="text-3xl/snug sm:text-4xl/snug xl:text-5xl/snug font-semibold font-futura-bold mb-7">
                            Intelligent <span class="relative after:bg-yellow-500/50 after:-z-10 after:absolute after:h-6 after:w-full after:bottom-0 after:end-0">AI Development</span> Solutions with Execudea.
                        </h1>
                        <p class="text-base/relaxed text-gray-500">
                            At Execudea, we specialize in <b>Artificial Intelligence Development</b> services that transform businesses through intelligent automation and data-driven insights. 
                            Our expert team builds cutting-edge AI applications using machine learning, natural language processing, computer vision, and deep learning technologies. 
                            From predictive analytics to conversational AI, we create intelligent solutions that enhance efficiency and drive innovation across industries.
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
            <h2 class="text-3xl font-medium mt-5 mb-4 font-futura-bold">AI Development Services</h2>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 max-w-6xl mx-auto">
        @php
            $services = [
                ['title' => 'Machine Learning Solutions', 'description' => 'Building predictive models and intelligent algorithms using scikit-learn, TensorFlow, and PyTorch for data-driven decision making.', 'icon' => 'img/tech/python.png'],
                ['title' => 'Natural Language Processing', 'description' => 'Developing chatbots, sentiment analysis, and text processing applications using advanced NLP frameworks and transformers.', 'icon' => 'img/tech/ai.png'],
                ['title' => 'Computer Vision Applications', 'description' => 'Creating image recognition, object detection, and visual analytics solutions using OpenCV, YOLO, and deep learning models.', 'icon' => 'img/tech/tensorflow.png'],
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
            <h2 class="text-3xl md:text-4xl font-medium font-futura-bold mb-4">AI Development Technology Stack</h2>
            <p class="text-lg text-gray-600 max-w-3xl mx-auto">
                We utilize cutting-edge AI frameworks and technologies to build intelligent, scalable solutions
            </p>
        </div>
        <div class="max-w-5xl mx-auto">
            @include('partials.ai-tech')
        </div>
    </div>
</section>

<!-- FAQ Section -->
<section class="py-20 bg-gray-50/30">
    <div class="container mx-auto max-w-7xl px-4 md:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="text-3xl md:text-4xl font-medium font-futura-bold mb-4">Frequently Asked Questions</h2>
            <p class="text-lg text-gray-600 max-w-3xl mx-auto">
                Get answers to common questions about our AI development services
            </p>
        </div>
        <div class="max-w-4xl mx-auto">
            @php
                $faqs = [
                    [
                        'question' => 'What types of AI applications can you develop?',
                        'answer' => 'We develop various AI applications including machine learning models, chatbots, recommendation systems, computer vision applications, natural language processing tools, predictive analytics, and intelligent automation solutions.'
                    ],
                    [
                        'question' => 'How long does it take to develop an AI solution?',
                        'answer' => 'AI development timelines vary based on complexity. Simple ML models take 2-4 weeks, while complex AI systems with multiple components can take 3-6 months. We provide detailed project timelines after analyzing your requirements.'
                    ],
                    [
                        'question' => 'Do you provide AI consulting and strategy services?',
                        'answer' => 'Yes, we offer comprehensive AI consulting including feasibility analysis, data assessment, AI strategy development, technology recommendations, and implementation roadmaps to ensure successful AI adoption.'
                    ],
                    [
                        'question' => 'Can you integrate AI solutions with existing systems?',
                        'answer' => 'Absolutely! We specialize in integrating AI capabilities into existing applications and workflows through APIs, microservices, and custom integrations while ensuring minimal disruption to your current operations.'
                    ],
                    [
                        'question' => 'Do you provide ongoing support for AI applications?',
                        'answer' => 'Yes, we offer comprehensive support including model monitoring, performance optimization, retraining services, feature updates, and technical maintenance to ensure your AI solutions continue to perform effectively.'
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
  "name": "AI Development Services",
  "description": "Professional AI development services in Pakistan. Build intelligent applications with machine learning, natural language processing, computer vision, and custom AI solutions using Python, TensorFlow, and modern AI frameworks.",
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
  "serviceType": "AI Development",
  "areaServed": {
    "@type": "Country",
    "name": "Pakistan"
  },
  "hasOfferCatalog": {
    "@type": "OfferCatalog",
    "name": "AI Development Services",
    "itemListElement": [
      {
        "@type": "Offer",
        "itemOffered": {
          "@type": "Service",
          "name": "Machine Learning Solutions",
          "description": "Building predictive models and intelligent algorithms using scikit-learn, TensorFlow, and PyTorch for data-driven decision making."
        }
      },
      {
        "@type": "Offer",
        "itemOffered": {
          "@type": "Service",
          "name": "Natural Language Processing",
          "description": "Developing chatbots, sentiment analysis, and text processing applications using advanced NLP frameworks and transformers."
        }
      },
      {
        "@type": "Offer",
        "itemOffered": {
          "@type": "Service",
          "name": "Computer Vision Applications",
          "description": "Creating image recognition, object detection, and visual analytics solutions using OpenCV, YOLO, and deep learning models."
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
      "name": "AI Development",
      "item": "{{ url('/ai-development') }}"
    }
  ]
}
</script>
@endpush

@endsection