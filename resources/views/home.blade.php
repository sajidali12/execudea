@extends('layouts.app')

@section('title', 'Best Website Development Company In Pakistan | Execudea - Professional Web Design & Development Services')

@push('meta')
    <meta name="description" content="Execudea is Pakistan's leading website development company offering professional web design, development, SEO, and digital marketing services. 500+ satisfied clients since 2016.">
    <meta name="keywords" content="web development pakistan, website design lahore, web development company karachi, SEO services pakistan, digital marketing, execudea, best web developers">
    <meta name="author" content="Execudea">
    <meta name="robots" content="index, follow">
    
    <!-- Open Graph Meta Tags -->
    <meta property="og:title" content="Best Website Development Company In Pakistan | Execudea">
    <meta property="og:description" content="Professional web design & development services in Pakistan. Expert team delivering cutting-edge websites, SEO, and digital solutions since 2016.">
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:image" content="{{ asset('img/execudea-og-image.jpg') }}">
    <meta property="og:site_name" content="Execudea">
    <meta property="og:locale" content="en_PK">
    
    <!-- Twitter Meta Tags -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Best Website Development Company In Pakistan | Execudea">
    <meta name="twitter:description" content="Professional web design & development services in Pakistan. Expert team delivering cutting-edge websites, SEO, and digital solutions since 2016.">
    <meta name="twitter:image" content="{{ asset('img/execudea-og-image.jpg') }}">
    
    <!-- Canonical URL -->
    <link rel="canonical" href="{{ url()->current() }}">
    
    <!-- JSON-LD Structured Data -->
    <script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "Organization",
        "name": "Execudea",
        "url": "{{ url('/') }}",
        "logo": "{{ asset('img/execudea.png') }}",
        "description": "Leading website development company in Pakistan offering professional web design, development, SEO, and digital marketing services since 2016.",
        "foundingDate": "2016",
        "founder": {
            "@type": "Person",
            "name": "Execudea Team"
        },
        "address": {
            "@type": "PostalAddress",
            "addressCountry": "Pakistan",
            "addressLocality": "Lahore"
        },
        "contactPoint": {
            "@type": "ContactPoint",
            "telephone": "+92-XXX-XXXXXXX",
            "contactType": "customer service",
            "availableLanguage": ["English", "Urdu"]
        },
        "sameAs": [
            "https://www.linkedin.com/company/execudea",
            "https://www.facebook.com/execudea",
            "https://www.instagram.com/execudea/"
        ],
        "hasOfferCatalog": {
            "@type": "OfferCatalog",
            "name": "Web Development Services",
            "itemListElement": [
                {
                    "@type": "OfferCatalog",
                    "name": "Web Development",
                    "description": "Custom website development for businesses of all sizes"
                },
                {
                    "@type": "OfferCatalog", 
                    "name": "UX Design",
                    "description": "User experience design for meaningful digital experiences"
                },
                {
                    "@type": "OfferCatalog",
                    "name": "SEO Services", 
                    "description": "Search engine optimization for better website visibility"
                },
                {
                    "@type": "OfferCatalog",
                    "name": "SaaS Solutions",
                    "description": "Scalable software as a service applications"
                },
                {
                    "@type": "OfferCatalog",
                    "name": "WordPress Development",
                    "description": "Custom WordPress websites and Shopify stores"
                },
                {
                    "@type": "OfferCatalog",
                    "name": "Backend Development",
                    "description": "Robust backend solutions using PHP, Laravel, Node.js"
                }
            ]
        },
        "aggregateRating": {
            "@type": "AggregateRating",
            "ratingValue": "5.0",
            "reviewCount": "6",
            "bestRating": "5",
            "worstRating": "5"
        },
        "review": [
            {
                "@type": "Review",
                "author": {
                    "@type": "Person",
                    "name": "CFA Pakistan"
                },
                "reviewRating": {
                    "@type": "Rating",
                    "ratingValue": "5",
                    "bestRating": "5"
                },
                "reviewBody": "We had an exceptional experience working with Execudea. From the initial consultation to the final launch, their team demonstrated professionalism, creativity, and a deep understanding of web design and development. They took the time to understand our brand and goals, delivering a website that not only looks stunning but also functions seamlessly across all devices.",
                "datePublished": "2024-08-08"
            },
            {
                "@type": "Review", 
                "author": {
                    "@type": "Person",
                    "name": "Basit Ghauri"
                },
                "reviewRating": {
                    "@type": "Rating",
                    "ratingValue": "5",
                    "bestRating": "5"
                },
                "reviewBody": "Really good client engagement. Executed company website as required and iterations as requested. Recommended",
                "datePublished": "2022-10-19"
            },
            {
                "@type": "Review",
                "author": {
                    "@type": "Person", 
                    "name": "Muhammad Javed"
                },
                "reviewRating": {
                    "@type": "Rating",
                    "ratingValue": "5",
                    "bestRating": "5"
                },
                "reviewBody": "I am very satisfied with the experience and customer service provided by Execudea. They designed my hotel website and i like the designs, theme and the respond timing of my website really impressive. They are very helpful, always replying in a timely manner very cooperative team.",
                "datePublished": "2021-03-12"
            },
            {
                "@type": "Review",
                "author": {
                    "@type": "Organization",
                    "name": "Uconect"
                },
                "reviewRating": {
                    "@type": "Rating", 
                    "ratingValue": "5",
                    "bestRating": "5"
                },
                "reviewBody": "We are very satisfied with the experience and service provided by Execudea. They helped us manage our many projects on time, and takes every single work seriously!",
                "datePublished": "2023-03-02"
            },
            {
                "@type": "Review",
                "author": {
                    "@type": "Person",
                    "name": "Abdul Latif"
                },
                "reviewRating": {
                    "@type": "Rating",
                    "ratingValue": "5", 
                    "bestRating": "5"
                },
                "reviewBody": "Best website designer and developer in Pakistan. Fast response and followed direction perfectly.",
                "datePublished": "2021-03-12"
            },
            {
                "@type": "Review",
                "author": {
                    "@type": "Person",
                    "name": "Khadim H."
                },
                "reviewRating": {
                    "@type": "Rating",
                    "ratingValue": "5",
                    "bestRating": "5"
                },
                "reviewBody": "Very professional team. They provide best web designing and development services in Pakistan.",
                "datePublished": "2021-02-13"
            }
        ]
    }
    </script>
    
    <!-- Local Business Schema -->
    <script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "LocalBusiness",
        "name": "Execudea",
        "image": "{{ asset('img/execudea.png') }}",
        "telephone": "+92-XXX-XXXXXXX",
        "address": {
            "@type": "PostalAddress",
            "streetAddress": "Business Address",
            "addressLocality": "Lahore", 
            "addressRegion": "Punjab",
            "postalCode": "54000",
            "addressCountry": "PK"
        },
        "geo": {
            "@type": "GeoCoordinates",
            "latitude": 31.5204,
            "longitude": 74.3587
        },
        "url": "{{ url('/') }}",
        "openingHoursSpecification": {
            "@type": "OpeningHoursSpecification",
            "dayOfWeek": [
                "Monday",
                "Tuesday", 
                "Wednesday",
                "Thursday",
                "Friday"
            ],
            "opens": "09:00",
            "closes": "18:00"
        },
        "priceRange": "$$",
        "currenciesAccepted": "PKR, USD",
        "paymentAccepted": "Cash, Credit Card, Bank Transfer",
        "aggregateRating": {
            "@type": "AggregateRating",
            "ratingValue": "5.0",
            "reviewCount": "6"
        }
    }
    </script>
    
    <!-- Website Schema -->
    <script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "WebSite",
        "name": "Execudea",
        "url": "{{ url('/') }}",
        "potentialAction": {
            "@type": "SearchAction",
            "target": {
                "@type": "EntryPoint",
                "urlTemplate": "{{ url('/') }}/search?q={search_term_string}"
            },
            "query-input": "required name=search_term_string"
        }
    }
    </script>
