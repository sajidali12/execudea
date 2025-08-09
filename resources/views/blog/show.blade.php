@extends('layouts.app')

@section('title', $post->title)

@push('meta')
<!-- SEO Meta Tags -->
<meta name="description" content="{{ $post->getSeoDescription() }}">
<meta name="keywords" content="{{ $post->meta_keywords }}">
<link rel="canonical" href="{{ request()->fullUrl() }}">

<!-- Open Graph Meta Tags -->
<meta property="og:title" content="{{ $post->getSeoTitle() }}">
<meta property="og:description" content="{{ $post->getSeoDescription() }}">
<meta property="og:type" content="article">
<meta property="og:url" content="{{ request()->fullUrl() }}">
@if($post->image)
<meta property="og:image" content="{{ asset('storage/product/image/' . $post->image) }}">
<meta property="og:image:width" content="1200">
<meta property="og:image:height" content="630">
@endif
<meta property="og:site_name" content="{{ config('app.name') }}">
<meta property="article:author" content="{{ $post->author_name }}">
<meta property="article:published_time" content="{{ $post->created_at->toISOString() }}">
<meta property="article:modified_time" content="{{ $post->updated_at->toISOString() }}">

<!-- Twitter Card Meta Tags -->
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:title" content="{{ $post->getSeoTitle() }}">
<meta name="twitter:description" content="{{ $post->getSeoDescription() }}">
@if($post->image)
<meta name="twitter:image" content="{{ asset('storage/product/image/' . $post->image) }}">
@endif

<!-- Additional SEO -->
<meta name="author" content="{{ $post->author_name }}">
<meta name="robots" content="index, follow">
@endpush

@section('content')
<article itemscope itemtype="https://schema.org/BlogPosting">
<section class="bg-gray-100 lg:pt-28 sm:pb-36 pb-16 pt-36 relative">
    <div class="container m-auto">
        <div class="flex justify-center">
            <div class="lg:w-8/12 text-center">
                <h1 class="text-4xl/relaxed text-gray-700 font-futura-bold" itemprop="headline">
                    {{ $post->title }}
                </h1>
                <p class="mb-6 md:text-lg text-gray-500">
                    Published on <time datetime="{{ $post->created_at->toISOString() }}" itemprop="datePublished">{{ $post->created_at->format('F d, Y') }}</time>
                    @if($post->author_name)
                        by <span itemprop="author" itemscope itemtype="https://schema.org/Person"><span itemprop="name">{{ $post->author_name }}</span></span>
                    @endif
                </p>
                <meta itemprop="dateModified" content="{{ $post->updated_at->toISOString() }}">
                <div itemprop="publisher" itemscope itemtype="https://schema.org/Organization" style="display: none;">
                    <span itemprop="name">{{ config('app.name') }}</span>
                    <div itemprop="logo" itemscope itemtype="https://schema.org/ImageObject">
                        <meta itemprop="url" content="{{ asset('images/logo.png') }}">
                    </div>
                </div>
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
    <div class="container m-auto md:px-10 px-4">
        <div class="max-w-4xl mx-auto">
            @if($post->image)
                <div class="mb-8" itemprop="image" itemscope itemtype="https://schema.org/ImageObject">
                    <img
                        src="{{ asset('storage/product/image/' . $post->image) }}"
                        alt="{{ $post->title }}"
                        class="w-full h-96 object-cover rounded-lg shadow-lg"
                        itemprop="url"
                    />
                    <meta itemprop="width" content="1200">
                    <meta itemprop="height" content="630">
                </div>
            @endif

            <div class="prose prose-lg max-w-none" itemprop="articleBody">
                {!! $post->body !!}
            </div>

            @if($post->faqs && count($post->faqs) > 0)
                <div class="mt-16">
                    <div class="bg-gray-50 rounded-lg p-8">
                        <h2 class="text-2xl font-bold text-gray-900 mb-8 text-center">Frequently Asked Questions</h2>
                        <div class="space-y-6" itemscope itemtype="https://schema.org/FAQPage">
                            @foreach($post->faqs as $faq)
                                <div class="bg-white rounded-lg p-6 shadow-sm" itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
                                    <h3 class="text-lg font-semibold text-gray-900 mb-3" itemprop="name">{{ $faq['question'] }}</h3>
                                    <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
                                        <p class="text-gray-700 leading-relaxed" itemprop="text">{{ $faq['answer'] }}</p>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            @endif

            <div class="mt-12">
                <div class="border-t pt-8">
                    <div class="flex items-center justify-between">
                        <a
                            href="{{ route('blog') }}"
                            class="inline-flex items-center text-primary hover:text-secondary-400 transition-colors"
                        >
                            <i class="fa-solid fa-arrow-left mr-2"></i>
                            Back to Blog
                        </a>
                        
                        <div class="flex items-center space-x-4">
                            <span class="text-gray-600">Share:</span>
                            <a
                                href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(request()->fullUrl()) }}"
                                target="_blank"
                                class="text-blue-600 hover:text-blue-800 transition-colors"
                                aria-label="Share on Facebook"
                            >
                                <i class="fab fa-facebook-f"></i>
                            </a>
                            <a
                                href="https://twitter.com/intent/tweet?url={{ urlencode(request()->fullUrl()) }}&text={{ urlencode($post->title) }}"
                                target="_blank"
                                class="text-blue-400 hover:text-blue-600 transition-colors"
                                aria-label="Share on Twitter"
                            >
                                <i class="fab fa-twitter"></i>
                            </a>
                            <a
                                href="https://www.linkedin.com/sharing/share-offsite/?url={{ urlencode(request()->fullUrl()) }}"
                                target="_blank"
                                class="text-blue-700 hover:text-blue-900 transition-colors"
                                aria-label="Share on LinkedIn"
                            >
                                <i class="fab fa-linkedin-in"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
