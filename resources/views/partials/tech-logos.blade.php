<div class="swiper techSwiper">
    <div class="swiper-wrapper">
        @php
            $logos = [
                ['src' => 'img/tech/html.png', 'alt' => 'HTML5 Web Development'],
                ['src' => 'img/tech/css.png', 'alt' => 'CSS3 Web Development'],
                ['src' => 'img/tech/java-script.png', 'alt' => 'JavaScript Web Development'],
                ['src' => 'img/tech/react.png', 'alt' => 'React JS Web Development'],
                ['src' => 'img/tech/php.png', 'alt' => 'PHP Web Development'],
                ['src' => 'img/tech/node.png', 'alt' => 'Node JS Web Development'],
                ['src' => 'img/tech/laravel.png', 'alt' => 'Laravel Web Development'],
                ['src' => 'img/tech/vue.png', 'alt' => 'Vue JS Web Development'],
            ];
        @endphp
        
        @foreach($logos as $logo)
            <div class="swiper-slide">
                <img
                    class="opacity-80 m-auto"
                    src="{{ asset($logo['src']) }}"
                    alt="{{ $logo['alt'] }}"
                    style="height: 150px; object-fit: contain;"
                />
            </div>
        @endforeach
    </div>
    <div class="swiper-pagination"></div>
</div>

@push('styles')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
@endpush

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var techSwiper = new Swiper(".techSwiper", {
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
    });
</script>
@endpush