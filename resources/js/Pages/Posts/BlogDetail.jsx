import Guest from '@/Layouts/GuestLayout';
import { Head } from '@inertiajs/react';

export default function BlogDetail({ post }) {
    return (
        <>
        <Head title={post.title} />
        <Guest>
        <section className="bg-gray-100 lg:pt-28 sm:pb-36 pb-16 pt-36 relative">
                    <div className="container m-auto">
                        <div className="flex justify-center">
                            <div className="lg:w-7/12 text-center">
                                <h1 className="text-5xl/relaxed text-gray-700">
                                    {post.title}
                                </h1>
                               
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
                  <div>
                        <div dangerouslySetInnerHTML={{__html:post.body}}></div>
                    </div>
                    </div>
                </section>
       </Guest>
       </>
    );
}