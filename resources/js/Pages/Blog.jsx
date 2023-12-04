import Guest from "@/Layouts/GuestLayout";
import { Head } from "@inertiajs/react";

export default function Blog() {
    return (
        <>
            <Head title="Blog" />
            <Guest>
                <section class="bg-gray-100 lg:pt-28 sm:pb-36 pb-16 pt-36 relative">
                    <div class="container m-auto">
                        <div class="flex justify-center">
                            <div class="lg:w-7/12 text-center">
                                <h1 class="text-5xl/relaxed text-gray-700">
                                    Blog
                                </h1>
                                <p class="mb-6 md:text-lg text-gray-500">
                                    Find useful resources about design,
                                    development and digital marketing
                                    techniques.
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

                <section class="py-12">
                    <div class="container m-auto md:px-10 px-0">
                        <div
                            class="grid lg:grid-cols-3 grid-cols-1 gap-6 lg:py-10 py-14"
                            data-aos="fade-up"
                        >
                            <div>
                                <img
                                    src="img/blog/blog-1.png"
                                    class="rounded-md mb-5"
                                />

                                <span class="bg-orange-500/10 text-orange-500 font-medium rounded-md text-xs py-1 px-2">
                                    <a href="#">Announcement</a>
                                </span>
                                <h1 class="text-lg my-3 transition-all hover:text-primary">
                                    <a href="#">
                                        Introducing new blazzing fast user
                                        interface
                                    </a>
                                </h1>
                                <p class="text-sm/relaxed tracking-wider text-gray-500">
                                    Introducing the blazzing fast user
                                    interface. The new UI is fast, secure and
                                    most user friendly...
                                    <a href="#" class="text-primary">
                                        read more
                                    </a>
                                </p>
                            </div>

                            <div>
                                <img
                                    src="img/blog/blog-2.png"
                                    class="rounded-md mb-5"
                                />

                                <span class="bg-green-500/10 text-green-500 font-medium rounded-md text-xs py-1 px-2">
                                    <a href="#">Tutorial</a>
                                </span>
                                <h1 class="text-lg my-3 transition-all hover:text-primary">
                                    <a href="#">
                                        What you should know before considering
                                        the Prompt
                                    </a>
                                </h1>
                                <p class="text-sm/relaxed tracking-wider text-gray-500">
                                    We are giving a pretty extensive guideline
                                    and context before you make your decision to
                                    consider Prompt...
                                    <a href="#" class="text-primary">
                                        read more
                                    </a>
                                </p>
                            </div>

                            <div>
                                <img
                                    src="img/blog/blog-3.png"
                                    class="rounded-md mb-5"
                                />

                                <span class="bg-teal-500/10 text-teal-500 font-medium rounded-md text-xs py-1 px-2">
                                    <a href="#">Community</a>
                                </span>
                                <h1 class="text-lg my-3 transition-all hover:text-primary">
                                    <a href="#">
                                        Your Way to a Successful Sales Campaigns
                                    </a>
                                </h1>
                                <p class="text-sm/relaxed tracking-wider text-gray-500">
                                    Explore a latest guideline for creating a
                                    successful online sales campaign using
                                    google adwords or facebook ads ...
                                    <a href="#" class="text-primary">
                                        read more
                                    </a>
                                </p>
                            </div>
                        </div>

                        <div
                            class="grid lg:grid-cols-3 gap-6 lg:py-16 py-14"
                            data-aos="fade-up"
                        >
                            <div>
                                <img
                                    src="img/blog/blog-1.png"
                                    class="rounded-md mb-5"
                                />

                                <span class="bg-orange-500/10 text-orange-500 font-medium rounded-md text-xs py-1 px-2">
                                    <a href="#">Announcement</a>
                                </span>
                                <h1 class="text-lg my-3 transition-all hover:text-primary">
                                    <a href="#">
                                        Introducing new blazzing fast user
                                        interface
                                    </a>
                                </h1>
                                <p class="text-sm/relaxed tracking-wider text-gray-500">
                                    Introducing the blazzing fast user
                                    interface. The new UI is fast, secure and
                                    most user friendly...
                                    <a href="#" class="text-primary">
                                        read more
                                    </a>
                                </p>
                            </div>

                            <div>
                                <img
                                    src="img/blog/blog-2.png"
                                    class="rounded-md mb-5"
                                />

                                <span class="bg-green-500/10 text-green-500 font-medium rounded-md text-xs py-1 px-2">
                                    <a href="#">Tutorial</a>
                                </span>
                                <h1 class="text-lg my-3 transition-all hover:text-primary">
                                    <a href="#">
                                        What you should know before considering
                                        the Prompt
                                    </a>
                                </h1>
                                <p class="text-sm/relaxed tracking-wider text-gray-500">
                                    We are giving a pretty extensive guideline
                                    and context before you make your decision to
                                    consider Prompt...
                                    <a href="#" class="text-primary">
                                        read more
                                    </a>
                                </p>
                            </div>

                            <div>
                                <img
                                    src="img/blog/blog-3.png"
                                    class="rounded-md mb-5"
                                />

                                <span class="bg-teal-500/10 text-teal-500 font-medium rounded-md text-xs py-1 px-2">
                                    <a href="#">Community</a>
                                </span>
                                <h1 class="text-lg my-3 transition-all hover:text-primary">
                                    <a href="#">
                                        Your Way to a Successful Sales Campaigns
                                    </a>
                                </h1>
                                <p class="text-sm/relaxed tracking-wider text-gray-500">
                                    Explore a latest guideline for creating a
                                    successful online sales campaign using
                                    google adwords or facebook ads ...
                                    <a href="#" class="text-primary">
                                        read more
                                    </a>
                                </p>
                            </div>
                        </div>

                        <div class="flex justify-center items-center gap-2">
                            <div class="flex items-center">
                                <a
                                    href="javascript:void(0)"
                                    class="border border-gray-300 rounded-md text-sm tracking-wider transition-all duration-150 hover:shadow-lg focus:shadow-lg py-2 px-3"
                                >
                                    <i class="fa-solid fa-arrow-left me-2"></i>{" "}
                                    Previous
                                </a>
                            </div>

                            <div class="flex items-center">
                                <a
                                    href="javascript:void(0)"
                                    class="border border-gray-300 rounded-md text-sm tracking-wider transition-all duration-150 hover:shadow-lg focus:shadow-lg py-2 px-3"
                                >
                                    Next{" "}
                                    <i class="fa-solid fa-arrow-right ms-2"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </section>
            </Guest>
        </>
    );
}
