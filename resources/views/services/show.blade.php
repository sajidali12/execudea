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
  "name": "{{ $service->name }}",
  "description": "{{ $service->description ?? 'Professional ' . $service->name . ' services by Execudea. Expert solutions tailored to your business needs.' }}",
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
  "serviceType": "{{ $service->name }}",
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
      "name": "{{ $service->name }}",
      "item": "{{ url('/services/' . $service->slug) }}"
    }
  ]
}
</script>

@if($service->content && strpos($service->content, 'Frequently Asked Questions') !== false)
<!-- FAQ Schema Markup -->
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "FAQPage",
  "mainEntity": [
    @if($service->slug == 'user-experience-design')
    {
      "@type": "Question",
      "name": "What is the difference between UI and UX design?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "UI (User Interface) design focuses on the visual elements like buttons, colors, and layout, while UX (User Experience) design focuses on the overall user journey, research, and how users interact with your product to achieve their goals."
      }
    },
    {
      "@type": "Question",
      "name": "How long does a typical UI/UX design project take?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "A standard UI/UX design project takes 4-8 weeks depending on complexity. This includes user research, wireframing, prototyping, visual design, and user testing. We provide detailed timelines during project planning."
      }
    },
    {
      "@type": "Question",
      "name": "Do you conduct user research and testing?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Yes, we conduct comprehensive user research including interviews, surveys, usability testing, and competitor analysis. This helps us create designs based on real user needs and behaviors rather than assumptions."
      }
    },
    {
      "@type": "Question",
      "name": "Can you redesign our existing website or app?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Absolutely! We specialize in redesigning existing digital products to improve user experience, increase conversions, and modernize the interface while maintaining brand consistency."
      }
    },
    {
      "@type": "Question",
      "name": "Do you provide design systems and style guides?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Yes, we create comprehensive design systems including color palettes, typography guidelines, component libraries, and style guides to ensure consistency across all your digital touchpoints."
      }
    }
    @elseif($service->slug == 'web-development')
    {
      "@type": "Question",
      "name": "What technologies do you use for web development?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "We use modern technologies including Laravel, React, Vue.js, Node.js, and PHP for backend development, with responsive frontend frameworks and secure database solutions."
      }
    },
    {
      "@type": "Question",
      "name": "How long does it take to develop a website?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Development time varies based on complexity. A simple website takes 2-4 weeks, while complex web applications can take 8-16 weeks. We provide detailed timelines during project planning."
      }
    },
    {
      "@type": "Question",
      "name": "Do you provide website maintenance and support?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Yes, we offer ongoing maintenance packages including security updates, performance optimization, content updates, and technical support to keep your website running smoothly."
      }
    },
    {
      "@type": "Question",
      "name": "Will my website be mobile-responsive?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Yes, all our websites are built with mobile-first approach ensuring perfect display and functionality across all devices including desktops, tablets, and smartphones."
      }
    }
    @elseif($service->slug == 'search-engine-optimization')
    {
      "@type": "Question",
      "name": "How long does it take to see SEO results?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "SEO is a long-term strategy. You can typically see initial improvements in 2-3 months, with significant results appearing in 6-12 months depending on competition and current website status."
      }
    },
    {
      "@type": "Question",
      "name": "Do you guarantee first page rankings?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "While no one can guarantee specific rankings due to constantly changing search algorithms, we focus on proven white-hat techniques that consistently improve organic visibility and traffic."
      }
    },
    {
      "@type": "Question",
      "name": "What SEO tools do you use?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "We use industry-leading tools including SEMrush, Ahrefs, Google Analytics, Google Search Console, and Screaming Frog for comprehensive SEO analysis and optimization."
      }
    },
    {
      "@type": "Question",
      "name": "Do you work with local SEO?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Yes, we specialize in local SEO including Google My Business optimization, local citations, and location-based keyword targeting to help businesses dominate local search results."
      }
    }
    @elseif($service->slug == 'payload-cms-development')
    {
      "@type": "Question",
      "name": "What is Payload CMS and why should I choose it?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Payload CMS is a modern, TypeScript-based headless CMS that offers exceptional developer experience with React admin panels, automatic API generation, and type safety. It's perfect for developers who want full control over their content management system."
      }
    },
    {
      "@type": "Question",
      "name": "How long does it take to develop a Payload CMS application?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Development time varies based on complexity. A basic Payload CMS setup takes 1-2 weeks, while complex applications with custom collections, authentication, and integrations can take 4-8 weeks."
      }
    },
    {
      "@type": "Question",
      "name": "Can you migrate my existing CMS to Payload CMS?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Yes, we provide migration services from various CMS platforms to Payload CMS. We handle data migration, content restructuring, and ensure smooth transition while maintaining SEO rankings."
      }
    },
    {
      "@type": "Question",
      "name": "Do you provide ongoing maintenance for Payload CMS applications?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Absolutely! We offer comprehensive maintenance packages including updates, security monitoring, performance optimization, feature enhancements, and technical support."
      }
    }
    @elseif($service->slug == 'ai-development')
    {
      "@type": "Question",
      "name": "What types of AI applications can you develop?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "We develop various AI applications including machine learning models, chatbots, recommendation systems, computer vision applications, natural language processing tools, and predictive analytics solutions."
      }
    },
    {
      "@type": "Question",
      "name": "How long does it take to develop an AI solution?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "AI development timelines vary based on complexity. Simple ML models take 2-4 weeks, while complex AI systems with multiple components can take 3-6 months."
      }
    },
    {
      "@type": "Question",
      "name": "Can you integrate AI solutions with existing systems?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Absolutely! We specialize in integrating AI capabilities into existing applications through APIs, microservices, and custom integrations while ensuring minimal disruption."
      }
    },
    {
      "@type": "Question",
      "name": "Do you provide ongoing support for AI applications?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Yes, we offer comprehensive support including model monitoring, performance optimization, retraining services, feature updates, and technical maintenance."
      }
    }
    @elseif($service->slug == 'wordpress-development')
    {
      "@type": "Question",
      "name": "Why choose WordPress for my website?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "WordPress powers 43% of all websites globally. It's user-friendly, SEO-friendly, highly customizable, and has a vast ecosystem of themes and plugins to extend functionality."
      }
    },
    {
      "@type": "Question",
      "name": "Can you migrate my existing website to WordPress?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Yes, we offer complete website migration services from any platform to WordPress, ensuring zero data loss and minimal downtime during the transition process."
      }
    },
    {
      "@type": "Question",
      "name": "Do you provide WordPress maintenance services?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Yes, we offer comprehensive WordPress maintenance including security updates, plugin updates, backups, performance optimization, and content updates to keep your site secure and fast."
      }
    },
    {
      "@type": "Question",
      "name": "Can you create custom WordPress plugins?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Absolutely! We develop custom WordPress plugins tailored to your specific business needs, whether it's for e-commerce, membership sites, booking systems, or any other functionality."
      }
    }
    @endif
  ]
}
</script>
@endif
@endpush

@endsection