@endpush

@section('content')
<!-- Breadcrumb Schema -->
<script type="application/ld+json">
{
    "@context": "https://schema.org",
    "@type": "BreadcrumbList",
    "itemListElement": [{
        "@type": "ListItem",
        "position": 1,
        "name": "Home",
        "item": "{{ url('/') }}"
    }]
}
</script>

<main role="main">
<section class="py-44 relative bg-amber-500/5" itemscope itemtype="https://schema.org/WebPageElement">
    <div class="hero-with-shapes">
        <div class="shape1"></div>
        <div class="shape2"></div>
        <div class="shape3"></div>

        <div class="container m-auto md:px-10 px-2">
            <div>
                <div
                    class="bg-amber-500/10 py-2 px-4 inline-block rounded-md mb-6"
                    data-aos="fade-right"
                    data-aos-duration="1000"
                >
                    <a href="{{ route('blog') }}">
                        <div class="flex items-center gap-2">
                            <div class="inline-block px-2 text-sm text-white rounded-full bg-primary">
                                New!
                            </div>
                            <div class="font-medium">
                                Check our latest article
                            </div>
                        </div>
                    </a>
                </div>
                <h1 class="md:text-5xl text-3xl text-gray-700 font-medium my-5 font-futura-bold" itemprop="headline">
                    We develop software that
                    <span class="relative after:bg-secondary-400 md:after:h-6 after:h-4 after:w-full after:inset-x-0 after:bottom-0 after:absolute after:-z-10">
                        works
                    </span>
                </h1>
                <p class="w-full md:w-3/4 text-lg md:text-2xl font-medium mt-6 mb-12 md:mb-20 text-slate-600 font-futura-light">
                    We're a top-notch web design and development
                    team helping business to craft the
                    meaningful and interactive product
                    experiences.
                </p>
                <div class="flex flex-wrap items-center gap-5">
                    <a
                        href="#work"
                        class="py-3 px-6 rounded border border-primary text-white bg-primary hover:shadow-lg hover:shadow-black/50 focus:outline focus:outline-black/50 transition-all duration-500"
                    >
                        <i class="fa-solid fa-arrow-down me-2"></i>
                        View Our Work
                    </a>
                    <a
                        href="https://calendly.com/execudea-info/30min"
                        target="_blank"
                        class="text-primary py-3 px-6 rounded border border-primary hover:border-black hover:bg-primary hover:text-white hover:shadow-lg hover:shadow-black/50 focus:outline focus:outline-black/50 transition-all duration-500"
                    >
                        Book a Meeting
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="absolute end-0 top-48 hidden md:block ">
        <div class="flex items-center gap-5 vertical-rl px-2">
            <a
                href="https://www.linkedin.com/company/execudea"
                class="text-lg  hover:text-primary "
            >
                Linkedin
            </a>
            <a
                href="https://www.facebook.com/execudea"
                class="text-lg  hover:text-primary"
            >
                Facebook
            </a>
            <a
                href="https://www.instagram.com/execudea/"
                class="text-lg  hover:text-primary"
            >
                Instagram
            </a>
        </div>
    </div>
