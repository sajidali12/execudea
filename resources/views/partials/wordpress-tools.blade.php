<div class="swiper wpToolsSwiper">
    <div class="swiper-wrapper">
        @php
            $wpTools = [
                ['src' => 'img/wordpress/wp1.png', 'alt' => 'WordPress CMS'],
                ['src' => 'img/wordpress/woo.png', 'alt' => 'WooCommerce'],
                ['src' => 'img/wordpress/elementor.png', 'alt' => 'Elementor Page Builder'],
                ['src' => 'img/wordpress/WP2.png', 'alt' => 'WordPress Development'],
            ];
        @endphp
        
        @foreach($wpTools as $tool)
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
    var wpToolsSwiper = new Swiper(".wpToolsSwiper", {
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