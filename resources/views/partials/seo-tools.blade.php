<div class="swiper seoToolsSwiper max-w-4xl mx-auto">
    <div class="swiper-wrapper">
        @php
            $seoTools = [
                ['src' => 'img/seo/moz.png', 'alt' => 'Moz SEO Tool', 'name' => 'Moz'],
                ['src' => 'img/seo/yost.png', 'alt' => 'Yoast SEO Plugin', 'name' => 'Yoast SEO'],
                ['src' => 'img/seo/search.png', 'alt' => 'Google Search Console', 'name' => 'Search Console'],
                ['src' => 'img/seo/seo1.png', 'alt' => 'SEO Analytics Tool', 'name' => 'SEO Analytics'],
            ];
        @endphp
        
        @foreach($seoTools as $tool)
            <div class="swiper-slide">
                <div class="bg-white rounded-xl shadow-lg p-8 hover:shadow-xl transition-all duration-300 hover:-translate-y-2">
                    <div class="flex flex-col items-center">
                        <img
                            class="h-16 w-16 mb-4 object-contain filter hover:scale-110 transition-transform duration-300"
                            src="{{ asset($tool['src']) }}"
                            alt="{{ $tool['alt'] }}"
                        />
                        <h3 class="text-lg font-semibold text-gray-800">{{ $tool['name'] }}</h3>
                        <p class="text-sm text-gray-500 mt-1">SEO Tool</p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <div class="swiper-pagination mt-8"></div>
</div>

@push('styles')
<style>
.seoToolsSwiper .swiper-pagination {
    position: relative !important;
    bottom: auto !important;
    margin-top: 2rem;
}
.seoToolsSwiper .swiper-pagination-bullet {
    background: #cbd5e1 !important;
    opacity: 1 !important;
}
.seoToolsSwiper .swiper-pagination-bullet-active {
    background: #0055ff !important;
}
</style>
@endpush

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var seoToolsSwiper = new Swiper(".seoToolsSwiper", {
            slidesPerView: 1,
            spaceBetween: 30,
            loop: true,
            autoplay: {
                delay: 3000,
                disableOnInteraction: false,
                pauseOnMouseEnter: true,
            },
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
                dynamicBullets: true,
            },
            effect: 'slide',
            speed: 500,
            breakpoints: {
                640: {
                    slidesPerView: 2,
                    spaceBetween: 20,
                },
                768: {
                    slidesPerView: 3,
                    spaceBetween: 30,
                },
                1024: {
                    slidesPerView: 4,
                    spaceBetween: 30,
                }
            }
        });
    });
</script>
@endpush