</section>

<!-- Hero Section End -->
<!-- services Section Start -->
<section class="py-20" itemscope itemtype="https://schema.org/Service">
    <div class="container m-auto md:px-10 px-4">
        <div class="text-center">
            <h2 class="text-2xl md:text-4xl font-medium font-futura-bold" itemprop="name">What We Do</h2>
            <p class="text-lg md:text-2xl font-medium text-slate-500 mt-5 mb-4 font-futura-light px-4 md:px-0">
                We are helping businesses to develop their web
                applications
            </p>
        </div>

        <div class="grid xl:grid-cols-3 md:grid-cols-2 grid-cols-1 pt-12 gap-6">
            <div
                class="p-6 bg-white/50 backdrop-blur-sm border border-gray-100 rounded-xl card-hover service-card floating-animation"
                data-aos="fade-up"
                data-aos-duration="500"
            >
                <div class="mb-6 flex justify-center md:justify-start">
                    <div class="w-20 h-20 bg-gradient-to-br from-purple-500 to-pink-600 rounded-2xl flex items-center justify-center shadow-xl floating-animation transform hover:scale-110 transition-transform duration-300">
                        <i class="fas fa-palette text-3xl text-white drop-shadow-lg"></i>
                    </div>
                </div>
                <h4 class="text-xl font-medium my-5 font-futura-bold text-gradient">
                    User Experience Design
                </h4>
                <p class="text-slate-400">
                    Following the best process that a great
                    design teams use to create products that
                    provide meaningful and relevant experiences
                    to users
                </p>
            </div>

            <div
                class="p-6 bg-white/50 backdrop-blur-sm border border-gray-100 rounded-xl card-hover service-card floating-animation"
                data-aos="fade-up"
                data-aos-duration="700"
                style="animation-delay: 0.2s;"
            >
                <div class="mb-6 flex justify-center md:justify-start">
                    <div class="w-20 h-20 bg-gradient-to-br from-blue-500 to-cyan-600 rounded-2xl flex items-center justify-center shadow-xl floating-animation transform hover:scale-110 transition-transform duration-300" style="animation-delay: 0.2s;">
                        <i class="fas fa-code text-3xl text-white drop-shadow-lg"></i>
                    </div>
                </div>
                <h4 class="text-xl font-medium my-5 font-futura-bold">
                    Web Development
                </h4>
                <p class="text-slate-400">
                    Development of the websites for businesses
                    of all sizes and shapes and covering a small
                    to enterprise organizations
                </p>
            </div>

            <div
                class="p-6 bg-white/50 backdrop-blur-sm border border-gray-100 rounded-xl card-hover service-card floating-animation"
                data-aos="fade-up"
                data-aos-duration="900"
                style="animation-delay: 0.4s;"
            >
                <div class="mb-6 flex justify-center md:justify-start">
                    <div class="w-20 h-20 bg-gradient-to-br from-green-500 to-emerald-600 rounded-2xl flex items-center justify-center shadow-xl floating-animation transform hover:scale-110 transition-transform duration-300" style="animation-delay: 0.4s;">
                        <i class="fas fa-search text-3xl text-white drop-shadow-lg"></i>
                    </div>
                </div>
                <h4 class="text-xl font-medium my-5 font-futura-bold text-gradient">
                    Search Engine Optimisation (SEO)
                </h4>
                <p class="text-slate-400">
                    We provide complete search engin
                    optimisation services and make best
                    strategies for better ranking of website in
                    popular search engines.
                </p>
            </div>
            
            <div
                class="p-6 bg-white/50 backdrop-blur-sm border border-gray-100 rounded-xl card-hover service-card floating-animation"
                data-aos="fade-up"
                data-aos-duration="900"
                style="animation-delay: 0.6s;"
            >
                <div class="mb-6 flex justify-center md:justify-start">
                    <div class="w-20 h-20 bg-gradient-to-br from-orange-500 to-red-600 rounded-2xl flex items-center justify-center shadow-xl floating-animation transform hover:scale-110 transition-transform duration-300" style="animation-delay: 0.6s;">
                        <i class="fas fa-cloud text-3xl text-white drop-shadow-lg"></i>
                    </div>
                </div>
                <h4 class="text-xl font-medium my-5 font-futura-bold text-gradient">
                    SaaS
                </h4>
                <p class="text-slate-400">
                We empower businesses with innovative SaaS solutions designed for seamless scalability and efficiency. Unlock your potential with our customizable platforms that adapt to your evolving needs.
                </p>
            </div>
            
            <div
                class="p-6 bg-white/50 backdrop-blur-sm border border-gray-100 rounded-xl card-hover service-card floating-animation"
                data-aos="fade-up"
                data-aos-duration="900"
                style="animation-delay: 0.8s;"
            >
                <div class="mb-6 flex justify-center md:justify-start">
                    <div class="w-20 h-20 bg-gradient-to-br from-indigo-500 to-purple-600 rounded-2xl flex items-center justify-center shadow-xl floating-animation" style="animation-delay: 0.8s;">
                        <i class="fab fa-wordpress text-3xl text-white"></i>
                    </div>
                </div>
                <h4 class="text-xl font-medium my-5 font-futura-bold text-gradient">
                   WordPress/Shopify
                </h4>
                <p class="text-slate-400">
                We create dynamic websites and e-commerce solutions with WordPress and Shopify. Our skilled team is committed to crafting user-friendly, high-performance platforms that elevate your online presence.
                </p>
            </div>
            
            <div
                class="p-6 bg-white/50 backdrop-blur-sm border border-gray-100 rounded-xl card-hover service-card floating-animation"
                data-aos="fade-up"
                data-aos-duration="900"
                style="animation-delay: 1.0s;"
            >
                <div class="mb-6 flex justify-center md:justify-start">
                    <div class="w-20 h-20 bg-gradient-to-br from-gray-700 to-gray-900 rounded-2xl flex items-center justify-center shadow-xl floating-animation" style="animation-delay: 1.0s;">
                        <i class="fas fa-server text-3xl text-white"></i>
                    </div>
                </div>
                <h4 class="text-xl font-medium my-5 font-futura-bold text-gradient">
                    Backend
                </h4>
                <p class="text-slate-400">
                we specialize in robust backend solutions using PHP, Laravel, Node.js, and Express. Our expert team is dedicated to delivering scalable and efficient applications tailored to your business needs.
                </p>
            </div>
        </div>
    </div>
