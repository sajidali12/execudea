import React from 'react';
import { Head, Link, usePage } from '@inertiajs/react';
import Guest from '@/Layouts/GuestLayout';

export default function Blog() {
    const { posts } = usePage().props;

    // Determine the latest post
    const latestPost = posts.data[0]; // Assuming posts are sorted with the latest first

    return (
        <>
            <Head title="Blog" />
            <Guest>
                <section className="bg-gray-100 lg:pt-28 sm:pb-36 pb-16 pt-36 relative">
                    <div className="container m-auto">
                        <div className="flex justify-center">
                            <div className="lg:w-7/12 text-center">
                                <h1 className="text-5xl/relaxed text-gray-700">Blog</h1>
                                <p className="mb-6 md:text-lg text-gray-500">
                                    Find useful resources about design, development, and digital marketing techniques.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div className="absolute -bottom-1 w-full">
                        <svg
                            className="w-full h-full"
                            viewBox="0 0 1440 40"
                            xmlns="http://www.w3.org/2000/svg"
                        >
                            <g fill="#fff">
                                <path
                                    d="M0,30.013 C239.659,10.004 479.143,0 718.453,0 C957.763,0 1198.28,10.004 1440,30.013 L1440,40 L0,40 L0,30.013 Z"
                                />
                            </g>
                        </svg>
                    </div>
                </section>

                <section className="py-12">
                    <div className="container m-auto md:px-10 px-0">
                        <div className="grid lg:grid-cols-3 grid-cols-1 gap-6 lg:py-10 py-14">
                            {posts.data.map(({ id, title, body, image, created_at }, index) => (
                                <div className='relative' key={id}>
                                    <img
                                        src={image ? `/storage/product/image/${image}` : 'img/blog/default.png'}
                                        alt={title}
                                        className="rounded-md mb-5 aspect-square"
                                    />
                                    {/* Render "New!" badge only on the latest post */}
                                    {posts.data.length > 0 && latestPost.id === id && (
                                        <div className="inline-block px-4 py-1 text-sm text-white rounded-full bg-primary absolute top-2 left-2">
                                            New!
                                        </div>
                                    )}
                                    <p className="text-sm mb-0 mt-2 py-2">
                                        {new Date(created_at).toLocaleDateString('en-US', {
                                            day: '2-digit',
                                            month: 'long',
                                            year: 'numeric',
                                        })}
                                    </p>
                                    <h1 className="text-lg transition-all hover:text-primary -py-2">
                                        <a href={`blog/${id}`} className="text-primary">{title}</a>
                                    </h1>
                                    <div className="mb-2">
                                        {/* <p className="text-sm tracking-wider text-gray-500 line-clamp-2">
                                        dangerouslySetInnerHTML={{ __html: body}}
                                        </p> */}
                                        <div className="text-sm tracking-wider text-gray-500 line-clamp-2"
                                dangerouslySetInnerHTML={{ __html: body }}
                            />
                                    </div>
                                    <a href={`blog/${id}`} className="text-primary font-semibold">read more</a>
                                </div>
                            ))}
                        </div>

                        <div className="flex justify-center items-center gap-2">
                            {posts.prev_page_url && (
                                <div className="flex items-center">
                                    <Link
                                        href={posts.prev_page_url}
                                        className="border border-gray-300 rounded-md text-sm tracking-wider transition-all duration-150 hover:shadow-lg focus:shadow-lg py-2 px-3"
                                    >
                                        <i className="fa-solid fa-arrow-left me-2"></i> Previous
                                    </Link>
                                </div>
                            )}

                            {posts.next_page_url && (
                                <div className="flex items-center">
                                    <Link
                                        href={posts.next_page_url}
                                        className="border border-gray-300 rounded-md text-sm tracking-wider transition-all duration-150 hover:shadow-lg focus:shadow-lg py-2 px-3"
                                    >
                                        Next <i className="fa-solid fa-arrow-right ms-2"></i>
                                    </Link>
                                </div>
                            )}
                        </div>
                    </div>
                </section>
            </Guest>
        </>
    );
}
