import Guest from '@/Layouts/GuestLayout';
import { Head } from '@inertiajs/react';
import { useEffect } from 'react';

export default function BlogDetail({ post }) {
    useEffect(() => {
        const content = document.getElementById('blog-content');
        const observer = new IntersectionObserver(
            (entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('fade-in');
                    }
                });
            },
            { threshold: 0.1 }
        );
        observer.observe(content);

        return () => {
            observer.disconnect();
        };
    }, []);

    return (
        <>
            <Head title={post.title} />
            <Guest>
                <section className="bg-gray-100 lg:pt-28 sm:pb-36 pb-16 pt-36 relative overflow-hidden">
                    <div className="container md:px-10 px-4 flex flex-col lg:flex-row items-center justify-between">
                        {/* Image Section */}
                        {post.image && (
                            <div className="lg:w-2/5 animate-image-float">
                                <img
                                    src={`/storage/product/image/${post.image}`}
                                    alt={post.title}
                                    className="rounded-lg shadow-lg max-w-full h-auto"
                                />
                            </div>
                        )}

                        {/* Text Section */}
                        <div className="lg:w-3/5 lg:pl-10 mt-8 lg:mt-0">
                            <h1 className="text-4xl font-bold text-gray-800 mb-4 transform transition duration-500 hover:scale-105">
                                {post.title}
                            </h1>
                          
                            <span className='bg-primary text-white px-1 py-1'>Author: Syed Sajid Ali</span>
                            <p className='mt-2'> {new Date(post.created_at).toLocaleDateString('en-US', {
                                                day: '2-digit',
                                                month: 'long',
                                                year: 'numeric',
                                            })}</p>
                            
                        </div>
                    </div>
                    <div class="container m-auto md:px-10 px-4 lg:py-8 py-8">
                    <div
                                id="blog-content"
                                className="text-md text-slate-500 opacity-0 transition-opacity duration-500"
                                dangerouslySetInnerHTML={{ __html: post.body }}
                            />
                       </div>
                    {/* Decorative SVG */}
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
            </Guest>

            <style jsx>{`
                @keyframes image-float {
                    0% {
                        transform: translateY(0);
                    }
                    50% {
                        transform: translateY(-10px);
                    }
                    100% {
                        transform: translateY(0);
                    }
                }
                .animate-image-float {
                    animation: image-float 3s ease-in-out infinite;
                }

                .fade-in {
                    opacity: 1 !important;
                    transition: opacity 1s ease-in-out;
                }

                #blog-content {
                    opacity: 0;
                    transition: opacity 1s ease-in-out;
                }
            `}</style>
        </>
    );
}
