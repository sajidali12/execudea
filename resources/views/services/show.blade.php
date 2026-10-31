@extends('layouts.app')

@section('title', $service->name . ' | Professional Services | Execudea')
@section('meta_description', $service->description ?? 'Professional ' . $service->name . ' services by Execudea. Expert solutions tailored to your business needs.')
@section('canonical', url('/services/' . $service->slug))

@push('meta')
<meta property="og:title" content="{{ $service->name }} | Professional Services | Execudea">
<meta property="og:description" content="{{ $service->description ?? 'Professional ' . $service->name . ' services by Execudea. Expert solutions tailored to your business needs.' }}">
<meta property="og:url" content="{{ url('/services/' . $service->slug) }}">
<meta property="og:type" content="website">
@if($service->icon)
<meta property="og:image" content="{{ asset($service->icon) }}">
@endif
<meta property="og:site_name" content="Execudea">

<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:title" content="{{ $service->name }} | Professional Services | Execudea">
<meta name="twitter:description" content="{{ $service->description ?? 'Professional ' . $service->name . ' services by Execudea.' }}">
@if($service->icon)
<meta name="twitter:image" content="{{ asset($service->icon) }}">
@endif

<meta name="robots" content="index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1">
<meta name="googlebot" content="index, follow">
<link rel="alternate" hreflang="en" href="{{ url('/services/' . $service->slug) }}">
@endpush

@section('content')
<section class="relative pt-32 pb-24" style="background: linear-gradient(rgba(0,85,255,.07) 0,rgba(0,85,255,.05) 100%)">
    <div class="container mx-auto max-w-7xl px-4 md:px-6 lg:px-8">
        <div class="grid lg:grid-cols-2 grid-cols-1 gap-8 lg:gap-16 items-center">
            @if($service->icon)
            <div class="order-2 lg:order-1" data-aos="fade-right">
                <div class="relative w-full max-w-2xl mx-auto lg:mx-0">
                    <img src="{{ asset($service->icon) }}" alt="{{ $service->name }}" class="w-full h-auto rounded-lg shadow-lg object-cover" />
                </div>
            </div>
            @endif

            <div class="order-1 lg:order-2" data-aos="fade-left">
                <div class="text-center sm:text-start">
                    <h1 class="text-3xl/snug sm:text-4xl/snug xl:text-5xl/snug font-semibold font-futura-bold mb-7">
                        Make <span class="relative after:bg-yellow-500/50 after:-z-10 after:absolute after:h-6 after:w-full after:bottom-0 after:end-0">{{ $service->name }}</span> with Execudea.
                    </h1>
                    
                    @if($service->description)
                    <p class="text-base/relaxed text-gray-500">
                        At Execudea, we specialize in <b>{{ $service->name }}</b>, dedicated to creating meaningful and relevant solutions that elevate your business goals. 
                        {{ $service->description }}
                    </p>
                    @endif
                    
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

@if($service->content)
<section class="py-20 bg-gray-50/30">
    <div class="container mx-auto max-w-7xl px-4 md:px-6 lg:px-8">
        <div class="max-w-4xl mx-auto prose prose-lg">
            {!! $service->content !!}
        </div>
    </div>
</section>
@endif

<section class="py-20 bg-white">
    <div class="container mx-auto max-w-7xl px-4 md:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="text-3xl md:text-4xl font-medium font-futura-bold mb-4">Our Technology Stack</h2>
            <p class="text-lg text-gray-600 max-w-3xl mx-auto">
                We leverage industry-leading tools and platforms to deliver exceptional {{ $service->name }} solutions
            </p>
        </div>
        <div class="max-w-5xl mx-auto">
            @if($service->slug == 'web-development')
                @include('partials.tech-logos')
            @elseif($service->slug == 'search-engine-optimization')
                @include('partials.seo-tools')
            @elseif($service->slug == 'user-experience-design')
                @include('partials.user-tech')
            @elseif($service->slug == 'wordpress-development')
                @include('partials.wordpress-tools')
            @elseif($service->slug == 'payload-cms-development')
                @include('partials.payload-tech')
            @elseif($service->slug == 'ai-development')
                @include('partials.ai-tech')
            @else
                @include('partials.tech-logos')
            @endif
        </div>
    </div>
</section>

@push('scripts')
<!-- Service Schema Markup -->
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "Service",
  "name": {!! json_encode($service->name, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_HEX_TAG) !!},
  "description": {!! json_encode($service->description ?: 'Professional ' . $service->name . ' services by Execudea. Expert solutions tailored to your business needs.', JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_HEX_TAG) !!},
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
  "serviceType": {!! json_encode($service->name, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_HEX_TAG) !!},
  "areaServed": {
    "@type": "Country",
    "name": "Pakistan"
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
      "name": {!! json_encode($service->name, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_HEX_TAG) !!},
      "item": "{{ url('/services/' . $service->slug) }}"
    }
  ]
}
</script>

@php $faqItems = $service->faqItems(); @endphp
@if(count($faqItems))
<!-- FAQ Schema Markup (built from the FAQ section in the service content) -->
<script type="application/ld+json">
{!! json_encode([
    '@context' => 'https://schema.org',
    '@type' => 'FAQPage',
    'mainEntity' => array_map(fn ($faq) => [
        '@type' => 'Question',
        'name' => $faq['question'],
        'acceptedAnswer' => ['@type' => 'Answer', 'text' => $faq['answer']],
    ], $faqItems),
], JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_HEX_TAG) !!}
</script>
@endif
@endpush

@endsection