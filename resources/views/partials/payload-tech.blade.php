<div class="swiper payloadTechSwiper max-w-4xl mx-auto">
    <div class="swiper-wrapper">
        @php
            $payloadLogos = [
                ['src' => 'img/tech/payload-cms.png', 'alt' => 'Payload CMS', 'name' => 'Payload CMS'],
                ['src' => 'img/tech/Node.js_logo.png', 'alt' => 'Node.js', 'name' => 'Node.js'],
                ['src' => 'img/tech/react.png', 'alt' => 'React', 'name' => 'React'],
                ['src' => 'img/tech/next-js-logo.png', 'alt' => 'Next.js', 'name' => 'Next.js'],
                ['src' => 'img/tech/typescript-logo.png', 'alt' => 'TypeScript', 'name' => 'TypeScript'],
                ['src' => 'img/tech/mongodb-logo.webp', 'alt' => 'MongoDB', 'name' => 'MongoDB'],
            ];
        @endphp
        
        @foreach($payloadLogos as $logo)
            <div class="swiper-slide">
                <div class="bg-white rounded-xl shadow-lg p-8 hover:shadow-xl transition-all duration-300 hover:-translate-y-2">
                    <div class="flex flex-col items-center">
                        <img
                            class="h-16 w-16 mb-4 object-contain filter hover:scale-110 transition-transform duration-300"
                            src="{{ asset($logo['src']) }}"
                            alt="{{ $logo['alt'] }}"
                        />
                        <h3 class="text-lg font-semibold text-gray-800">{{ $logo['name'] }}</h3>
                        <p class="text-sm text-gray-500 mt-1">CMS Technology</p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <div class="swiper-pagination mt-8"></div>
</div>

@push('styles')
<style>
.payloadTechSwiper .swiper-pagination {
    position: relative !important;
    bottom: auto !important;
    margin-top: 2rem;
}
.payloadTechSwiper .swiper-pagination-bullet {
    background: #cbd5e1 !important;
    opacity: 1 !important;
}
.payloadTechSwiper .swiper-pagination-bullet-active {
    background: #0055ff !important;
}
</style>
@endpush

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var payloadTechSwiper = new Swiper(".payloadTechSwiper", {
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