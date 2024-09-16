import Guest from '@/Layouts/GuestLayout';
import { Head } from '@inertiajs/react';

export default function BlogDetail({ post }) {
    return (
        <>
            <Head title={post.title} />
            <Guest>
               
                <section className="relative bg-gray-800 text-white">
                    <div 
                        className="absolute inset-0 bg-cover bg-center" 
                        style={{ backgroundImage: `url('/storage/product/image/${post.image}')` }}
                    >
                        <div className="absolute inset-0 bg-gradient-to-t from-black via-black opacity-60"></div>
                    </div>
                    <div className="relative container mx-auto flex flex-col items-center justify-center min-h-screen py-24 lg:py-32 text-center">
                        <h1 className="text-4xl lg:text-6xl font-extrabold leading-tight mb-6 shadow-md">
                            {post.title}
                        </h1>
                        
                    </div>
                    <div className="absolute inset-x-0 bottom-0">
                        <svg 
                            className="w-full h-24 text-gray-800" 
                            viewBox="0 0 1440 40" 
                            xmlns="http://www.w3.org/2000/svg"
                        >
                            <g fill="#fff">
                                <path d="M0,30.013 C239.659,10.004 479.143,0 718.453,0 C957.763,0 1198.28,10.004 1440,30.013 L1440,40 L0,40 L0,30.013 Z" />
                            </g>
                        </svg>
                    </div>
                </section>

                <section className="py-16 bg-gray-50">
                    <div className="container mx-auto px-4 md:px-8">
                        
                        {post.image && (
                            <div className="relative mb-12">

                            </div>
                        )}
                        <div className="bg-white p-8 rounded-lg shadow-lg border border-gray-200">
                            <div className="prose lg:prose-xl mx-auto text-gray-800 leading-relaxed text-2xl">
                            
                                <div dangerouslySetInnerHTML={{ __html: post.body }} />
                            </div>
                        </div>
                    </div>
                </section>
            </Guest>
        </>
    );
}
