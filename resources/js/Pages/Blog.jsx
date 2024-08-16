import Guest from "@/Layouts/GuestLayout";
import { Head, usePage } from "@inertiajs/react";

export default function Blog() {
    const { posts } = usePage().props
    return (
        <>
            <Head title="Blog" />
            <Guest>
                <section className="bg-gray-100 lg:pt-28 sm:pb-36 pb-16 pt-36 relative">
                    <div className="container m-auto">
                        <div className="flex justify-center">
                            <div className="lg:w-7/12 text-center">
                                <h1 className="text-5xl/relaxed text-gray-700">
                                    Blog
                                </h1>
                                <p className="mb-6 md:text-lg text-gray-500">
                                    Find useful resources about design,
                                    development and digital marketing
                                    techniques.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div className="absolute -bottom-1 w-full">
                        <svg
                            className="w-full h-full"
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

                <section className="py-12">
                    <div className="container m-auto md:px-10 px-0">
                        <div
                            className="grid lg:grid-cols-3 grid-cols-1 gap-6 lg:py-10 py-14"
                            data-aos="fade-up"
                        >
                             {posts.map(({ id, title, body }) => (
                            <div>
                                <img
                                    src="img/blog/blog-1.png"
                                    className="rounded-md mb-5"
                                />

                                <span className="bg-orange-500/10 text-orange-500 font-medium rounded-md text-xs py-1 px-2">
                                    <a href="#">Announcement</a>
                                </span>
                                <h1 className="text-lg my-3 transition-all hover:text-primary">
                                    <a href="#">
                                     { title }
                                    </a>
                                </h1>
                                <p className="text-sm/relaxed tracking-wider text-gray-500">
                                    Introducing the blazzing fast user
                                    interface. The new UI is fast, secure and
                                    most user friendly...
                                    <a href={'blog/'+ id } className="text-primary">
                                        read more
                                    </a>
                                </p>
                            </div>
                             ))}
                        </div>

                    

                        <div className="flex justify-center items-center gap-2">
                            <div className="flex items-center">
                                <a
                                    href="javascript:void(0)"
                                    className="border border-gray-300 rounded-md text-sm tracking-wider transition-all duration-150 hover:shadow-lg focus:shadow-lg py-2 px-3"
                                >
                                    <i className="fa-solid fa-arrow-left me-2"></i>{" "}
                                    Previous
                                </a>
                            </div>

                            <div className="flex items-center">
                                <a
                                    href="javascript:void(0)"
                                    className="border border-gray-300 rounded-md text-sm tracking-wider transition-all duration-150 hover:shadow-lg focus:shadow-lg py-2 px-3"
                                >
                                    Next{" "}
                                    <i className="fa-solid fa-arrow-right ms-2"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </section>
            </Guest>
        </>
    );
}
