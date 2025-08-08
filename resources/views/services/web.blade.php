@extends('layouts.app')

@section('title', 'Best Web Development Company In Pakistan')

@section('content')
<section class="relative" style="background: linear-gradient(rgba(0,85,255,.07) 0,rgba(0,85,255,.05) 100%)">
    <section class="relative pt-20 pb-24">
        <div class="container">
            <div class="grid lg:grid-cols-7 grid-cols-1 gap-16 items-center">
                <div class="lg:col-span-4" data-aos="fade-right">
                    <div class="relative 2xl:-ml-64 lg:-ml-28 2xl:min-w-[130%] lg:w-[113%] w-full">
                        <img src="{{ asset('img/tech/web.jpeg') }}" alt="web-development-img" />
                    </div>
                </div>

                <div class="lg:col-span-3" data-aos="fade-left">
                    <div class="text-center sm:text-start">
                        <h1 class="text-3xl/snug sm:text-4xl/snug xl:text-5xl/snug font-semibold font-futura-bold mb-7">
                            Professional <span class="relative after:bg-yellow-500/50 after:-z-10 after:absolute after:h-6 after:w-full after:bottom-0 after:end-0">Web Development</span> with Execudea.
                        </h1>
                        <p class="text-base/relaxed text-gray-500">
                            At Execudea, we provide comprehensive <b>Web Development</b> services that transform your ideas into powerful, scalable, and user-friendly websites. 
                            Our expert team utilizes cutting-edge technologies and industry best practices to deliver custom solutions that meet your business objectives. 
                            From responsive design to complex web applications, we ensure your digital presence stands out in today's competitive landscape.
                        </p>
                        <div class="flex sm:flex-row flex-col gap-2 mt-10">
                            <a href="{{ route('contact') }}" class="bg-primary text-white px-4 py-2 rounded inline-flex items-center text-sm md:m-0 m-auto transition duration-300 hover:bg-secondary-400">
                                Contact Us <i class="fa-solid fa-arrow-right ms-2"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="absolute bottom-0 inset-x-0 hidden sm:block">
        <img src="{{ asset('img/shapes/white-wave.svg') }}" alt="white-wave-svg" class="w-full -scale-x-100 -scale-y-100" />
    </div>
</section>

<div class="container md:px-10 px-4 m-auto mt-10">
    <div class="text-center">
        <span class="text-sm font-medium py-1 px-3 rounded-full text-primary bg-primary/10">Our Services</span>
        <h2 class="text-3xl font-medium mt-5 mb-4 font-futura-bold">Web Development Services</h2>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mx-4 mt-14">
        @php
            $services = [
                ['title' => 'Frontend Development', 'description' => 'Creating responsive and interactive user interfaces using modern technologies like React, Vue.js, and Angular.'],
                ['title' => 'Backend Development', 'description' => 'Building robust server-side applications with PHP, Laravel, Node.js, and Express to power your web applications.'],
                ['title' => 'Full-Stack Solutions', 'description' => 'Comprehensive development services covering both frontend and backend to deliver complete web solutions.'],
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

<section class="py-20">
    <div class="container md:px-5 px-10">
        <h2 class="text-4xl font-medium my-3 font-futura-bold text-center mb-8">Our Technology Stack</h2>
        <div class="flex justify-center">
            @include('partials.tech-logos')
        </div>
    </div>
</section>
@endsection