</article>

@push('styles')
<style>
.prose {
    color: #374151;
}
.prose h1, .prose h2, .prose h3, .prose h4, .prose h5, .prose h6 {
    color: #111827;
    font-weight: 600;
}
.prose h1 {
    font-size: 2.25rem;
    line-height: 2.5rem;
    margin-top: 0;
    margin-bottom: 2rem;
}
.prose h2 {
    font-size: 1.875rem;
    line-height: 2.25rem;
    margin-top: 2rem;
    margin-bottom: 1rem;
}
.prose h3 {
    font-size: 1.5rem;
    line-height: 2rem;
    margin-top: 1.6rem;
    margin-bottom: 0.6rem;
}
.prose p {
    margin-bottom: 1.25rem;
    line-height: 1.75;
}
.prose a {
    color: #4db8b3;
    text-decoration: underline;
}
.prose a:hover {
    color: #059669;
}
.prose ul, .prose ol {
    margin-bottom: 1.25rem;
    padding-left: 1.625rem;
}
.prose li {
    margin-bottom: 0.5rem;
}
.prose img {
    margin-top: 2rem;
    margin-bottom: 2rem;
    border-radius: 0.5rem;
}
.prose blockquote {
    font-style: italic;
    border-left: 4px solid #4db8b3;
    padding-left: 1rem;
    margin: 1.6rem 0;
    color: #6b7280;
}
.prose code {
    background-color: #f3f4f6;
    padding: 0.25rem 0.375rem;
    border-radius: 0.25rem;
    font-size: 0.875rem;
}
.prose pre {
    background-color: #1f2937;
    color: #f9fafb;
    padding: 1rem;
    border-radius: 0.5rem;
    overflow-x: auto;
    margin: 1.5rem 0;
}
.prose pre code {
    background-color: transparent;
    padding: 0;
}
</style>
@endpush

@if($post->faqs && count($post->faqs) > 0)
@push('scripts')
<script type="application/ld+json">
{
    "@context": "https://schema.org",
    "@type": "FAQPage",
    "mainEntity": [
        @foreach($post->faqs as $index => $faq)
        {
            "@type": "Question",
            "name": "{{ addslashes($faq['question']) }}",
            "acceptedAnswer": {
                "@type": "Answer",
                "text": "{{ addslashes($faq['answer']) }}"
            }
        }@if($index < count($post->faqs) - 1),@endif
        @endforeach
    ]
}
</script>

<script type="application/ld+json">
{
    "@context": "https://schema.org",
    "@type": "BlogPosting",
    "headline": "{{ addslashes($post->title) }}",
    "description": "{{ addslashes($post->getSeoDescription()) }}",
    "image": @if($post->image)"{{ asset('storage/product/image/' . $post->image) }}"@else null @endif,
    "author": {
        "@type": "Person",
        "name": "{{ addslashes($post->author_name) }}"
    },
    "publisher": {
        "@type": "Organization",
        "name": "{{ config('app.name') }}",
        "logo": {
            "@type": "ImageObject",
            "url": "{{ asset('images/logo.png') }}"
        }
    },
    "datePublished": "{{ $post->created_at->toISOString() }}",
    "dateModified": "{{ $post->updated_at->toISOString() }}",
    "mainEntityOfPage": {
        "@type": "WebPage",
        "@id": "{{ request()->fullUrl() }}"
    },
    @if($post->faqs && count($post->faqs) > 0)
    "mainEntity": {
        "@type": "FAQPage",
        "mainEntity": [
            @foreach($post->faqs as $index => $faq)
            {
                "@type": "Question",
                "name": "{{ addslashes($faq['question']) }}",
                "acceptedAnswer": {
                    "@type": "Answer",
                    "text": "{{ addslashes($faq['answer']) }}"
                }
            }@if($index < count($post->faqs) - 1),@endif
            @endforeach
        ]
    }
    @endif
}
</script>
@endpush
@endif
@endsection