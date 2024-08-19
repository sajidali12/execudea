import React from "react";
// Import Swiper React components
import { Swiper, SwiperSlide } from "swiper/react";
import { StarFilled } from "@ant-design/icons";

// Import Swiper styles
import "swiper/css";
import "swiper/css/pagination";

// import required modules
import { Pagination, Autoplay } from "swiper/modules";

export default function TechLogos() {
    return (
        <>
            <Swiper
                breakpoints={{
                    0: {
                      slidesPerView: 1,
                    },
                    768:{
                      slidesPerView:2
                    },
                    1170:{
                      slidesPerView:3
                    }
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
                <SwiperSlide>
                   <img className="opacity-60 m-auto" src="img/tech/html.png" alt="HTML5 Web Development"/>
                </SwiperSlide>
                <SwiperSlide>
                    <img className="opacity-60 m-auto" src="img/tech/css.png" alt="css3 Web Development"/>
                </SwiperSlide>
                <SwiperSlide>
                   <img className="opacity-60 m-auto" src="img/tech/java-script.png" alt="Javascript Web Development"/>
                </SwiperSlide>
                <SwiperSlide>
                <img className="opacity-60 m-auto" src="img/tech/react.png" alt="React Js Web Development"/>
                </SwiperSlide>
                <SwiperSlide>
                <img className="opacity-60 m-auto" src="img/tech/php.png" alt="php Web Development"/>
                </SwiperSlide>
                <SwiperSlide>
                <img className="opacity-60 m-auto" src="img/tech/node.png" alt="node js Web Development"/>
                </SwiperSlide>
            </Swiper>
        </>
    );
}
