@extends('layouts.app')

@section('title', 'Best Website Development Company In Pakistan')

@section('content')
<section class="py-44 relative bg-amber-500/5">
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
                                Check our latest article on
                                design
                            </div>
                        </div>
                    </a>
                </div>
                <h1 class="md:text-5xl text-3xl text-gray-700 font-medium my-5 font-futura-bold">
                    We develop software that
                    <span class="relative after:bg-secondary-400 md:after:h-6 after:h-4 after:w-full after:inset-x-0 after:bottom-0 after:absolute after:-z-10">
                        works
                    </span>
                </h1>
                <p class="w-3/4 text-2xl font-medium mt-6 mb-20 text-slate-600 font-futura-light">
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
<section class="py-20">
    <div class="container m-auto md:px-10 px-0">
        <div class="text-center">
            <h1 class="text-4xl font-medium font-futura-bold">What We Do</h1>
            <p class="text-2xl font-medium text-slate-500 mt-5 mb-4 font-futura-light">
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
                <div class="mb-6 flex justify-center">
                    <div class="w-20 h-20 bg-gradient-to-br from-purple-500 to-pink-600 rounded-2xl flex items-center justify-center shadow-xl floating-animation">
                        <i class="fas fa-palette text-3xl text-white"></i>
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
                <div class="mb-6 flex justify-center">
                    <div class="w-20 h-20 bg-gradient-to-br from-blue-500 to-cyan-600 rounded-2xl flex items-center justify-center shadow-xl floating-animation" style="animation-delay: 0.2s;">
                        <i class="fas fa-code text-3xl text-white"></i>
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
                <div class="mb-6 flex justify-center">
                    <div class="w-20 h-20 bg-gradient-to-br from-green-500 to-emerald-600 rounded-2xl flex items-center justify-center shadow-xl floating-animation" style="animation-delay: 0.4s;">
                        <i class="fas fa-search text-3xl text-white"></i>
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
                <div class="mb-6 flex justify-center">
                    <div class="w-20 h-20 bg-gradient-to-br from-orange-500 to-red-600 rounded-2xl flex items-center justify-center shadow-xl floating-animation" style="animation-delay: 0.6s;">
                        <i class="fas fa-cloud text-3xl text-white"></i>
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
                <div class="mb-6 flex justify-center">
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
                <div class="mb-6 flex justify-center">
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
    <div class="container m-auto md:px-10 px-2">
        <div class="text-center">
            <span class="text-sm font-medium py-1 px-3 rounded-full text-primary bg-primary/10">
                Latest
            </span>
            <h1 class="text-4xl font-medium my-3 font-futura-bold">
                Explore some of our latest projects!
            </h1>
            <p class="text-2xl font-medium text-slate-400 mt-5 mb-4 font-futura-light">
            </p>
        </div>

        <div
            class="grid lg:grid-cols-2 grid-cols-1 gap-6"
            data-aos="fade-up"
            data-aos-duration="600"
        >
            <a href="#" class="group relative mt-12 block cursor-pointer ">
                <div class="pt-12 ps-12 group-hover:bg-white/10 rounded-md group-hover:shadow-lg transition-all duration-300">
                    <div>
                        <div class="flex items-center justify-between mb-7">
                            <h3 class="text-2xl font-bold">hms360</h3>
                            <p class="font-medium text-slate-500 pe-8">
                                Hotel management system
                            </p>
                        </div>
                        <div>
                            <img
                                src="{{ asset('img/products/hms.png') }}"
                                class="rounded-md"
                                alt="Project"
                            />
                        </div>
                        <div class="absolute inset-0 group-hover:flex items-center justify-center hidden transition-all duration-300">
                             
                        </div>
                    </div>
                    <div class="absolute inset-0 group-hover:bg-slate-300/20 transition-all duration-300"></div>
                </div>
                <div class="absolute inset-0 group-hover:bg-slate-300/20 transition-all duration-300"></div>
            </a> 
            
            <div class="group relative mt-12">
                <div class="pt-12 ps-12 bg-white/30 backdrop-blur-sm border border-gray-100/50 rounded-xl card-hover transition-all duration-500">
                    <div>
                        <div class="flex items-center justify-between mb-7">
                            <h3 class="text-2xl font-bold">
                                HRM
                            </h3>
                            <p class="font-medium text-slate-500 pe-8">
                                Human resource management system
                            </p>
                        </div>
                        
                        <div>
                            <img
                                src="{{ asset('img/features/agency2.jpg') }}"
                                class="rounded-md"
                            />
                        </div>
                    </div>
                </div>
                <div class="absolute inset-0 group-hover:bg-slate-300/20 transition-all duration-300"></div>
            </div>
        </div>
        
        <div
            class="grid lg:grid-cols-2 grid-cols-1  gap-6 "
            data-aos="fade-up"
            data-aos-duration="800"
         >
            <div class="group relative mt-12">
                <div class="pt-12 ps-12 bg-white/30 backdrop-blur-sm border border-gray-100/50 rounded-xl card-hover transition-all duration-500">
                    <div>
                        <div class="flex items-center justify-between mb-7">
                            <h3 class="text-2xl font-bold">
                                Point Of Sale
                            </h3>
                            <p class="font-medium text-slate-500 pe-8">
                                Sales & Inventory
                            </p>
                        </div>
                        <div>
                            <img
                                src="{{ asset('img/features/agency2.jpg') }}"
                                class="rounded-md"
                            />
                        </div>
                    </div>
                </div>
                <div class="absolute inset-0 group-hover:bg-slate-300/20 transition-all duration-300"></div>
            </div>

             <div class="group relative mt-12">
                <div class="pt-12 ps-12 bg-white/30 backdrop-blur-sm border border-gray-100/50 rounded-xl card-hover transition-all duration-500">
                    <div>
                        <div class="flex items-center justify-between mb-7">
                            <h3 class="text-2xl font-bold">
                                Accounting Software
                            </h3>
                            <p class="font-medium text-slate-500 pe-8">
                                Accounting & Finance
                            </p>
                        </div>
                        <div>
                            <img
                                src="{{ asset('img/features/agency1.jpg') }}"
                                class="rounded-md"
                            />
                        </div>
                    </div>
                </div>
                <div class="absolute inset-0 group-hover:bg-slate-300/20 transition-all duration-300"></div>
            </div>
        </div>
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
    <div class="container relative m-auto md:px-10 px-2">
        <span class="text-sm font-medium py-1 px-3 rounded-full text-primary bg-primary/10">
            Our Customers
        </span>

        <div class="grid lg:grid-cols-2 grid-cols-1 gap-6 mt-5">
            <h1 class="text-3xl font-semibold">
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
    <div class="container m-auto md:px-10 px-2">
        <div class="text-center">
            <span class="text-sm font-medium py-1 px-3 rounded-full text-primary bg-primary/10">
                Blog
            </span>
            <h1 class="text-3xl font-medium my-3">
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
    <div class="container m-auto md:px-10 px-2">
        <div class="text-center mb-16 md:px-10 px-0">
            <h1 class="text-3xl font-medium my-3">
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
</style>
@endsection