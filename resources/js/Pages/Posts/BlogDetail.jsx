import Guest from '@/Layouts/GuestLayout';
import { Head } from '@inertiajs/react';

export default function BlogDetail({ post }) {
    return (
        <>
            <Head title={post.title} />
            <Guest>
                <section className="bg-gray-100 lg:pt-28 sm:pb-36 pb-16 pt-36 relative">
                    <div className="container mx-auto">
                        <div className="flex justify-center">
                            <div className="lg:w-7/12 text-center">
                                <h1 className="text-5xl font-semibold text-gray-700">
                                    {post.title}
                                </h1>
                                {/* Uncomment and adjust image handling as needed */}
                                {/* {post.image && (
                                    <img
                                        src={`/storage/product/image/${post.image}`}
                                        alt={post.title}
                                        className="mt-8 max-w-full h-auto mx-auto"
                                    />
                                )} */}
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
                    <div className="container mx-auto px-4 md:px-10">
                        <div>
                            <div
                                dangerouslySetInnerHTML={{ __html: post.body }}
                            />
                        </div>
                    </div>
                </section>
            </Guest>
        </>
    );
}
