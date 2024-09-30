import GoogleReviews from "@/Components/GoogleReviews";
import Guest from "@/Layouts/GuestLayout";
import { Link, Head, usePage } from "@inertiajs/react";
import React from 'react';



export default function Welcome({ auth, laravelVersion, phpVersion, latestPosts  }) {
    const generateSlug = (title) => title.toLowerCase().replace(/\s+/g, '-').replace(/[^\w\-]+/g, '');
    return (
        <>
            <Head title="Best Website Development Company In Pakistan" />
            <Guest>
                <section className="py-44 relative bg-amber-500/5">
                    <div className=" hero-with-shapes">
                        <div className="shape1"></div>
                        <div className="shape2"></div>
                        <div className="shape3"></div>

                        <div className="container m-auto md:px-10 px-2">
                            <div>
                                <div
                                    className="bg-amber-500/10 py-2 px-4 inline-block rounded-md mb-6"
                                    data-aos="fade-right"
                                    data-aos-duration="1000"
                                >
                                    <Link href="/blog">
                                        <div className="flex items-center gap-2">
                                            <div className="inline-block px-2 text-sm text-white rounded-full bg-primary">
                                                New!
                                            </div>
                                            <div className="font-medium">
                                                Check our latest article on
                                                design
                                            </div>
                                        </div>
                                    </Link>
                                </div>
                                <h1 className="md:text-5xl text-3xl text-gray-700 font-medium my-5 font-futura-bold">
                                    We develop software that{" "}
                                    <span className="relative after:bg-secondary-400 md:after:h-6 after:h-4 after:w-full after:inset-x-0 after:bottom-0 after:absolute after:-z-10">
                                        works
                                    </span>
                                </h1>
                                <p className="w-3/4 text-2xl font-medium mt-6 mb-20 text-slate-600 font-futura-light">
                                    We're a top-notch web design and development
                                    team helping business to craft the
                                    meaningful and interactive product
                                    experiences.
                                </p>
                                <div className="flex flex-wrap items-center gap-5">
                                    <Link
                                        href="#work"
                                        className="py-3 px-6 rounded border border-primary text-white bg-primary hover:shadow-lg hover:shadow-black/50 focus:outline focus:outline-black/50 transition-all duration-500"
                                    >
                                        <i className="fa-solid fa-arrow-down me-2"></i>{" "}
                                        View Our Work
                                    </Link>
                                    <a
                                        href="https://calendly.com/execudea-info/30min"
                                        target="_blank"
                                        className="text-primary py-3 px-6 rounded border border-primary hover:border-black hover:bg-primary hover:text-white hover:shadow-lg hover:shadow-black/50 focus:outline focus:outline-black/50 transition-all duration-500"
                                    >
                                        Book a Meeting
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div className="absolute end-0 top-48 hidden md:block ">
                        <div className="flex items-center gap-5 vertical-rl px-2">
                            <a
                                href="https://www.linkedin.com/company/execudea"
                                className="text-lg  hover:text-primary "
                            >
                                Linkedin
                            </a>
                            <a
                                href="https://www.facebook.com/execudea"
                                className="text-lg  hover:text-primary"
                            >
                                Facebook
                            </a>
                            <a
                                href="https://www.instagram.com/execudea/"
                                className="text-lg  hover:text-primary"
                            >
                                Instagram
                            </a>
                        </div>
                    </div>
                </section>

                {/* Hero Section End */}
                {/* services Section Start */}
                <section className="py-20">
                    <div className="container m-auto md:px-10 px-0">
                        <div className="text-center">
                            <h1 className="text-4xl font-medium font-futura-bold">What We Do</h1>
                            <p className="text-2xl font-medium text-slate-500 mt-5 mb-4 font-futura-light">
                                We are helping businesses to develop their web
                                applications
                            </p>
                        </div>

                        <div className="grid xl:grid-cols-3 md:grid-cols-2 grid-cols-1 pt-12 gap-4">
                            <div
                                className="p-6 hover:bg-white rounded-md hover:shadow-xl transition-all duration-500"
                                data-aos="fade-up"
                                data-aos-duration="500"
                            >
                                <div className="w-12 h-12 rounded-md bg-primary/20 flex items-center justify-center">
                                    <svg
                                        className="w-7 h-7 text-primary"
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
                                <h4 className="text-xl font-medium my-5 font-futura-bold">
                                    User Experience Design
                                </h4>
                                <p className="text-slate-400">
                                    Following the best process that a great
                                    design teams use to create products that
                                    provide meaningful and relevant experiences
                                    to users
                                </p>
                            </div>

                            <div
                                className="p-6 hover:bg-white rounded-md hover:shadow-xl transition-all duration-500"
                                data-aos="fade-up"
                                data-aos-duration="700"
                            >
                                <div className="w-12 h-12 rounded-md bg-orange-500/10 flex items-center justify-center">
                                    <svg
                                        className="w-7 h-7 text-orange-600"
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
                                <h4 className="text-xl font-medium my-5 font-futura-bold">
                                    Web Development
                                </h4>
                                <p className="text-slate-400">
                                    Development of the websites for businesses
                                    of all sizes and shapes and covering a small
                                    to enterprise organizations
                                </p>
                            </div>
                        
                           

                            <div
                                className="p-6 hover:bg-white rounded-md hover:shadow-xl transition-all duration-500"
                                data-aos="fade-up"
                                data-aos-duration="900"
                            >
                                <div className="w-12 h-12 rounded-md bg-green-500/10 flex items-center justify-center">
                                    <svg
                                        className="w-7 h-7 text-green-500"
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
                                <h4 className="text-xl font-medium my-5 font-futura-bold">
                                    Search Engine Optimisation (SEO)
                                </h4>
                                <p className="text-slate-400">
                                    We provide complete search engin
                                    optimisation services and make best
                                    strategies for better ranking of website in
                                    popular search engines.
                                </p>
                            </div>
                            <div
                                className="p-6 hover:bg-white rounded-md hover:shadow-xl transition-all duration-500 mt-10"
                                data-aos="fade-up"
                                data-aos-duration="900"
                            >
                                <div className="w-12 h-12 rounded-md bg-green-500/10 flex items-center justify-center">
                                                                    <svg
                                        className="w-8 h-8 text-primary"
                                        viewBox="0 0 100 100"
                                        xmlns="http://www.w3.org/2000/svg"
                                    >
                                        <defs>
                                            <linearGradient id="grad1" x1="0%" y1="0%" x2="100%" y2="100%">
                                                <stop offset="0%" style={{ stopColor: "#4A90E2", stopOpacity: 1 }} />
                                                <stop offset="100%" style={{ stopColor: "#00C6FF", stopOpacity: 1 }} />
                                            </linearGradient>
                                        </defs>
                                        <rect x="10" y="25" width="80" height="50" rx="15" fill="url(#grad1)" />
                                        
                                        <path
                                            d="M20 55 C 20 45, 30 45, 30 55 S 40 65, 40 55 S 50 45, 50 55 S 60 65, 60 55 S 70 45, 70 55 S 80 65, 80 55"
                                            fill="none"
                                            stroke="#fff"
                                            strokeWidth="3"
                                        />
                                        
                                        <circle cx="30" cy="40" r="5" fill="#fff" />
                                        <circle cx="50" cy="40" r="5" fill="#fff" />
                                        <circle cx="70" cy="40" r="5" fill="#fff" />

                                        <rect x="35" y="70" width="30" height="8" fill="#fff" rx="4" />
                                        
                                        <line x1="15" y1="25" x2="85" y2="25" stroke="#fff" strokeWidth="2" />
                                        <line x1="15" y1="75" x2="85" y2="75" stroke="#fff" strokeWidth="2" />
                                    </svg>


                                </div>
                                <h4 className="text-xl font-medium my-5 font-futura-bold">
                                    Saas
                                </h4>
                                <p className="text-slate-400">
                                We empower businesses with innovative SaaS solutions designed for seamless scalability and efficiency. Unlock your potential with our customizable platforms that adapt to your evolving needs.
                                </p>
                            </div>
                            <div
                                className="p-6 hover:bg-white rounded-md hover:shadow-xl transition-all duration-500 mt-10"
                                data-aos="fade-up"
                                data-aos-duration="900"
                            >
                                <div className="w-12 h-12 rounded-md bg-green-500/10 flex items-center justify-center">
                                <svg
                                className="w-7 h-7 text-primary"
                                viewBox="0 0 100 100"
                                xmlns="http://www.w3.org/2000/svg"
                            >
                                <rect x="10" y="10" width="80" height="80" rx="10" fill="#3c5a99" />
                                <circle cx="50" cy="50" r="25" fill="#fff" />
                                
                                <path
                                    d="M50 25 Q60 35, 50 45 Q40 35, 50 25 Z"
                                    fill="#3c5a99"
                                />
                                <path
                                    d="M50 55 Q60 65, 50 75 Q40 65, 50 55 Z"
                                    fill="#3c5a99"
                                />
                                
                                <path
                                    d="M20 40 Q15 50, 20 60 Q25 50, 20 40 Z"
                                    fill="#3c5a99"
                                />
                                <path
                                    d="M80 40 Q85 50, 80 60 Q75 50, 80 40 Z"
                                    fill="#3c5a99"
                                />

                                <circle cx="50" cy="50" r="10" fill="#3c5a99" />
                            </svg>



                                </div>
                                <h4 className="text-xl font-medium my-5 font-futura-bold">
                                   Wordpress/Shopify
                                </h4>
                                <p className="text-slate-400">
                                We create dynamic websites and e-commerce solutions with WordPress and Shopify. Our skilled team is committed to crafting user-friendly, high-performance platforms that elevate your online presence.
                                </p>
                            </div>
                            <div
                                className="p-6 hover:bg-white rounded-md hover:shadow-xl transition-all duration-500 mt-10"
                                data-aos="fade-up"
                                data-aos-duration="900"
                            >
                                <div className="w-12 h-12 rounded-md bg-green-500/10 flex items-center justify-center">
                                <svg
                                className="w-7 h-7 text-primary"
                                viewBox="0 0 100 100"
                                xmlns="http://www.w3.org/2000/svg"
                            >
                                <rect x="10" y="20" width="80" height="60" rx="10" fill="#4F5B93" />
                                <rect x="15" y="25" width="70" height="50" fill="#fff" rx="5" />
                                
                                <circle cx="25" cy="35" r="5" fill="#4F5B93" />
                                <circle cx="25" cy="55" r="5" fill="#4F5B93" />
                                <circle cx="75" cy="35" r="5" fill="#4F5B93" />
                                <circle cx="75" cy="55" r="5" fill="#4F5B93" />
                                
                                <path
                                    d="M40 40 L60 40 L50 30 Z"
                                    fill="#4F5B93"
                                />
                                <path
                                    d="M40 50 L60 50 L50 60 Z"
                                    fill="#4F5B93"
                                />

                                <line x1="10" y1="20" x2="90" y2="20" stroke="#4F5B93" stroke-width="2" />
                                <line x1="10" y1="80" x2="90" y2="80" stroke="#4F5B93" stroke-width="2" />
                            </svg>
                                </div>
                                <h4 className="text-xl font-medium my-5 font-futura-bold">
                                    Backend
                                </h4>
                                <p className="text-slate-400">
                                we specialize in robust backend solutions using PHP, Laravel, Node.js, and Express. Our expert team is dedicated to delivering scalable and efficient applications tailored to your business needs.
                                </p>
                            </div>
                        </div>
                        </div>
                        
                    
                </section>
                {/* services Section End */}

                
                {/* portfolio Section Start */}
                <section className="py-20" id="work">
                    <div className="container m-auto md:px-10 px-2">
                        <div className="text-center">
                            <span className="text-sm font-medium py-1 px-3 rounded-full text-primary bg-primary/10">
                                Latest
                            </span>
                            <h1 className="text-4xl font-medium my-3 font-futura-bold">
                                {/* Featured Products */}
                                Explore some of our latest projects!
                            </h1>
                            <p className="text-2xl font-medium text-slate-400 mt-5 mb-4 font-futura-light">
                                {/* Explore some of our latest products */}
                            </p>
                        </div>

                        <div
                            className="grid lg:grid-cols-2 grid-cols-1 gap-6"
                            data-aos="fade-up"
                            data-aos-duration="600"
                        >
                                <Link to="#" className="group relative mt-12 block cursor-pointer ">
                <div className="pt-12 ps-12 group-hover:bg-white/10 rounded-md group-hover:shadow-lg transition-all duration-300">
                    <div>
                        <div className="flex items-center justify-between mb-7">
                            <h3 className="text-2xl font-bold">hms360</h3>
                            <p className="font-medium text-slate-500 pe-8">
                                Hotel management system
                            </p>
                        </div>
                        <div>
                            <img
                                src="img/products/hms.png"
                                className="rounded-md"
                                alt="Project"
                            />
                        </div>
                        <div className="absolute inset-0 group-hover:flex items-center justify-center hidden transition-all duration-300">
                             
                        </div>
                    </div>
                    <div className="absolute inset-0 group-hover:bg-slate-300/20 transition-all duration-300"></div>
                </div>
                <div className="absolute inset-0 group-hover:bg-slate-300/20 transition-all duration-300"></div>
            </Link> 
                            <div className="group relative mt-12 hover:opacity-80">
                                <div className="pt-12 ps-12 group-hover:bg-white/10 rounded-md group-hover:shadow-lg transition-all duration-300">
                                    <div>
                                        <div className="flex items-center justify-between mb-7">
                                            <h3 className="text-2xl font-bold">
                                                HRM
                                            </h3>
                                            <p className="font-medium text-slate-500 pe-8">
                                                Human resource management system
                                            </p>
                                        </div>
                                        
                                        <div>
                                            <img
                                                src="img/features/agency2.jpg"
                                                className="rounded-md"
                                            />
                                        </div>
                                        <div className="absolute inset-0 group-hover:flex items-center justify-center hidden transition-all duration-300">
                                            <a
                                                href="/services/1"
                                                className="inline-block"
                                            >
                                                {/* <div className="flex items-center gap-3 py-[6px] px-3 bg-black rounded-md">
                                                    <p className="text-sm font-semibold text-white">
                                                        View Project
                                                    </p>
                                                    <i className="fa-solid fa-arrow-right text-white"></i>
                                                </div> */}
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div className="absolute inset-0 group-hover:bg-slate-300/20 transition-all duration-300"></div>
                            </div>
                        </div>
                        
                        <div
                            className="grid lg:grid-cols-2 grid-cols-1  gap-6 "
                            data-aos="fade-up"
                            data-aos-duration="800"
                         >
                            <div className="group relative mt-12 hover:opacity-80">
                                <div className="pt-12 ps-12 group-hover:bg-white/10 rounded-md group-hover:shadow-lg transition-all duration-300">
                                    <div>
                                        <div className="flex items-center justify-between mb-7">
                                            <h3 className="text-2xl font-bold">
                                                Point Of Sale
                                            </h3>
                                            <p className="font-medium text-slate-500 pe-8">
                                                Sales & Inventory
                                            </p>
                                        </div>
                                        <div>
                                            <img
                                                src="img/features/agency2.jpg"
                                                className="rounded-md"
                                            />
                                        </div>
                                        <div className="absolute inset-0 group-hover:flex items-center justify-center hidden transition-all duration-300">
                                            {/* <a
                                                href="#"
                                                className="inline-block"
                                            >
                                                <div className="flex items-center gap-3 py-[6px] px-3 bg-black rounded-md">
                                                    <p className="text-sm font-semibold text-white">
                                                        View Project
                                                    </p>
                                                    <i className="fa-solid fa-arrow-right text-white"></i>
                                                </div>
                                            </a> */}
                                        </div>
                                    </div>
                                </div>
                                <div className="absolute inset-0 group-hover:bg-slate-300/20 transition-all duration-300"></div>
                              </div>

                             <div className="group relative mt-12 hover:opacity-80">
                                <div className="pt-12 ps-12 group-hover:bg-white/10 rounded-md group-hover:shadow-lg transition-all duration-300">
                                    <div>
                                        <div className="flex items-center justify-between mb-7">
                                            <h3 className="text-2xl font-bold">
                                                Accounting Software
                                            </h3>
                                            <p className="font-medium text-slate-500 pe-8">
                                                {" "}
                                                Accounting & Finance
                                            </p>
                                        </div>
                                        <div>
                                            <img
                                                src="img/features/agency1.jpg"
                                                className="rounded-md"
                                            />
                                        </div>
                                        <div className="absolute inset-0 group-hover:flex items-center justify-center hidden transition-all duration-300">
                                            {/* <a
                                                href="#"
                                                className="inline-block"
                                            >
                                                <div className="flex items-center gap-3 py-[6px] px-3 bg-black rounded-md">
                                                    <p className="text-sm font-semibold text-white">
                                                        View Project
                                                    </p>
                                                    <i className="fa-solid fa-arrow-right text-white"></i>
                                                </div>
                                            </a> */}
                                        </div>
                                    </div>
                                </div>
                                <div className="absolute inset-0 group-hover:bg-slate-300/20 transition-all duration-300"></div>
                            </div>
                        </div>

                        <div className="flex justify-center mt-14">
                            {/* <Link
                                href="#"
                                target="_blank"
                                className="py-3 px-6 rounded border border-black hover:border-black hover:bg-black hover:text-white hover:shadow-lg hover:shadow-black/50 focus:outline focus:outline-black/50 transition-all duration-500"
                            >
                                Explore More !{" "}
                                <i className="fa-solid fa-arrow-right ms-2"></i>
                            </Link> */}
                        </div>
                    </div>
                </section>

                {/* portfolio Section End */}
                {/* clients Section Start */}
                <section className="py-32 relative bg-orange-700/10">
                    <div className="absolute top-0 inset-x-0 hidden sm:block">
                        <img
                            src="img/shapes/white-wave.svg"
                            alt="svg"
                            className="w-full -scale-x-100"
                        />
                    </div>
                    <div className="container relative m-auto md:px-10 px-2">
                        <span className="text-sm font-medium py-1 px-3 rounded-full text-primary bg-primary/10">
                            Our Customers
                        </span>

                        <div className="grid lg:grid-cols-2 grid-cols-1 gap-6 mt-5">
                            <h1 className="text-3xl font-semibold">
                                We have worked with more than 500 happy clients
                            </h1>
                            <p className="text-slate-600">
                                Since 2016 we are providing best web development
                                and digital marketing solutions for our
                                customers. Our experienced team of Engineers,
                                Design experts and Digital Marketing strategy
                                makers are always ready to help your business in
                                online community.
                            </p>
                        </div>

                        <div className="flex flex-wrap items-center justify-around mt-12 gap-5">
                            <img src="img/brands/webdesigns.png" className="w-28" />
                            <img src="img/brands/uexel.png" className="w-28" />
                            <img src="img/brands/rfirst.png" className="w-28" />
                            <img
                                src="img/brands/tibet.png"
                                className="w-28"
                            />
                            <img
                                src="img/brands/medit.png"
                                className="w-28"
                            />
                        </div>
                    </div>
                    <div className="absolute bottom-0 inset-x-0 hidden sm:block">
                        <img
                            src="img/shapes/white-wave.svg"
                            alt="svg"
                            className="w-full scale-x-100 -scale-y-100"
                        />
                    </div>
                </section>

                {/* clients Section End   */}
                
         {/* Blog Section Start */}
<section className="py-20">
    
    <div className="container m-auto md:px-10 px-2">
        <div className="text-center">
            <span className="text-sm font-medium py-1 px-3 rounded-full text-primary bg-primary/10">
                Blog
            </span>
            <h1 className="text-3xl font-medium my-3">
                Latest Articles
            </h1>
        </div>

        <div className="grid lg:grid-cols-3 sm:grid-cols-2 grid-cols-1 mt-12 gap-6">
            {latestPosts && latestPosts.length > 0 ? (
                latestPosts.map(({ id, title, body, image, created_at }) => (
                    <div
                        key={id}
                        className="shadow-md rounded-md relative flex flex-col bg-white overflow-hidden"
                        data-aos="fade-up"
                        data-aos-duration="500"
                    >
                        <div className="relative flex-shrink-0">
                            <div
                                className="absolute top-3 right-3 bg-primary text-white text-sm px-3 py-1 rounded-full badge-animation"
                                aria-label="New post"
                            >
                                New!
                            </div>
                            <img
                                src={image ? `/storage/product/image/${image}` : 'img/blog/default.png'}
                                alt={title}
                                className="w-full h-60 object-cover rounded-t-md"
                            />
                            <div className="absolute -bottom-5 w-full">
                                <svg
                                    className="w-full h-14 text-white"
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
                        <div className="p-6 flex flex-col flex-grow">
                            <p className="text-sm text-gray-600 mb-2">
                                {new Date(created_at).toLocaleDateString('en-US', {
                                    day: '2-digit',
                                    month: 'long',
                                    year: 'numeric',
                                })}
                            </p>
                            <h4 className="text-lg font-semibold mb-2 hover:text-primary">
                                <Link href={`/blog/${id}-${generateSlug(title)}`} className="text-primary">
                                    {title}
                                </Link>
                            </h4>
                            <div className="flex-grow mb-4">
                                <p className="text-sm text-gray-500 line-clamp-2" dangerouslySetInnerHTML={{ __html: body }}>
                                  
                                </p>
                            </div>
                            <Link
                                href={`/blog/${id}-${generateSlug(title)}`}
                                className="text-primary font-semibold"
                            >
                                Read More
                            </Link>
                        </div>
                    </div>
                ))
            ) : (
                <div className="col-span-3 text-center py-6">
                    No posts available.
                </div>
            )}
        </div>
    </div>
</section>




                {/* blog Section End */}

                {/* openings Section Start */}
                <section className="py-20">
                    <div className="container m-auto md:px-10 px-2">
                        <div className="text-center mb-16 md:px-10 px-0">
                            <h1 className="text-3xl font-medium my-3">
                                Our Happy Customers
                            </h1>
                            <p className="font-medium text-slate-500 mb-8">
                                We value our users and put our best effort to make thier ideas to be successful.
                            </p>
                           
                        </div>

                          <GoogleReviews />
                    </div>
                </section>

                {/* openings Section End   */}
            </Guest>
        </>
    );
}
