@extends('layouts.app')

@section('title', 'Blog - Latest Articles')

@section('content')
<section class="bg-gray-100 lg:pt-28 sm:pb-36 pb-16 pt-36 relative">
    <div class="container m-auto">
        <div class="flex justify-center">
            <div class="lg:w-7/12 text-center">
                <h1 class="text-5xl/relaxed text-gray-700">
                    Latest Articles
                </h1>
                <p class="mb-6 md:text-lg text-gray-500">
                    Stay updated with our latest insights, tips, and industry news
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

<section class="py-20">
    <div class="container m-auto md:px-10 px-2">
        <div class="grid lg:grid-cols-3 sm:grid-cols-2 grid-cols-1 gap-6">
            @if($posts->count() > 0)
                @foreach($posts as $post)
                    <div
                        class="shadow-md rounded-md relative flex flex-col bg-white overflow-hidden"
                        data-aos="fade-up"
                        data-aos-duration="500"
                    >
                        <div class="relative flex-shrink-0">
                            <div
                                class="absolute top-3 right-3 bg-primary text-white text-sm px-3 py-1 rounded-full badge-animation"
                                aria-label="Post"
                            >
                                Article
                            </div>
                            <img
                                src="{{ $post->image ? asset('storage/product/image/' . $post->image) : asset('img/blog/default.png') }}"
                                alt="{{ $post->title }}"
                                class="w-full h-60 object-cover rounded-t-md"
                            />
                            <div class="absolute -bottom-5 w-full">
                                <svg
                                    class="w-full h-14 text-white"
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
                        <div class="p-6 flex flex-col flex-grow">
                            <p class="text-sm text-gray-600 mb-2">
                                {{ $post->created_at->format('d F Y') }}
                            </p>
                            <h4 class="text-lg font-semibold mb-2 hover:text-primary">
                                <a href="{{ route('blog.show', $post->slug ?: $post->id) }}" class="text-primary">
                                    {{ $post->title }}
                                </a>
                            </h4>
                            <div class="flex-grow mb-4">
                                <p class="text-sm text-gray-500 line-clamp-2">
                                    {{ $post->excerpt ?: Str::limit(strip_tags($post->body), 150) }}
                                </p>
                            </div>
                            <a
                                href="{{ route('blog.show', $post->slug ?: $post->id) }}"
                                class="text-primary font-semibold"
                            >
                                Read More
                            </a>
                        </div>
                    </div>
                @endforeach
            @else
                <div class="col-span-3 text-center py-12">
                    <h3 class="text-xl font-semibold text-gray-700 mb-2">No posts available</h3>
                    <p class="text-gray-500">Check back later for new articles.</p>
                </div>
            @endif
        </div>

        @if($posts->hasPages())
            <div class="mt-12 flex justify-center">
                {{ $posts->links() }}
            </div>
        @endif
    </div>
</section>
@endsection