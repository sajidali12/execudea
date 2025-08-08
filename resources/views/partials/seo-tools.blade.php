<div class="swiper seoToolsSwiper">
    <div class="swiper-wrapper">
        @php
            $seoTools = [
                ['src' => 'img/seo/moz.png', 'alt' => 'Moz SEO Tool'],
                ['src' => 'img/seo/yost.png', 'alt' => 'Yoast SEO Plugin'],
                ['src' => 'img/seo/search.png', 'alt' => 'Google Search Console'],
                ['src' => 'img/seo/seo1.png', 'alt' => 'SEO Analytics Tool'],
            ];
        @endphp
        
        @foreach($seoTools as $tool)
            <div class="swiper-slide">
                <img
                    class="opacity-80 m-auto"
                    src="{{ asset($tool['src']) }}"
                    alt="{{ $tool['alt'] }}"
                    style="height: 150px; object-fit: contain;"
                />
            </div>
        @endforeach
    </div>
    <div class="swiper-pagination"></div>
</div>

@push('scripts')
<script>
    var seoToolsSwiper = new Swiper(".seoToolsSwiper", {
        slidesPerView: 1,
        spaceBetween: 30,
        autoplay: {
            delay: 6000,
            disableOnInteraction: false,
        },
        pagination: {
            el: ".swiper-pagination",
            clickable: true,
        },
        breakpoints: {
            768: {
                slidesPerView: 2,
            },
            1170: {
                slidesPerView: 3,
            }
        }
    });
</script>
@endpush