</section>
<!-- services Section End -->

<!-- portfolio Section Start -->
<section class="py-20" id="work">
    <div class="container m-auto md:px-10 px-4">
        <div class="text-center">
            <span class="text-sm font-medium py-1 px-3 rounded-full text-primary bg-primary/10">
                Latest
            </span>
            <h1 class="text-2xl md:text-4xl font-medium my-3 font-futura-bold">
                Explore some of our latest projects!
            </h1>
            <p class="text-lg md:text-2xl font-medium text-slate-400 mt-5 mb-4 font-futura-light px-4 md:px-0">
            </p>
        </div>

        @if(isset($featuredProjects) && $featuredProjects->count() > 0)
            <div class="grid lg:grid-cols-2 xl:grid-cols-2 grid-cols-1 gap-4 md:gap-8 mt-8 md:mt-12">
                @foreach($featuredProjects as $index => $project)
                    <div class="group relative bg-white/70 backdrop-blur-sm border border-gray-100/50 rounded-2xl overflow-hidden card-hover transition-all duration-500 shadow-lg hover:shadow-2xl"
                         data-aos="fade-up"
                         data-aos-duration="{{ 600 + ($index * 200) }}"
                         data-aos-delay="{{ $index * 100 }}">
                        
                        <!-- Project Image -->
                        <div class="relative h-64 overflow-hidden">
                            @if($project->project_image)
                                <img src="{{ asset('storage/' . $project->project_image) }}" 
                                     alt="{{ $project->name }}" 
                                     class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                            @else
                                <div class="w-full h-full bg-gradient-to-br from-primary/20 to-secondary/20 flex items-center justify-center">
                                    <div class="text-center">
                                        <i class="fas fa-project-diagram text-4xl text-primary/50 mb-2"></i>
                                        <p class="text-primary/70 font-medium">{{ $project->name }}</p>
                                    </div>
                                </div>
                            @endif
                            
                            <!-- Status Badge -->
                            <div class="absolute top-4 left-4">
                                <span class="px-3 py-1 rounded-full text-xs font-medium bg-primary text-white shadow-lg">
                                    {{ ucfirst(str_replace('_', ' ', $project->status)) }}
                                </span>
                            </div>
                            
                            <!-- Progress Bar -->
                            @if($project->progress > 0)
                                <div class="absolute bottom-0 left-0 right-0 bg-black/20 p-2">
                                    <div class="flex items-center justify-between text-white text-xs mb-1">
                                        <span>Progress</span>
                                        <span>{{ $project->progress }}%</span>
                                    </div>
                                    <div class="w-full bg-white/20 rounded-full h-1">
                                        <div class="bg-white rounded-full h-1 transition-all duration-500" 
                                             style="width: {{ $project->progress }}%"></div>
                                    </div>
                                </div>
                            @endif
                        </div>
                        
                        <!-- Project Content -->
                        <div class="p-6">
                            <div class="flex items-center justify-between mb-4">
                                <div class="flex items-center space-x-2">
                                    <div class="w-2 h-2 bg-primary rounded-full"></div>
                                    <span class="text-xs font-medium text-primary uppercase tracking-wider">
                                        {{ $project->client->name ?? 'Client' }}
                                    </span>
                                </div>
                                <span class="text-xs text-gray-500">
                                    {{ $project->created_at->format('M Y') }}
                                </span>
                            </div>
                            
                            <h3 class="text-xl font-bold text-gray-800 mb-3 group-hover:text-primary transition-colors duration-300">
                                {{ $project->name }}
                            </h3>
                            
                            <p class="text-gray-600 text-sm leading-relaxed mb-4 line-clamp-2">
                                {{ $project->description ?? 'A innovative project developed with cutting-edge technology to deliver exceptional results.' }}
                            </p>
                            
                            <div class="flex items-center justify-between">
                                <div class="flex items-center space-x-2">
                                    <span class="inline-block w-2 h-2 bg-gradient-to-r from-primary to-secondary rounded-full"></span>
                                    <span class="text-sm font-medium text-gray-700">
                                        {{ ucfirst(str_replace('_', ' ', $project->type)) }}
                                    </span>
                                </div>
                                
                                <a href="{{ route('contact') }}" class="flex items-center text-primary hover:text-secondary transition-colors duration-300">
                                    <span class="text-sm font-medium mr-1">Contact Us</span>
                                    <i class="fas fa-arrow-right text-xs group-hover:translate-x-1 transition-transform duration-300"></i>
                                </a>
                            </div>
                        </div>
                        
                        <!-- Hover Overlay -->
                        <div class="absolute inset-0 bg-gradient-to-tr from-primary/5 to-secondary/5 opacity-0 group-hover:opacity-100 transition-opacity duration-300 pointer-events-none"></div>
                    </div>
                @endforeach
            </div>
        @else
            <!-- Fallback when no projects are available -->
            <div class="text-center py-16">
                <div class="max-w-md mx-auto">
                    <div class="mb-6">
                        <i class="fas fa-project-diagram text-6xl text-gray-300"></i>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-600 mb-2">No Featured Projects Yet</h3>
                    <p class="text-gray-500">We're working on exciting projects that will be showcased here soon!</p>
                </div>
            </div>
        @endif
    </div>
