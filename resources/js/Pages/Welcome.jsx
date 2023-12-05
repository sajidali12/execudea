import Guest from "@/Layouts/GuestLayout";
import { Link, Head } from "@inertiajs/react";

export default function Welcome({ auth, laravelVersion, phpVersion }) {
    return (
        <>
            <Head title="Best Website Development Company In Pakistan" />
            <Guest>
            <section class="py-44 relative bg-amber-500/5">
                <div class=" hero-with-shapes">
                    <div class="shape1"></div>
                    <div class="shape2"></div>
                    <div class="shape3"></div>

                    <div class="container m-auto md:px-10 px-0">
                        <div>
                            <div
                                class="bg-amber-500/10 py-2 px-4 inline-block rounded-md mb-6"
                                data-aos="fade-right"
                                data-aos-duration="1000"
                            >
                                <a href="#">
                                    <div class="flex items-center gap-2">
                                        <div class="inline-block px-2 text-sm text-white rounded-full bg-primary">
                                            New!
                                        </div>
                                        <div class="font-medium">
                                            Check our latest article on design
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <h1 class="md:text-5xl text-3xl text-gray-700 font-medium my-5">
                                We develop softwares that{" "}
                                <span class="relative after:bg-secondary-400 md:after:h-6 after:h-4 after:w-full after:inset-x-0 after:bottom-0 after:absolute after:-z-10">
                                    works
                                </span>
                            </h1>
                            <p class="w-3/4 text-lg font-medium mt-6 mb-20 text-slate-600">
                                We're a top-notch web design and development
                                team helping business to craft the meaningful
                                and interactive product experiences.
                            </p>
                            <div class="flex flex-wrap items-center gap-5">
                                <a
                                    href="#"
                                    class="py-3 px-6 rounded border border-primary text-white bg-primary hover:shadow-lg hover:shadow-black/50 focus:outline focus:outline-black/50 transition-all duration-500"
                                >
                                    <i class="fa-solid fa-arrow-down me-2"></i>{" "}
                                    View Our Work
                                </a>
                                <a
                                    href="#"
                                    class="text-primary py-3 px-6 rounded border border-primary hover:border-black hover:bg-primary hover:text-white hover:shadow-lg hover:shadow-black/50 focus:outline focus:outline-black/50 transition-all duration-500"
                                >
                                    Learn More
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="absolute end-0 top-48 hidden md:block">
                    <div class="flex items-center gap-5 vertical-rl px-2">
                        <a href="https://www.linkedin.com/company/execudea" class="text-lg">
                           Linkedin
                        </a>
                        <a href="https://www.facebook.com/execudea" class="text-lg">
                            Facebook
                        </a>
                        <a href="https://www.instagram.com/execudea/" class="text-lg">
                            Instagram
                        </a>
                    </div>
                </div>
            </section>

            {/* Hero Section End */}
            {/* services Section Start */}
            <section class="py-20">
                <div class="container m-auto md:px-10 px-0">
                    <div class="text-center">
                        <h1 class="text-3xl font-medium">What We Do</h1>
                        <p class="font-medium text-slate-500 mt-5 mb-4">
                            We are helping businesses to develop their web
                            applications
                        </p>
                    </div>

                    <div class="grid xl:grid-cols-3 md:grid-cols-2 grid-cols-1 pt-12 gap-4">
                        <div
                            class="p-6 hover:bg-white rounded-md hover:shadow-xl transition-all duration-500"
                            data-aos="fade-up"
                            data-aos-duration="500"
                        >
                            <div class="w-12 h-12 rounded-md bg-primary/20 flex items-center justify-center">
                                <svg
                                    class="w-7 h-7 text-primary"
                                    viewBox="0 0 24 24"
                                    version="1.1"
                                    xmlns="http://www.w3.org/2000/svg"
                                    xmlns:xlink="http://www.w3.org/1999/xlink"
                                >
                                    <g
                                        stroke="none"
                                        stroke-width="1"
                                        fill="none"
                                        fill-rule="evenodd"
                                    >
                                        <rect
                                            id="bound"
                                            x="0"
                                            y="0"
                                            width="24"
                                            height="24"
                                        ></rect>
                                        <path
                                            d="M12,10.9996338 C12.8356605,10.3719448 13.8743941,10 15,10 C17.7614237,10 20,12.2385763 20,15 C20,17.7614237 17.7614237,20 15,20 C13.8743941,20 12.8356605,19.6280552 12,19.0003662 C11.1643395,19.6280552 10.1256059,20 9,20 C6.23857625,20 4,17.7614237 4,15 C4,12.2385763 6.23857625,10 9,10 C10.1256059,10 11.1643395,10.3719448 12,10.9996338 Z M13.3336047,12.504354 C13.757474,13.2388026 14,14.0910788 14,15 C14,15.9088933 13.7574889,16.761145 13.3336438,17.4955783 C13.8188886,17.8206693 14.3938466,18 15,18 C16.6568542,18 18,16.6568542 18,15 C18,13.3431458 16.6568542,12 15,12 C14.3930587,12 13.8175971,12.18044 13.3336047,12.504354 Z"
                                            id="Combined-Shape"
                                            fill="currentcolor"
                                            opacity="0.3"
                                        ></path>
                                        <circle
                                            id="Oval-14"
                                            fill="currentcolor"
                                            cx="12"
                                            cy="9"
                                            r="5"
                                        ></circle>
                                    </g>
                                </svg>
                            </div>
                            <h4 class="text-base font-medium my-5">
                                User Experience Design
                            </h4>
                            <p class="text-slate-400">
                                Following the best process that a great design
                                teams use to create products that provide
                                meaningful and relevant experiences to users
                            </p>
                        </div>

                        <div
                            class="p-6 hover:bg-white rounded-md hover:shadow-xl transition-all duration-500"
                            data-aos="fade-up"
                            data-aos-duration="700"
                        >
                            <div class="w-12 h-12 rounded-md bg-orange-500/10 flex items-center justify-center">
                                <svg
                                    class="w-7 h-7 text-orange-600"
                                    viewBox="0 0 24 24"
                                    version="1.1"
                                    xmlns="http://www.w3.org/2000/svg"
                                    xmlns:xlink="http://www.w3.org/1999/xlink"
                                >
                                    <g
                                        stroke="none"
                                        stroke-width="1"
                                        fill="none"
                                        fill-rule="evenodd"
                                    >
                                        <polygon
                                            id="Shape"
                                            points="0 0 24 0 24 24 0 24"
                                        ></polygon>
                                        <path
                                            d="M6,5 L18,5 C19.6568542,5 21,6.34314575 21,8 L21,17 C21,18.6568542 19.6568542,20 18,20 L6,20 C4.34314575,20 3,18.6568542 3,17 L3,8 C3,6.34314575 4.34314575,5 6,5 Z M5,17 L14,17 L9.5,11 L5,17 Z M16,14 C17.6568542,14 19,12.6568542 19,11 C19,9.34314575 17.6568542,8 16,8 C14.3431458,8 13,9.34314575 13,11 C13,12.6568542 14.3431458,14 16,14 Z"
                                            id="Rectangle-25"
                                            fill="currentcolor"
                                        ></path>
                                    </g>
                                </svg>
                            </div>
                            <h4 class="text-base font-medium my-5">
                                Front End Development
                            </h4>
                            <p class="text-slate-400">
                                Development of the websites for businesses of
                                all sizes and shapes and covering a small to
                                enterprise organizations
                            </p>
                        </div>

                        <div
                            class="p-6 hover:bg-white rounded-md hover:shadow-xl transition-all duration-500"
                            data-aos="fade-up"
                            data-aos-duration="900"
                        >
                            <div class="w-12 h-12 rounded-md bg-green-500/10 flex items-center justify-center">
                                <svg
                                    class="w-7 h-7 text-green-500"
                                    viewBox="0 0 24 24"
                                    version="1.1"
                                    xmlns="http://www.w3.org/2000/svg"
                                    xmlns:xlink="http://www.w3.org/1999/xlink"
                                >
                                    <g
                                        stroke="none"
                                        stroke-width="1"
                                        fill="none"
                                        fill-rule="evenodd"
                                    >
                                        <rect
                                            id="bound"
                                            x="0"
                                            y="0"
                                            width="24"
                                            height="24"
                                        ></rect>
                                        <path
                                            d="M12.7442084,3.27882877 L19.2473374,6.9949025 C19.7146999,7.26196679 20.003129,7.75898194 20.003129,8.29726722 L20.003129,15.7027328 C20.003129,16.2410181 19.7146999,16.7380332 19.2473374,17.0050975 L12.7442084,20.7211712 C12.2830594,20.9846849 11.7169406,20.9846849 11.2557916,20.7211712 L4.75266256,17.0050975 C4.28530007,16.7380332 3.99687097,16.2410181 3.99687097,15.7027328 L3.99687097,8.29726722 C3.99687097,7.75898194 4.28530007,7.26196679 4.75266256,6.9949025 L11.2557916,3.27882877 C11.7169406,3.01531506 12.2830594,3.01531506 12.7442084,3.27882877 Z M12,14.5 C13.3807119,14.5 14.5,13.3807119 14.5,12 C14.5,10.6192881 13.3807119,9.5 12,9.5 C10.6192881,9.5 9.5,10.6192881 9.5,12 C9.5,13.3807119 10.6192881,14.5 12,14.5 Z"
                                            id="Combined-Shape"
                                            fill="currentcolor"
                                        ></path>
                                    </g>
                                </svg>
                            </div>
                            <h4 class="text-base font-medium my-5">
                                Search Engine Optimisation (SEO)
                            </h4>
                            <p class="text-slate-400">
                                We provide complete search engin optimisation services and make best strategies for better ranking of website in popular search engines.
                            </p>
                        </div>
                    </div>
                </div>
            </section>
            {/* services Section End */}
            {/* portfolio Section Start */}
            <section class="py-20">
                <div class="container m-auto md:px-10 px-0">
                    <div class="text-center">
                        <span class="text-sm font-medium py-1 px-3 rounded-full text-primary bg-primary/10">
                            Latest
                        </span>
                        <h1 class="text-3xl font-medium my-3">Featured Work</h1>
                        <p class="font-medium text-slate-400 mt-5 mb-4">
                            Explore some of our latest website projects
                        </p>
                    </div>

                    <div
                        class="grid lg:grid-cols-2 grid-cols-1 gap-6"
                        data-aos="fade-up"
                        data-aos-duration="600"
                    >
                        <div class="group relative mt-12 hover:opacity-80">
                            <div class="pt-12 ps-12 group-hover:bg-white/10 rounded-md group-hover:shadow-lg transition-all duration-300">
                                <div>
                                    <div class="flex items-center justify-between mb-7">
                                        <h3 class="text-xl">Project</h3>
                                        <p class="font-medium text-slate-500 pe-8">
                                            Branding, Interaction, Web Design
                                        </p>
                                    </div>
                                    <div>
                                        <img
                                            src="img/features/agency1.jpg"
                                            class="rounded-md"
                                        />
                                    </div>
                                    <div class="absolute inset-0 group-hover:flex items-center justify-center hidden transition-all duration-300">
                                        <a href="#" class="inline-block">
                                            <div class="flex items-center gap-3 py-[6px] px-3 bg-black rounded-md">
                                                <p class="text-sm font-semibold text-white">
                                                    View Project
                                                </p>
                                                <i class="fa-solid fa-arrow-right text-white"></i>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="absolute inset-0 group-hover:bg-slate-300/20 transition-all duration-300"></div>
                        </div>

                        <div class="group relative mt-12 hover:opacity-80">
                            <div class="pt-12 ps-12 group-hover:bg-white/10 rounded-md group-hover:shadow-lg transition-all duration-300">
                                <div>
                                    <div class="flex items-center justify-between mb-7">
                                        <h3 class="text-xl">Project 2</h3>
                                        <p class="font-medium text-slate-500 pe-8">
                                            Branding, Web Design & Development
                                        </p>
                                    </div>
                                    <div>
                                        <img
                                            src="img/features/agency2.jpg"
                                            class="rounded-md"
                                        />
                                    </div>
                                    <div class="absolute inset-0 group-hover:flex items-center justify-center hidden transition-all duration-300">
                                        <a href="#" class="inline-block">
                                            <div class="flex items-center gap-3 py-[6px] px-3 bg-black rounded-md">
                                                <p class="text-sm font-semibold text-white">
                                                    View Project
                                                </p>
                                                <i class="fa-solid fa-arrow-right text-white"></i>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="absolute inset-0 group-hover:bg-slate-300/20 transition-all duration-300"></div>
                        </div>
                    </div>
                    <div
                        class="grid lg:grid-cols-2 grid-cols-1 gap-6"
                        data-aos="fade-up"
                        data-aos-duration="800"
                    >
                        <div class="group relative mt-12 hover:opacity-80">
                            <div class="pt-12 ps-12 group-hover:bg-white/10 rounded-md group-hover:shadow-lg transition-all duration-300">
                                <div>
                                    <div class="flex items-center justify-between mb-7">
                                        <h3 class="text-xl">Project 3</h3>
                                        <p class="font-medium text-slate-500 pe-8">
                                            Branding, Interaction, Web Design
                                        </p>
                                    </div>
                                    <div>
                                        <img
                                            src="img/features/agency2.jpg"
                                            class="rounded-md"
                                        />
                                    </div>
                                    <div class="absolute inset-0 group-hover:flex items-center justify-center hidden transition-all duration-300">
                                        <a href="#" class="inline-block">
                                            <div class="flex items-center gap-3 py-[6px] px-3 bg-black rounded-md">
                                                <p class="text-sm font-semibold text-white">
                                                    View Project
                                                </p>
                                                <i class="fa-solid fa-arrow-right text-white"></i>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="absolute inset-0 group-hover:bg-slate-300/20 transition-all duration-300"></div>
                        </div>

                        <div class="group relative mt-12 hover:opacity-80">
                            <div class="pt-12 ps-12 group-hover:bg-white/10 rounded-md group-hover:shadow-lg transition-all duration-300">
                                <div>
                                    <div class="flex items-center justify-between mb-7">
                                        <h3 class="text-xl">Project 4</h3>
                                        <p class="font-medium text-slate-500 pe-8">
                                            {" "}
                                            Branding, Web Design & Development
                                        </p>
                                    </div>
                                    <div>
                                        <img
                                            src="img/features/agency1.jpg"
                                            class="rounded-md"
                                        />
                                    </div>
                                    <div class="absolute inset-0 group-hover:flex items-center justify-center hidden transition-all duration-300">
                                        <a href="#" class="inline-block">
                                            <div class="flex items-center gap-3 py-[6px] px-3 bg-black rounded-md">
                                                <p class="text-sm font-semibold text-white">
                                                    View Project
                                                </p>
                                                <i class="fa-solid fa-arrow-right text-white"></i>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="absolute inset-0 group-hover:bg-slate-300/20 transition-all duration-300"></div>
                        </div>
                    </div>

                    <div class="flex justify-center mt-14">
                        <a
                            href="#"
                            class="py-3 px-6 rounded border border-black hover:border-black hover:bg-black hover:text-white hover:shadow-lg hover:shadow-black/50 focus:outline focus:outline-black/50 transition-all duration-500"
                        >
                            Explore All Work{" "}
                            <i class="fa-solid fa-arrow-right ms-2"></i>
                        </a>
                    </div>
                </div>
            </section>

            {/* portfolio Section End */}
            {/* clients Section Start */}
            <section class="py-32 relative bg-orange-700/10">
                <div class="absolute top-0 inset-x-0 hidden sm:block">
                    <img
                        src="img/shapes/white-wave.svg"
                        alt="svg"
                        class="w-full -scale-x-100"
                    />
                </div>
                <div class="container relative m-auto md:px-10 px-0">
                    <span class="text-sm font-medium py-1 px-3 rounded-full text-primary bg-primary/10">
                        Our Customers
                    </span>

                    <div class="grid lg:grid-cols-2 grid-cols-1 gap-6 mt-5">
                        <h1 class="text-3xl font-semibold">
                            We have worked with more than 500 happy clients
                        </h1>
                        <p class="text-slate-600">
                            Since 2016 we are providing best web development and digital marketing solutions for our customers. Our experienced team of Engineers, Design experts and Digital Marketing strategy makers are always ready to help your business in online community.
                        </p>
                    </div>

                    <div class="flex flex-wrap items-center justify-around mt-12 gap-5">
                        <img
                            src="img/brands/amazon.svg"
                            class="w-28"
                        />
                        <img
                            src="img/brands/google.svg"
                            class="w-28"
                        />
                        <img
                            src="img/brands/paypal.svg"
                            class="w-28"
                        />
                        <img
                            src="img/brands/spotify.svg"
                            class="w-28"
                        />
                        <img
                            src="img/brands/shopify.svg"
                            class="w-28"
                        />
                    </div>
                </div>
                <div class="absolute bottom-0 inset-x-0 hidden sm:block">
                    <img
                        src="img/shapes/white-wave.svg"
                        alt="svg"
                        class="w-full scale-x-100 -scale-y-100"
                    />
                </div>
            </section>

            {/* clients Section End   */}
            {/* blog Section Start */}
            <section class="py-20">
                <div class="container m-auto md:px-10 px-0">
                    <div class="text-center">
                        <span class="text-sm font-medium py-1 px-3 rounded-full text-primary bg-primary/10">
                            Blog
                        </span>
                        <h1 class="text-3xl font-medium my-3">
                            Interesting Articles
                        </h1>
                    </div>

                    <div class="grid lg:grid-cols-3 sm:grid-cols-2 grid-cols-1 mt-12 gap-6">
                        <div
                            class="shadow-md rounded-md"
                            data-aos="fade-up"
                            data-aos-duration="500"
                        >
                            <div class="relative">
                                <div class="absolute end-4 top-3">
                                    <span class="px-3 py-1 text-sm font-medium text-white rounded-md bg-black">
                                        Design
                                    </span>
                                </div>
                                <img src="img/hero/coworking1.jpg" />
                                <div class="absolute -bottom-5">
                                    <svg
                                        class="w-full h-14 text-white"
                                        viewBox="0 0 528 40"
                                        version="1.1"
                                        xmlns:xlink="http://www.w3.org/1999/xlink"
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
                            <div class="p-6">
                                <p class="text-sm">11 March, 2020</p>
                                <h4 class="text-lg hover:text-blue-700 font-semibold my-2">
                                    <a href="#">
                                        Top 10 design inspirations to follow
                                    </a>
                                </h4>
                                <p class="text-slate-400 my-2">
                                    Single page websites are taking over the
                                    world, and that's why I would like you to
                                    present the best ...
                                    <a
                                        href="#"
                                        class="text-slate-800 hover:text-blue-700"
                                    >
                                        Read More
                                    </a>
                                </p>
                            </div>
                        </div>

                        <div
                            class="shadow-md rounded-md"
                            data-aos="fade-up"
                            data-aos-duration="700"
                        >
                            <div class="relative">
                                <div class="absolute end-4 top-3">
                                    <span class="px-3 py-1 text-sm font-medium text-white rounded-md bg-primary">
                                        Development
                                    </span>
                                </div>
                                <img src="img/hero/coworking2.png" />
                                <div class="absolute -bottom-5">
                                    <svg
                                        class="w-full h-14 text-white"
                                        viewBox="0 0 528 40"
                                        version="1.1"
                                        xmlns:xlink="http://www.w3.org/1999/xlink"
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
                            <div class="p-6">
                                <p class="text-sm">12 March, 2020</p>
                                <h4 class="text-lg hover:text-blue-700 font-semibold my-2">
                                    <a href="#">
                                        Top 10 design inspirations to follow
                                    </a>
                                </h4>
                                <p class="text-slate-400 my-2">
                                    We have shortlisted the best WordPress
                                    themes for alcohol production, distribution,
                                    and selling to...
                                    <a
                                        href="#"
                                        class="text-slate-800 hover:text-blue-700"
                                    >
                                        Read More
                                    </a>
                                </p>
                            </div>
                        </div>

                        <div
                            class="shadow-md rounded-md"
                            data-aos="fade-up"
                            data-aos-duration="900"
                        >
                            <div class="relative">
                                <div class="absolute end-4 top-3">
                                    <span class="px-3 py-1 text-sm font-medium text-white rounded-md bg-black">
                                        Design
                                    </span>
                                </div>
                                <img src="img/hero/coworking4.jpg" />
                                <div class="absolute -bottom-5">
                                    <svg
                                        class="w-full h-14 text-white"
                                        viewBox="0 0 528 40"
                                        version="1.1"
                                        xmlns:xlink="http://www.w3.org/1999/xlink"
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
                            <div class="p-6">
                                <p class="text-sm">13 March, 2020</p>
                                <h4 class="text-lg hover:text-blue-700 font-semibold my-2">
                                    <a href="#">
                                        Top 10 design inspirations to follow
                                    </a>
                                </h4>
                                <p class="text-slate-400 my-2">
                                    The following Italian restaurant WordPress
                                    themes come with the powerful drag-n-drop...
                                    <a
                                        href="#"
                                        class="text-slate-800 hover:text-blue-700"
                                    >
                                        Read More
                                    </a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            {/* blog Section End */}

            {/* openings Section Start */}
            <section class="py-20">
                <div class="container">
                    <div class="text-center mb-16 md:px-10 px-0">
                        <h1 class="text-3xl font-medium my-3">We're Hiring</h1>
                        <p class="font-medium text-slate-500 mb-8">
                            We're a team of lifelong learners. We're equal parts
                            left and right brained.
                        </p>
                        <a
                            href="#"
                            class="py-3 px-6 rounded border border-primary font-medium text-white bg-primary hover:shadow-lg hover:shadow-black/50 focus:outline focus:outline-black/50 transition-all duration-500"
                        >
                            Learn about our culture
                        </a>
                    </div>

                    <div class="my-10 grid gap-y-4">
                        <a href="#">
                            <div
                                class="max-w-3xl mx-auto"
                                data-aos="fade-up"
                                data-aos-duration="500"
                            >
                                <div class="border p-4 rounded-md">
                                    <div class="flex flex-wrap items-center justify-between">
                                        <h5>Front-End Developer</h5>
                                        <div class="flex items-center">
                                            <p class="text-slate-500">
                                                Islamabad / Full-Time
                                            </p>
                                            <i class="fa-solid fa-angle-right ms-28"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                        <a href="#">
                            <div class="max-w-3xl mx-auto">
                                <div
                                    class="border p-4 rounded-md"
                                    data-aos="fade-up"
                                    data-aos-duration="700"
                                >
                                    <div class="flex flex-wrap items-center justify-between">
                                        <h5>Community Manager</h5>
                                        <div class="flex items-center">
                                            <p class="text-slate-500">
                                                Islamabad / Full-Time
                                            </p>
                                            <i class="fa-solid fa-angle-right ms-28"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                        <a href="#">
                            <div
                                class="max-w-3xl mx-auto"
                                data-aos="fade-up"
                                data-aos-duration="900"
                            >
                                <div class="border p-4 rounded-md">
                                    <div class="flex flex-wrap items-center justify-between">
                                        <h5>UX/UI Designer</h5>
                                        <div class="flex items-center">
                                            <p class="text-slate-500">
                                                Islamabad / Full-Time
                                            </p>
                                            <i class="fa-solid fa-angle-right ms-28"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </section>

            {/* openings Section End   */}
            </Guest>
            
        </>
    );
}
