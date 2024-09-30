import React from "react";
import { Swiper, SwiperSlide } from "swiper/react";
import "swiper/css";
import "swiper/css/pagination";

import { Pagination, Autoplay } from "swiper/modules";

export default function Wordpresslog() {
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
                 { src: "img/wordpress/woo.png", alt: "HTML5 Web Development" },
                 { src: "img/wordpress/elementor.png", alt: "CSS3 Web Development" },
                 { src: "img/wordpress/wp7.png", alt: "JavaScript Web Development" },
                 { src: "img/wordpress/wp1.png", alt: "React JS Web Development" },
                 { src: "img/wordpress/WP2.png", alt: "React JS Web Development" },
                
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
