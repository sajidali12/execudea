@extends('layouts.app')

@section('title', 'Best Web Development Agency')

@section('content')
<section class="bg-gray-100 lg:pt-36 sm:pb-36 pb-16 pt-36 relative">
    <div class="container m-auto max-w-7xl px-4 md:px-6 lg:px-8">
        <div class="flex justify-center">
            <div class="lg:w-8/12 xl:w-7/12 text-center">
                <h1 class="text-3xl/tight sm:text-4xl/tight lg:text-5xl/tight font-semibold mb-5 font-futura-bold">
                    We are on a mission to 
                    <span class="relative z-0 after:bg-primary/30 after:-z-10 after:absolute md:after:h-6 sm:after:h-5 after:h-4 after:w-full after:bottom-0 after:end-0"> revolutionize
                    </span>
                    the web
                </h1>
                <p class="lg:text-2xl text-lg text-gray-500 font-futura-light max-w-4xl mx-auto">
                    At <img class="inline md:w-28 w-20" src="{{ asset('img/execudea.png') }}" alt="Execudea Private Limited Best Web Developers"/> we are passionate about bringing ideas to life through innovative web development solutions.
                </p>
            </div>
        </div>
    </div>
    <div class="absolute -bottom-1 w-full">
        <svg
            class="w-full h-full"
            viewBox="0 0 1440 40"
            version="1.1"
            xmlns="http://www.w3.org/2000/svg"
            xmlns:xlink="http://www.w3.org/1999/xlink"
        >
            <g
                id="shape-b"
                stroke="none"
                stroke-width="1"
                fill="none"
                fill-rule="evenodd"
            >
                <g id="curve" fill="#fff">
                    <path
                        d="M0,30.013 C239.659,10.004 479.143,0 718.453,0 C957.763,0 1198.28,10.004 1440,30.013 L1440,40 L0,40 L0,30.013 Z"
                        id="Path"
                    ></path>
                </g>
            </g>
        </svg>
    </div>
</section>

<section class="lg:py-24 py-16">
    <div class="container m-auto md:px-10 px-4" data-aos="fade-up">
        <div class="grid lg:grid-cols-3 grid-cols-1 gap-10">
            <div class="flex flex-col items-center lg:items-start">
                <div class="border-t-2 border-gray-300 w-1/5 mb-7"></div>
                <h1 class="text-3xl font-futura-bold">About Us</h1>
            </div>

            <div>
                <p class="text-slate-500">
                    As a full-stack web development studio, we specialize in crafting dynamic, user-centric websites and applications that drive business growth and enhance user experiences.
                </p>
            </div>

            <div>
                <p class="text-slate-500">
                    Our team of expert developers, designers, and strategists work collaboratively to deliver end-to-end solutions that meet the unique needs of our clients. From the initial concept to the final deployment, we handle every aspect of the development process with precision and creativity.
                </p>
            </div>
        </div>

        <div class="lg:mt-5">
            <div class="grid lg:grid-cols-3 grid-cols-1 gap-10">
                <div></div>

                <div class="lg:col-span-2">
                    <p class="text-slate-500">
                        At the core of our approach is a commitment to understanding your vision and translating it into a digital reality. We start by listening to your needs, followed by a meticulous planning phase where we map out the best technological strategies to achieve your objectives. Our agile development process ensures that we remain flexible and responsive to changes, delivering projects on time and within budget.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="lg:py-24 py-16">
    <div class="container m-auto md:px-10 px-4" data-aos="fade-up">
        <div class="md:grid lg:grid-cols-2 gap-14 block md:text-left text-center">
            <div class="order-2 lg:order-1">
                <h2 class="text-3xl mb-7 font-futura-bold">What We Offer</h2>
                <p class="text-slate-500">
                    With years of experience in the industry, we have honed our skills across various technologies and platforms.
                </p>
                <p class="text-slate-500">
                    We stay ahead of the curve by leveraging the latest tools and frameworks, providing cutting-edge solutions.
                </p>

                <div class="flex items-center mt-4">
                    <a href="{{ route('contact') }}" class="bg-primary text-white px-4 py-2 rounded inline-flex items-center text-sm md:m-0 m-auto transition duration-300 hover:bg-secondary-400">
                        Contact Us <i class="fa-solid fa-arrow-right ms-2"></i>
                    </a>
                </div>
            </div>

            <div class="order-1 lg:order-2 md:mt-0 mt-8">
                @include('partials.tech-logos')
            </div>
        </div>
    </div>
</section>
@endsection