</section>
<!-- portfolio Section End -->

<!-- clients Section Start -->
<section class="py-32 relative bg-orange-700/10">
    <div class="absolute top-0 inset-x-0 hidden sm:block">
        <img
            src="{{ asset('img/shapes/white-wave.svg') }}"
            alt="svg"
            class="w-full -scale-x-100"
        />
    </div>
    <div class="container relative m-auto md:px-10 px-4">
        <span class="text-sm font-medium py-1 px-3 rounded-full text-primary bg-primary/10">
            Our Customers
        </span>

        <div class="grid lg:grid-cols-2 grid-cols-1 gap-6 mt-5">
            <h1 class="text-xl md:text-3xl font-semibold">
                We have worked with more than 500 happy clients
            </h1>
            <p class="text-slate-600">
                Since 2016 we are providing best web development
                and digital marketing solutions for our
                customers. Our experienced team of Engineers,
                Design experts and Digital Marketing strategy
                makers are always ready to help your business in
                online community.
            </p>
        </div>

        <div class="flex flex-wrap items-center justify-around mt-12 gap-5">
            <img src="{{ asset('img/brands/webdesigns.png') }}" class="w-28" />
            <img src="{{ asset('img/brands/uexel.png') }}" class="w-28" />
            <img src="{{ asset('img/brands/rfirst.png') }}" class="w-28" />
            <img
                src="{{ asset('img/brands/tibet.png') }}"
                class="w-28"
            />
            <img
                src="{{ asset('img/brands/medit.png') }}"
                class="w-28"
            />
        </div>
    </div>
    <div class="absolute bottom-0 inset-x-0 hidden sm:block">
        <img
            src="{{ asset('img/shapes/white-wave.svg') }}"
            alt="svg"
            class="w-full scale-x-100 -scale-y-100"
        />
    </div>
