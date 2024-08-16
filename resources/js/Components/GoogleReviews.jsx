import React, { useRef, useState } from "react";
// Import Swiper React components
import { Swiper, SwiperSlide } from "swiper/react";
import { StarFilled } from "@ant-design/icons";

// Import Swiper styles
import "swiper/css";
import "swiper/css/pagination";

// import required modules
import { Pagination, Autoplay } from "swiper/modules";

export default function GoogleReviews() {
    return (
        <>
            <Swiper
                slidesPerView={3}
                spaceBetween={30}
                autoplay={{
                    delay: 5000,
                    disableOnInteraction: false,
                }}
                pagination={{
                    clickable: true,
                }}
                modules={[Autoplay, Pagination]}
                className="mySwiper"
            >
                <SwiperSlide>
                    <div className="flex flex-col gap-3">
                        <div className="flex flex-col gap-4 p-4 border border-gray-200 rounded-lg">
                            <div className="flex justify justify-between">
                                <div className="flex gap-2">
                                    <div className="flex justify-center items-center w-7 h-7 text-center rounded-full bg-red-500">
                                        C
                                    </div>
                                    <span>CFA Pakistan</span>
                                </div>
                                <div className="flex p-1 gap-1 text-orange-300">
                                    <StarFilled />
                                    <StarFilled />
                                    <StarFilled />
                                    <StarFilled />
                                    <StarFilled />
                                </div>
                            </div>

                            <div className="h-36 overflow-y-scroll">
                                We had an exceptional experience working with
                                Execudea. From the initial consultation to the
                                final launch, their team demonstrated
                                professionalism, creativity, and a deep
                                understanding of web design and development.
                                They took the time to understand our brand and
                                goals, delivering a website that not only looks
                                stunning but also functions seamlessly across
                                all devices.
                            </div>

                            <div className="flex justify-between">
                                <span>Aug 08, 2024</span>
                            </div>
                        </div>
                    </div>
                </SwiperSlide>
                <SwiperSlide>
                    <div className="flex flex-col gap-3">
                        <div className="flex flex-col gap-4 p-4 border border-gray-200 rounded-lg">
                            <div className="flex justify justify-between">
                                <div className="flex gap-2">
                                    <div className="flex justify-center items-center w-7 h-7 text-center rounded-full bg-violet-500">
                                        B
                                    </div>
                                    <span>Basit Ghauri</span>
                                </div>
                                <div className="flex p-1 gap-1 text-orange-300">
                                    <StarFilled />
                                    <StarFilled />
                                    <StarFilled />
                                    <StarFilled />
                                    <StarFilled />
                                </div>
                            </div>

                            <div className="h-36">
                            Really good client engagement. Executed company website as required and iterations as requested. 
                            <p>Recommended</p>

                            </div>

                            <div className="flex justify-between">
                                <span>Oct 19, 2022</span>
                            </div>
                        </div>
                    </div>
                </SwiperSlide>
                <SwiperSlide>
                    <div className="flex flex-col gap-3">
                        <div className="flex flex-col gap-4 p-4 border border-gray-200 min-h-24">
                            <div className="flex justify justify-between">
                                <div className="flex gap-2">
                                    <div className="flex justify-center items-center w-7 h-7 text-center rounded-full bg-orange-500">
                                        M
                                    </div>
                                    <span>Muhammad Javed</span>
                                </div>
                                <div className="flex p-1 gap-1 text-orange-300">
                                    <StarFilled />
                                    <StarFilled />
                                    <StarFilled />
                                    <StarFilled />
                                    <StarFilled />
                                </div>
                            </div>

                            <div className="h-36 overflow-y-scroll">
                            I am very satisfied with the experience and customer service provided by Execudea. They designed my hotel website and i like the designs, theme and the respond timing of my website really impressive. They are very helpful, always replying in a timely manner very cooperative team.
                            </div>

                            <div className="flex justify-between">
                                <span>Mar 12, 2021</span>
                            </div>
                        </div>
                    </div>
                </SwiperSlide>
                <SwiperSlide>
                    <div className="flex flex-col gap-3">
                        <div className="flex flex-col gap-4 p-4 border border-gray-200">
                            <div className="flex justify justify-between">
                                <div className="flex gap-2">
                                    <div className="flex justify-center items-center w-7 h-7 text-center rounded-full bg-green-500">
                                        A
                                    </div>
                                    <span>Abdul Latif</span>
                                </div>
                                <div className="flex p-1 gap-1 text-orange-300">
                                    <StarFilled />
                                    <StarFilled />
                                    <StarFilled />
                                    <StarFilled />
                                    <StarFilled />
                                </div>
                            </div>

                            <div className="h-36">
                            Best website designer and developer in Pakistan. Fast response and followed direction perfectly.
                            </div>

                            <div className="flex justify-between">
                                <span>Mar 12, 2021</span>
                            </div>
                        </div>
                    </div>
                </SwiperSlide>
                <SwiperSlide>
                    <div className="flex flex-col gap-3">
                        <div className="flex flex-col gap-4 p-4 border border-gray-200">
                            <div className="flex justify justify-between">
                                <div className="flex gap-2">
                                    <div className="flex justify-center items-center w-7 h-7 text-center rounded-full bg-blue-500">
                                        K
                                    </div>
                                    <span>Khadim H.</span>
                                </div>
                                <div className="flex p-1 gap-1 text-orange-300">
                                    <StarFilled />
                                    <StarFilled />
                                    <StarFilled />
                                    <StarFilled />
                                    <StarFilled />
                                </div>
                            </div>

                            <div className="h-36">
                            Very professional team. They provide best web designing and development services in Pakistan.
                            </div>

                            <div className="flex justify-between">
                                <span>Feb 13, 2021</span>
                            </div>
                        </div>
                    </div>
                </SwiperSlide>
            </Swiper>
        </>
    );
}
