import React from "react";
// Import Swiper React components
import { Swiper, SwiperSlide } from "swiper/react";

// Import Swiper styles
import "swiper/css";
import "swiper/css/pagination";

// import required modules
import { Pagination, Autoplay } from "swiper/modules";

export default function TechLogos() {
    return (
        <Swiper
            breakpoints={{
                0: {
                    slidesPerView: 1,
                },
                768: {
                    slidesPerView: 2,
                },
                1170: {
                    slidesPerView: 3,
                },
            }}
            spaceBetween={30}
            autoplay={{
                delay: 6000,
                disableOnInteraction: false,
            }}
            pagination={{
                clickable: true,
            }}
            modules={[Autoplay, Pagination]}
            className="mySwiper"
        >
            {[
                { src: "img/tech/html.png", alt: "HTML5 Web Development" },
                { src: "img/tech/css.png", alt: "CSS3 Web Development" },
                { src: "img/tech/java-script.png", alt: "JavaScript Web Development" },
                { src: "img/tech/react.png", alt: "React JS Web Development" },
                { src: "img/tech/php.png", alt: "PHP Web Development" },
                { src: "img/tech/node.png", alt: "Node JS Web Development" },
                { src: "img/tech/laravel.png", alt: "Laravel Web Development" },
                { src: "img/tech/vue.png", alt: "Vue JS Web Development" },
            ].map((logo, index) => (
                <SwiperSlide key={index}>
                    <img
                        className="opacity-80 m-auto"
                        src={logo.src}
                        alt={logo.alt}
                        style={{
                            height: '150px', 
                            objectFit: 'contain', 
                        }}
                    />
                </SwiperSlide>
            ))}
        </Swiper>
    );
}