</section>
<!-- clients Section End   -->

<!-- Blog Section Start -->
<section class="py-20">
    <div class="container m-auto md:px-10 px-4">
        <div class="text-center">
            <span class="text-sm font-medium py-1 px-3 rounded-full text-primary bg-primary/10">
                Blog
            </span>
            <h1 class="text-2xl md:text-3xl font-medium my-3">
                Latest Articles
            </h1>
        </div>

        <div class="grid lg:grid-cols-3 sm:grid-cols-2 grid-cols-1 mt-12 gap-6">
            @if(isset($latestPosts) && $latestPosts->count() > 0)
                @foreach($latestPosts as $post)
                    <div
                        class="shadow-md rounded-md relative flex flex-col bg-white overflow-hidden"
                        data-aos="fade-up"
                        data-aos-duration="500"
                    >
                        <div class="relative flex-shrink-0">
                            <div
                                class="absolute top-3 right-3 bg-primary text-white text-sm px-3 py-1 rounded-full badge-animation"
                                aria-label="New post"
                            >
                                New!
                            </div>
                            <img
                                src="{{ $post->image ? asset('storage/product/image/' . $post->image) : asset('img/blog/default.png') }}"
                                alt="{{ $post->title }}"
                                class="w-full h-60 object-cover rounded-t-md"
                            />
                            <div class="absolute -bottom-5 w-full">
                                <svg
                                    class="w-full h-14 text-white"
                                    viewBox="0 0 528 40"
                                    xmlns="http://www.w3.org/2000/svg"
                                >
                                    <g
                                        id="shape"
                                        transform="matrix(-1.138336E-07 -1 1 -1.138336E-07 0 39.92764)"
                                    >
                                        <path
                                            d="M0 0L40.5467 0C40.5467 0 -31.8215 230.87 38.7134 528.217C39.8794 533.133 31.7549 527.502 31.0925 528.75C28.7914 533.084 26.1543 528.191 24.4327 529.178C59.2372 539.206 14.0091 521.981 12.9329 530.001L1.02722 528.284L0 0Z"
                                            transform="translate(7.629395E-06 6.103516E-05)"
                                            fill="currentColor"
                                            stroke="none"
                                        ></path>
                                    </g>
                                </svg>
                            </div>
                        </div>
                        <div class="p-6 flex flex-col flex-grow">
                            <p class="text-sm text-gray-600 mb-2">
                                {{ $post->created_at->format('d F Y') }}
                            </p>
                            <h4 class="text-lg font-semibold mb-2 hover:text-primary">
                                <a href="{{ route('blog.show', $post->slug ?: $post->id) }}" class="text-primary">
                                    {{ $post->title }}
                                </a>
                            </h4>
                            <div class="flex-grow mb-4">
                                <p class="text-sm text-gray-500 line-clamp-2">
                                    {{ $post->excerpt ?: Str::limit(strip_tags($post->body), 100) }}
                                </p>
                            </div>
                            <a
                                href="{{ route('blog.show', $post->slug ?: $post->id) }}"
                                class="text-primary font-semibold"
                            >
                                Read More
                            </a>
                        </div>
                    </div>
                @endforeach
            @else
                <div class="col-span-3 text-center py-6">
                    No posts available.
                </div>
            @endif
        </div>
    </div>
