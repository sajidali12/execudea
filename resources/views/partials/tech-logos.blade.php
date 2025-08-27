<div class="swiper techSwiper max-w-4xl mx-auto">
    <div class="swiper-wrapper">
        @php
            $logos = [
                ['src' => 'img/tech/html.png', 'alt' => 'HTML5 Web Development', 'name' => 'HTML5'],
                ['src' => 'img/tech/css.png', 'alt' => 'CSS3 Web Development', 'name' => 'CSS3'],
                ['src' => 'img/tech/java-script.png', 'alt' => 'JavaScript Web Development', 'name' => 'JavaScript'],
                ['src' => 'img/tech/react.png', 'alt' => 'React JS Web Development', 'name' => 'React'],
                ['src' => 'img/tech/php.png', 'alt' => 'PHP Web Development', 'name' => 'PHP'],
                ['src' => 'img/tech/node.png', 'alt' => 'Node JS Web Development', 'name' => 'Node.js'],
                ['src' => 'img/tech/laravel.png', 'alt' => 'Laravel Web Development', 'name' => 'Laravel'],
                ['src' => 'img/tech/vue.png', 'alt' => 'Vue JS Web Development', 'name' => 'Vue.js'],
            ];
        @endphp
        
        @foreach($logos as $logo)
            <div class="swiper-slide">
                <div class="bg-white rounded-xl shadow-lg p-8 hover:shadow-xl transition-all duration-300 hover:-translate-y-2">
                    <div class="flex flex-col items-center">
                        <img
                            class="h-16 w-16 mb-4 object-contain filter hover:scale-110 transition-transform duration-300"
                            src="{{ asset($logo['src']) }}"
                            alt="{{ $logo['alt'] }}"
                        />
                        <h3 class="text-lg font-semibold text-gray-800">{{ $logo['name'] }}</h3>
                        <p class="text-sm text-gray-500 mt-1">Web Technology</p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <div class="swiper-pagination mt-8"></div>
</div>

@push('styles')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
<style>
.techSwiper .swiper-pagination {
    position: relative !important;
    bottom: auto !important;
    margin-top: 2rem;
}
.techSwiper .swiper-pagination-bullet {
    background: #cbd5e1 !important;
    opacity: 1 !important;
}
.techSwiper .swiper-pagination-bullet-active {
    background: #0055ff !important;
}
</style>
@endpush

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var techSwiper = new Swiper(".techSwiper", {
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