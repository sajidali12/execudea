import React from "react";
import { Swiper, SwiperSlide } from "swiper/react";
import "swiper/css";
import "swiper/css/pagination";

import { Pagination, Autoplay } from "swiper/modules";

export default function user() {
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
                 { src: "img/user/figma.png", alt: "HTML5 Web Development" },
                 { src: "img/user/xd.png", alt: "CSS3 Web Development" },
                 { src: "img/user/photoshop.png", alt: "JavaScript Web Development" },
                 { src: "img/user/canva.png", alt: "React JS Web Development" },
                
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