</section>
<!-- blog Section End -->

<!-- openings Section Start -->
<section class="py-20">
    <div class="container m-auto md:px-10 px-4">
        <div class="text-center mb-16 md:px-10 px-4">
            <h1 class="text-2xl md:text-3xl font-medium my-3">
                Our Happy Customers
            </h1>
            <p class="font-medium text-slate-500 mb-8">
                We value our users and put our best effort to make thier ideas to be successful.
            </p>
        </div>

        @include('partials.google-reviews')
    </div>
</section>
<!-- openings Section End   -->

<style>
.hero-with-shapes {
    position: relative;
}

.shape1, .shape2, .shape3 {
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

@keyframes float {
    0%, 100% {
        transform: translateY(0px);
    }
    50% {
        transform: translateY(-20px);
    }
}

/* Additional SEO optimizations */
.hero-section h1 {
    font-size: clamp(1.5rem, 4vw, 3rem);
}

/* Mobile responsive improvements */
@media (max-width: 768px) {
    .hero-section {
        padding: 2rem 1rem;
    }
    
    /* Better mobile spacing */
    section {
        padding-top: 3rem;
        padding-bottom: 3rem;
    }
    
    /* Mobile buttons */
    .flex-wrap.gap-5 {
        gap: 1rem;
    }
    
    /* Mobile text improvements */
    .font-futura-bold {
        line-height: 1.2;
    }
    
    /* Service cards mobile spacing */
    .service-card {
        margin-bottom: 1.5rem;
    }
    
    /* Project cards mobile improvements */
    .card-hover {
        transform: none;
    }
    
    .card-hover:hover {
        transform: translateY(-4px);
    }
    
    /* Mobile swiper improvements */
    .swiper-slide {
        padding: 0 0.5rem;
    }
}
</style>

<!-- Additional SEO Schema for Services -->
<script type="application/ld+json">
{
    "@context": "https://schema.org",
    "@type": "ItemList",
    "name": "Web Development Services by Execudea",
    "description": "Comprehensive web development and digital services offered by Execudea",
    "itemListElement": [
        {
            "@type": "Service",
            "position": 1,
            "name": "User Experience Design",
            "description": "Following the best process that a great design teams use to create products that provide meaningful and relevant experiences to users",
            "provider": {
                "@type": "Organization",
                "name": "Execudea"
            },
            "areaServed": "Pakistan",
            "hasOfferCatalog": {
                "@type": "OfferCatalog",
                "name": "UX Design Services"
            }
        },
        {
            "@type": "Service",
            "position": 2,
            "name": "Web Development",
            "description": "Development of the websites for businesses of all sizes and shapes and covering a small to enterprise organizations",
            "provider": {
                "@type": "Organization", 
                "name": "Execudea"
            },
            "areaServed": "Pakistan"
        },
        {
            "@type": "Service",
            "position": 3,
            "name": "Search Engine Optimisation (SEO)",
            "description": "We provide complete search engin optimisation services and make best strategies for better ranking of website in popular search engines",
            "provider": {
                "@type": "Organization",
                "name": "Execudea"
            },
            "areaServed": "Pakistan"
        },
        {
            "@type": "Service",
            "position": 4,
            "name": "SaaS Solutions",
            "description": "We empower businesses with innovative SaaS solutions designed for seamless scalability and efficiency",
            "provider": {
                "@type": "Organization",
                "name": "Execudea"
            },
            "areaServed": "Pakistan"
        },
        {
            "@type": "Service",
            "position": 5,
            "name": "WordPress/Shopify Development",
            "description": "We create dynamic websites and e-commerce solutions with WordPress and Shopify",
            "provider": {
                "@type": "Organization",
                "name": "Execudea"
            },
            "areaServed": "Pakistan"
        },
        {
            "@type": "Service",
            "position": 6,
            "name": "Backend Development",
            "description": "We specialize in robust backend solutions using PHP, Laravel, Node.js, and Express",
            "provider": {
                "@type": "Organization",
                "name": "Execudea"
            },
            "areaServed": "Pakistan"
        }
    ]
}
</script>

</main>
@endsection