<div class="swiper userTechSwiper max-w-4xl mx-auto">
    <div class="swiper-wrapper">
        @php
            $userLogos = [
                ['src' => 'img/user/figma.png', 'alt' => 'Figma Design Tool', 'name' => 'Figma'],
                ['src' => 'img/user/xd.png', 'alt' => 'Adobe XD Design Tool', 'name' => 'Adobe XD'],
                ['src' => 'img/user/photoshop.png', 'alt' => 'Adobe Photoshop', 'name' => 'Photoshop'],
                ['src' => 'img/user/canva.png', 'alt' => 'Canva Design Tool', 'name' => 'Canva'],
            ];
        @endphp
        
        @foreach($userLogos as $logo)
            <div class="swiper-slide">
                <div class="bg-white rounded-xl shadow-lg p-8 hover:shadow-xl transition-all duration-300 hover:-translate-y-2">
                    <div class="flex flex-col items-center">
                        <img
                            class="h-16 w-16 mb-4 object-contain filter hover:scale-110 transition-transform duration-300"
                            src="{{ asset($logo['src']) }}"
                            alt="{{ $logo['alt'] }}"
                        />
                        <h3 class="text-lg font-semibold text-gray-800">{{ $logo['name'] }}</h3>
                        <p class="text-sm text-gray-500 mt-1">Design Tool</p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <div class="swiper-pagination mt-8"></div>
</div>

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var userTechSwiper = new Swiper(".userTechSwiper", {
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